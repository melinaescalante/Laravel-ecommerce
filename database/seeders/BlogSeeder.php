<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('blogs')->insert([
            [
                'title' => 'Horizon Zero Dawn Remastered y LEGO Horizon Adventures están en camino',
                'text' => 'Una de las noticias más sorprendentes del último State of Play es que Horizon Zero Dawn regresa con una remasterización tras 7 años después del título original. Por esta misma razón, es muy posible que Sony haya querido aumentar un 100% el precio de Horizon Zero Dawn en la PS Store. Será el 31 de diciembre cuando esta versión se estrene en PC y PS5, los actuales propietarios podrán actualizar por 10 euros, aunque también está LEGO Horizon Adventures, que debutará en todas las plataformas excepto en Xbox y su lanzamiento ocurrirá el 14 de noviembre.​',
                'date' => '2024-09-25',
                'game'=>'Horizon Zero Dawn Remastered y LEGO Horizon Adventures',
                'company' => 'LEGO',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Warner Bros ha visto un descenso del 41% en los ingresos de su división de videojuegos',
                'text' => 'El fracaso de Suicide Squad: Kill the Justice League ha afectado a la imagen de Rocksteady, a los empleados de la desarrolladora y, como era de esperar, a las arcas de Warner Bros. Porque, tras reconocer la pérdida de 200 millones de dólares a causa de las malas ventas del juego como servicio, el conglomerado también ha visto una caída del 41% en los ingresos de su división de videojuegos. Aún así, y a pesar de que la compañía logró un gran éxito en 2023 con Hogwarts Legacy, sus directivos consideran que su futuro está en el desarrollo de más Gaas (Games as a Service).​',
                'date' => '2024-09-27',
                'game'=>'Suicide Squad, Hogwarts Legacy',
                'company' => 'Warner Bros',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'La primera expansión de Assassins Creed Shadows será gratis',
                'text' => 'Una de las buenas noticias del retraso de Assassins Creed Shadows es que Ubisoft regalará la primera expansión de su mundo abierto. El motivo de ello también está relacionado con que la compañía se alejará del modelo tradicional de Pases de Temporada, aunque ese no es el único cambio porque a partir de ahora sus grandes lanzamiento debutarán de salida en Steam, algo que solo hacían meses después de su estreno. Por eso mismo, Star Wars Outlaws llegará a la tienda de Valve el 21 de noviembre, fecha que se lanzará una gran actualización y su primera expansión de historia. ​',
                'date' => '2024-09-29',
                'company' => 'Ubisoft',
                'game' => 'Assassins Creed Shadows',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => '"Zelda: Tears of the Kingdom" Triunfa en los Japan Game Awards',
                'text' => 'El aclamado videojuego "Zelda: Tears of the Kingdom" ha sido reconocido como el Mejor Juego en los Japan Game Awards, reafirmando su lugar como una de las joyas de la industria del videojuego. Además de este prestigioso galardón, el título también recibió el Premio a las Mejores Ventas y un Premio de Excelencia, subrayando su éxito tanto crítico como comercial. Este reconocimiento destaca la continua popularidad de la serie "Zelda" y su impacto duradero en el mundo del entretenimiento interactivo​(VGC).​',
                'date' => '2024-09-29',
                'company' => 'Nintendo',
                'game' => 'The Legend of Zelda: Tears of the Kingdom',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
