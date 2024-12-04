<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Purchase;
use App\Payment\MercadoPagoPayment;

use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;

use Illuminate\Http\Request;

class MercadoPagoController extends Controller
{
    public function showV2(Request $request)
    {
        $gamesArray = [];
        $gamestry = $request->input('items');
        $purchase = $request->input('purchase');
        $gamestry = json_decode($gamestry);
        $purchase = json_decode($purchase);
        foreach ($gamestry as $game) {
            array_push($gamesArray, $game);
        }
        $games = Game::whereIn('id_game', [1, 3])->get();
        // Integración con Mercado Pago.
        // Preparamos un array con los datos de los ítems con el formato que pide Mercado Pago.
        $items = [];

        foreach ($gamesArray as $game) {
            $items[] = [
                'id' => $game->game->id_game,
                'title' => $game->game->title,
                'unit_price' => $game->game->price,
                'quantity' => $game->quantity,
            ];
        }

        try {
            $payment = new MercadoPagoPayment;
            $payment->setItems($items);
            $payment->setBackUrls(
                success: route('test.mercadopago.successProcess',["purchase_id"=>$purchase->purchase_id]),
                pending: route('test.mercadopago.pendingProcess',["purchase_id"=>$purchase->purchase_id]),
                failure: route('test.mercadopago.failureProcess',["purchase_id"=>$purchase->purchase_id]),
            );
            $payment->withAutoReturn();

            $preference = $payment->createPreference();
        } catch (\Throwable $e) {
            dd($e);
        }

        return view('test.mercadopago', [
            'games' => $gamesArray,
            'preference' => $preference,
            'purchasePendant'=>$purchase,
            // Pasamos la clave pública para poder agregarla en la conexión de JS.
            'mpPublicKey' => $payment->getPublicKey(),
        ]);

    }
    public function show()
    {
        $games = Game::whereIn('id_game', [1, 2])->get();
        //Integracion con mercadopago
        //Array con datos de los items que pide mercado pago
        $items = [];
        foreach ($games as $game) {
            $items[] = [
                'id' => $game->id_game,
                'title' => $game->title,
                'unit_price' => $game->price,
                'quantity' => 1,
            ];
        }
        try {
            MercadoPagoConfig::setAccessToken(config('mercadopago.access_token'));
            $preferenceFactory = new PreferenceClient();

            $preference = $preferenceFactory->create([
                'items' => $items,
                // Configuramos las back_urls
                'back_urls' => [
                    'success' => route('test.mercadopago.successProcess'),
                    'pending' => route('test.mercadopago.pendingProcess'),
                    'failure' => route('test.mercadopago.failureProcess'),
                ],
                'auto_return' => 'approved',
            ]);
        } catch (\Throwable $th) {
            dd($th);
        }
        return view('test.mercadopago', ['games' => $games, 'preference' => $preference, 'mpPublicKey' => config('mercadopago.public_key')]);
    }

    public function successProcess(Request $request)
    {
        
        $purchase=$request->purchase_id;
        $userPurchase= Purchase::findOrFail($purchase);
        $userPurchase->update(['status'=>'confirmada']);

        // // En esta ruta podríamos mostrar un mensaje de éxito al usuario de que su compra
        // // fue realizada con éxito.
        // // Vamos a recibir en el query string varios datos sobre la operación en Mercado Pago,
        // // como id de operación.
        // // dd($request->query);
        return redirect()
                ->route('games')
                ->with('feedback', [
                    'message' => 'Compra realizada con éxito',
                    'alert' => 'success',
                ]);
    }

    public function pendingProcess(Request $request)
    {
        dd($request->query);
    }

    public function failureProcess(Request $request)
    {
        $purchase=$request->purchase_id;
        // $userPurchase= Purchase::findOrFail($purchase);
        // $userPurchase->update(['status'=>'confirmada']);

        // // En esta ruta podríamos mostrar un mensaje de éxito al usuario de que su compra
        // // fue realizada con éxito.
        // // Vamos a recibir en el query string varios datos sobre la operación en Mercado Pago,
        // // como id de operación.
        // // dd($request->query);
        return redirect()
                ->route('cart.index')
                ->with('feedback', [
                    'message' => 'Compra fallida. Inténtelo de nuevo.',
                    'alert' => 'danger',
                ]);
        // dd($request->query);
    }
}
