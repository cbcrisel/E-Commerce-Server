<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Response;
use App\Product;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productInformations=[
            [
                'name'=>'KENNY WAYNE SHEPHERD STRATOCASTER',
                'brand'=>'Fender',
                'price'=>1200.00,
                'image'=>/* 'public/images/guitarra1.PNG', */'https://d1aeri3ty3izns.cloudfront.net/media/12/128207/1200/preview.jpg',
                'description'=>'El Kenny Wayne Sheperd Stratocaster presenta un cuerpo de fresno con camara para un tono vibrante y resonante,mientras que el acabado de laca azul sonico transparente descolorido resalta el hermoso grano de fresno.',
                'category_id'=>1
            ],
            [
                'name'=>'PARALLEL UNIVERSE VOLUME II TELE MAGICO',
                'brand'=>'Fender',
                'price'=>1300.00,
                'image'=>/* 'public/images/guitarra2.PNG', */'https://d1aeri3ty3izns.cloudfront.net/media/53/536319/1200/preview.jpg',
                'description'=>'El glamour del viejo mundo se combina con los conocimientos de Custom Shop: debajo de las lujosas citas, este francotirador es excepcionalmente jugable y sumamente tonificado.',
                'category_id'=>1
            ],
            [
                'name'=>'AMERICAN ULTRA JAZZMASTER',
                'brand'=>'Fender',
                'price'=>1100.00,
                'image'=>/* 'public/images/guitarra3.PNG', */'https://d1aeri3ty3izns.cloudfront.net/media/51/515505/1200/preview.jpg',
                'description'=>'Este versátil instrumento de última generación te inspirará a llevar tu interpretación a nuevas alturas. Otras características incluyen clavijeros de bloqueo sellados, herrajes cromados y cejilla de hueso. Incluye estuche rígido moldeado de primera calidad.',
                'category_id'=>1
            ],
            [
                'name'=>'PLAYER LEAD II',
                'brand'=>'Fender',
                'price'=>2100.00,
                'image'=>/* 'public/images/guitarra4.PNG', */'https://d1aeri3ty3izns.cloudfront.net/media/53/537618/1200/preview.jpg',
                'description'=>'La Player Lead II es un homenaje a los modelos de finales de los 70, con pastillas de bobina simple de la serie Player de posición inclinada, una moderna forma de mástil en" C "con trastes médium jumbo, dos selectores (uno para la selección de pastillas y otro para invertir la fase), y por supuesto esa forma única de doble cutaway Lead. ',
                'category_id'=>1
            ],
            [
                'name'=>'Player Jaguar Bass',
                'brand'=>'Fender',
                'price'=>2000.00,
                'image'=>'https://www.pronorte.es/_files/product/12733/gallery1/fender-player-jaguar-bass-pf-srd.jpg',
                'description'=>' El cuerpo compensado y la sensación de comodidad le dan un atractivo moderno; la combinación de pastillas flexibles le da un sonido propio. Diseñado para bajistas creativos, el Jaguar Bass está listo para subir al escenario contigo en cualquier momento, con el auténtico sonido y estilo de Fender.',
                'category_id'=>2
            ],
            [
                'name'=>'MUSTANG BASS PJ',
                'brand'=>'Fender',
                'price'=>2400.00,
                'image'=>'https://www.txirula.com/33647-medium_default/fender-mustang-bass-pj-mn-ssb.jpg',
                'description'=>'Desde su lanzamiento original en 1964, el Mustang Bass ha sido uno de los diseños de bajo más duraderos de Fender, llegando a manos de bajistas que van desde The Rolling Stones hasta My Chemical Romance.',
                'category_id'=>2
            ],
            [
                'name'=>'ADAM CLAYTON JAZZ BASS- PURPLE SPARKLE',
                'brand'=>'Fender',
                'price'=>3000.00,
                'image'=>'https://cdn11.bigcommerce.com/s-dks6ju/images/stencil/500x659/products/13410/135339/0190092787_1__38985.1512149385.jpg?c=2',
                'description'=>'El Fender Adam Clayton Jazz Bass pone en tus manos su robusto sonido y estilo, con elegantes detalles y un excelente sonido base que proviene de las dos potentes pastillas Fender Custom Shop, además de un bonito acabado brillante Sherwood Green Metallic con pala a juego.',
                'category_id'=>2
            ],
            [
                'name'=>'STAGE CUSTOM HIP',
                'brand'=>'Yamaha',
                'price'=>2700.00,
                'image'=>'https://es.yamaha.com/es/files/Image-Index_Stage_Custom_Hip_1080x1080_1080x1080_122d6c153f66906e44a97d4023e1ffef.jpg',
                'description'=>' El set cuenta con un bombo corto de 20 x 8 pulgadas, que aporta los graves suficientes a la banda, pero manteniendo el kit en tamaño compacto. El timbal base está también equipado con bordonero, de manera que se pueda utilizar como caja en una gran variedad de estilos.',
                'category_id'=>3
            ],
            [
                'name'=>'JUNIOR KIT',
                'brand'=>'Yamaha',
                'price'=>1300.00,
                'image'=>'https://es.yamaha.com/es/files/Junior_Kit_540x540_540x540_435135e2bd88871b82828c99f5e83b8d.jpg',
                'description'=>'Desarrollada en colaboración con Manu Katché, la batería Junior Kit ofrece altas prestaciones en una configuración de diámetro pequeño que puede ajustarse a muy diversas alturas.',
                'category_id'=>3
            ],
            [
                'name'=>'RYDEEN',
                'brand'=>'Yamaha',
                'price'=>500.00,
                'image'=>'https://es.yamaha.com/es/files/index_2684x1980_0e5b1990dcb9342f7ad013de93915269.jpg',
                'description'=>'La nueva RYDEEN (pack con 5 cascos) es exactamente el kit con el que a cualquier baterista principiante le gustaría tocar. Esta batería incluye el set de hardware HW680W de Yamaha y sujeciones de toms.',
                'category_id'=>3
            ],
            [
                'name'=>'CRYSTAL BEAT',
                'brand'=>'Pearl',
                'price'=>900.00,
                'image'=>'https://pearldrum.com/utility/thumb.php?i=/common/assets/images/drumsets/crystal-beat/CRB525FPC731-Ruby-Red-sm.jpg&w=745&h=429',
                'description'=>'El juego de batería de acrílico sin costuras original. No es solo otro kit de trampa transparente para el conjunto hipster, el caparazón sin costuras original de Crystal Beat está de vuelta, actualizado y fortalecido para el jugador poderoso de hoy.',
                'category_id'=>3
            ],
            [
                'name'=>'ROADSHOW',
                'brand'=>'Pearl',
                'price'=>1200.00,
                'image'=>'https://pearldrum.com/utility/thumb.php?i=/common/assets/images/drumsets/roadshow/RS525SCC91.jpg&w=745&h=429',
                'description'=>'EL RITMO ESTÁ EN USTED ... el equipo adecuado es esencial para liberarlo. Sin juguetes ni objetos usados; un paquete de batería nuevo y completo con todo lo que necesita para comenzar su viaje rítmico hacia el gran momento.',
                'category_id'=>3
            ],
            [
                'name'=>'AMERICAN ORIGINAL 70s JAZZ BASS',
                'brand'=>'Fender',
                'price'=>1700.00,
                'image'=>'https://d1aeri3ty3izns.cloudfront.net/media/53/536506/1200/preview.jpg',
                'description'=>' Su tacto suave y su rango medio, templado con un poco de más agudos, lo convirtieron en un héroe en las sesiones de grabación en todo el mundo.',
                'category_id'=>2
            ],
            [
                'name'=>'60th ANNIVERSARY 1960 LES PAUL STANDARD',
                'brand'=>'Gibson',
                'price'=>8000.00,
                'image'=>'https://static.gibson.com/product-images/Custom/CUSQKW566/V1%20Deep%20Cherry%20Sunburst/LPR60VODCSNH1_front.jpg',
                'description'=>' Los artesanos de Gibson Custom Shop han recreado con orgullo la experiencia de poseer un original invaluable gracias a la minuciosa atención a los detalles y al incansable estudio de los ejemplos antiguos',
                'category_id'=>1
            ]
        ];
        foreach($productInformations as $productInformation){
            $product=new Product();
            $product->name=$productInformation['name'];
            $product->brand=$productInformation['brand'];
            $product->price=$productInformation['price'];
            $product->description=$productInformation['description'];
            /* $image= Intervention\Image\Facades\Image::make(base_path($productInformation['image']));
            $image->resize(300,300);
            Response::make($image->encode('jpeg')); */
            $product->picture=$productInformation['image'];
            $product->category_id=$productInformation['category_id'];
            $product->created_at=Carbon::now();
            $product->save();
        }
    }
}
