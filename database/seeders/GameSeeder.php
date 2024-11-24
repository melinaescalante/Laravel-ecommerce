<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \DB::table('games')->insert([
            [
                'id_game' => 1,

                'title' => 'Street Fighter 6',
                'rating_fk' => 1,
                'release_date' => '2023-06-02',
                'price' => 59000,
                'synopsis' => 'El juego sigue el formato clásico de Street Fighter, centrado en los combates entre personajes icónicos de la franquicia, como Ryu, Chun-Li, y nuevos luchadores como Luke y Jamie. Aunque la trama general se desarrolla a través del modo historia, los jugadores también pueden explorar una experiencia más personalizada a través del nuevo modo World Tour.

                En el World Tour, los jugadores crean su propio personaje personalizado y lo guían a través de un viaje alrededor del mundo, donde entrenan con los maestros de Street Fighter y luchan contra otros personajes en una historia ramificada. Este modo ofrece una combinación de combates, exploración, y elementos de RPG.',
                'company' => 'Capcom',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_game' => 2,

                'title' => 'Final Fantasy XVI',
                'rating_fk' => 1,

                'release_date' => '2023-06-22',
                'price' => 3000,
                'synopsis' => 'En un mundo medieval llamado Valisthea, Clive Rosfield, el hijo mayor del Archiducado de Rosaria, se embarca en una búsqueda épica de venganza tras la tragedia que asola su familia. A medida que la historia avanza, Clive se ve envuelto en un conflicto entre los distintos reinos, cada uno con su propio Dominante que controla poderosos Eikons, criaturas míticas de inmenso poder. A través de la narrativa, se exploran temas como la lucha por el poder, la traición, y el sacrificio, mientras Clive forma alianzas inesperadas y enfrenta enemigos tanto en la batalla como en su propia conciencia.',
                'company' => 'Square Enix',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_game' => 3,

                'title' => 'Fallout 76',
                'rating_fk' => 1,

                'release_date' => '2023-06-25',
                'price' => 75000,
                'synopsis' => 'Fallout 76 es un videojuego de rol de acción de mundo abierto desarrollado por Bethesda Game Studios y distribuido por Bethesda Softworks. Lanzado en noviembre de 2018, este título representa una salida innovadora para la serie Fallout, ya que es el primer juego en la franquicia diseñado como una experiencia multijugador en línea.
        La historia de Fallout 76 se sitúa en un mundo post-apocalíptico, específicamente en el año 2102, unos 25 años después de que las bombas nucleares devastaran la Tierra. Los jugadores asumen el papel de uno de los residentes de Vault 76, un refugio subterráneo que fue diseñado para abrirse más temprano que otros, permitiendo a sus habitantes volver a la superficie y reconstruir la sociedad. El escenario se desarrolla en West Virginia, un área rica en recursos naturales, pero también llena de peligros, incluidos criaturas mutantes y otros sobrevivientes hostiles.​',
                'company' => 'Bethesda Games',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_game' => 4,

                'title' => 'Diablo IV',
                'rating_fk' => 1,

                'release_date' => '2023-06-02',
                'price' => 8000,
                'synopsis' => 'En Diablo IV, los jugadores regresan a un mundo oscuro y sombrío conocido como Santuario, donde deben enfrentar a la demoníaca madre de todos los males, Lilith, que ha regresado para sembrar el caos. La narrativa gira en torno a la lucha contra las fuerzas del mal mientras los jugadores exploran un mundo abierto lleno de misiones, personalización de personajes y leyendas antiguas. A medida que se enfrentan a demonios y otras criaturas malignas, los jugadores pueden elegir su propio camino y tomar decisiones que afectan la narrativa y el destino del mundo, adentrándose en una trama de sacrificio y redención en medio de la desesperación',
                'company' => 'Blizzard Entertainment',

                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id_game' => 5,

                'title' => 'The Legend of Zelda: Tears of the Kingdom',
                'rating_fk' => 1,

                'release_date' => '2023-05-12',
                'price' => 35000,
                'synopsis' => 'En esta secuela de Breath of the Wild, Link regresa a Hyrule, un reino que ha cambiado y crecido desde su última aventura. Con nuevas habilidades que incluyen la manipulación del tiempo y la creación de objetos, Link debe enfrentar una nueva amenaza que surge desde las profundidades del cielo. La historia explora la relación entre Link y Zelda, mientras descubren antiguos secretos del reino y enfrentan a enemigos poderosos que buscan desatar el caos. A medida que explora vastas tierras, Link también deberá resolver acertijos y desbloquear nuevas áreas, todo mientras se enfrenta a desafíos que ponen a prueba su valentía y ingenio.',
                'company' => 'Nintendo',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_game' => 6,

                'title' => 'Hogwarts Legacy',
                'rating_fk' => 1,

                'release_date' => '2023-02-10',
                'price' => 80000,
                'synopsis' => 'Ambientado en el siglo XIX en el mundo mágico de Harry Potter, los jugadores asumen el papel de un estudiante en Hogwarts que descubre que posee la capacidad única de manejar magia antigua. A medida que avanzan en su educación, los jugadores exploran el castillo y sus alrededores, enfrentando desafíos y peligros que amenazan tanto al mundo mágico como al no mágico. La historia incluye la posibilidad de tomar decisiones que afectarán el destino del personaje y sus interacciones con otros estudiantes y profesores, mientras luchan contra fuerzas oscuras que buscan aprovechar el poder de la magia antigua.',
                'company' => 'Portkey Games',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_game' => 7,

                'title' => 'Starfield',
                'rating_fk' => 1,

                'release_date' => '2023-09-06',
                'price' => 7000,
                'synopsis' => 'En Starfield, los jugadores asumen el papel de un miembro de "Constellation", una organización de exploradores espaciales en busca de artefactos únicos en el universo. El juego promete una mezcla de exploración de planetas, combates espaciales, interacción con diversas facciones y una narrativa ramificada. Los jugadores podrán personalizar sus naves, construir bases, y participar en combates tanto en tierra como en el espacio, todo mientras desentrañan los secretos del cosmos.',
                'company' => 'Bethesda Game Studios',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_game' => 8,

                'title' => 'MADISON ',
                'rating_fk' => 1,

                'release_date' => '2022-07-02',
                'price' => 3400,
                'synopsis' => 'En MADISON, los jugadores toman el control de Luca, un joven que se encuentra atrapado en una oscura pesadilla, manipulado por una entidad demoníaca llamada MADISON. A lo largo del juego, Luca debe usar una cámara instantánea para resolver acertijos y desentrañar el oscuro y macabro pasado de su familia, todo mientras trata de sobrevivir a los horrores que lo acechan. La cámara juega un papel central en la jugabilidad, ya que captura fenómenos sobrenaturales y ofrece pistas para avanzar en la historia.
            El juego se desarrolla en un entorno claustrofóbico y aterrador, con una atmósfera opresiva, que mantiene al jugador en constante estado de alerta mientras explora las terroríficas ubicaciones.',
                'company' => 'Bloodious Games',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_game' => 9,

                'title' => 'Marvel\'s Spider-Man 2',
                'rating_fk' => 1,

                'release_date' => '2023-10-20',
                'price' => 20000,
                'synopsis' => 'En esta secuela, Peter Parker y Miles Morales, ahora en sus roles como Spider-Man, deben unir fuerzas para enfrentar una nueva oleada de villanos, incluyendo a clásicos como Venom y nuevos adversarios. La narrativa se centra en la lucha por equilibrar sus vidas personales con sus responsabilidades como héroes, mientras exploran una Nueva York más expansiva. A medida que la historia se desarrolla, se desvelan oscuros secretos sobre el pasado de los villanos y el futuro de la ciudad, lo que pone a prueba su amistad y habilidades como Spider-Man.',
                'company' => 'Insomniac Games',

                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_game' => 10,
                'title' => 'Tekken 8',
                'rating_fk' => 1,

                'release_date' => '2024-10-02',
                'price' => 8000,
                'synopsis' => ' La nueva entrega de Tekken continúa la saga de la familia Mishima, centrándose en la lucha entre Jin Kazama y su padre, Kazuya Mishima, en un conflicto que ha perdurado a lo largo de generaciones. Con intensos combates y gráficos mejorados, el juego presenta nuevos personajes que se unen a la familia y amigos, mientras se desarrollan tramas de venganza, redención y poder. La historia revela los secretos más oscuros de la familia Mishima y sus enemigos, mientras el torneo busca determinar quién realmente merece llevar el legado de los Kazama y los Mishima',
                'company' => 'Bandai Namco Entertainment',

                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('games_have_genres')->insert([
            ['game_fk' => 1, 'genre_fk' => 1],
            ['game_fk' => 2, 'genre_fk' => 2],
            ['game_fk' => 3, 'genre_fk' => 3],
            ['game_fk' => 4, 'genre_fk' => 4],
            ['game_fk' => 5, 'genre_fk' => 4],
            ['game_fk' => 6, 'genre_fk' => 5],
            ['game_fk' => 7, 'genre_fk' => 1],
            ['game_fk' => 8, 'genre_fk' => 3],
            ['game_fk' => 9, 'genre_fk' => 2],
            ['game_fk' => 10, 'genre_fk' => 1]
        ]);
        DB::table('users_have_purchases')->insert([
            ['user_fk' => 1, 'game_fk' => 1, 'amount' => 59000],
            ['user_fk' => 1, 'game_fk' => 1, 'amount' => 59000],
            ['user_fk' => 1, 'game_fk' => 1, 'amount' => 59000],
            ['user_fk' => 3, 'game_fk' => 2, 'amount' => 20000],
        ]);

        // DB::table('users_have_purchases')->truncate();

    }
}
