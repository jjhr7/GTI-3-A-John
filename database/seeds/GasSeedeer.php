<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Gas;


class GasSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $gas = new Gas();
        $gas->name = 'Dióxido de carbono (CO2)';
        $gas->description = 'Es un gas incoloro e inodoro cuyo origen puede estar tanto en fuentes naturales como en la propia actividad humana. Sus consecuencias son muy importantes tanto en la calidad del aire interior que respiramos como en la contaminación atmosférica y la emisión de gases efecto invernadero. La principal fuente de CO2 en interiores es la respiración humana. Otros factores pueden ser los elevados niveles de procedentes del aire exterior, elevados niveles de ocupación humana en una estancia o recinto, mala ventilación, etc. Una de las medidas más eficaces para prevenir situaciones de elevadas concentraciones de CO2 en interior y una deficiente calidad del aire interior, sería instalar medidores de CO2 o sensores inteligentes.';
        $gas->fix_values = '10 mg/m3 por 1h';
        $gas->information_values = 'Entre 500 y 800 ppm: calidad de aire interior moderada';
        $gas->alert_values = 'Nivel superior a 1200 ppm: calidad de aire interior mala';
        $gas->route_image = 'web';
        $gas->save();

        $gas = new Gas();
        $gas->name = 'Partículas PM 2.5';
        $gas->description = 'Partículas finas. Un indicador representativo común de la contaminación del aire. Afectan a más personas que cualquier otro contaminante. Los principales componentes de las PM son los sulfatos, los nitratos, el amoníaco, el cloruro de sodio, el hollín, los polvos minerales y el agua. Existe una estrecha relación entre la exposición a altas concentraciones PM10 y PM2,5 y el aumento de la mortalidad o morbilidad diaria y a largo plazo.';
        $gas->fix_values = '25 μg/m3 de media en 24h.';
        $gas->information_values = '40 μg/m3 de media en 24h.';
        $gas->alert_values = '55 μg/m3 de media en 24h.';
        $gas->route_image = 'web';
        $gas->save();

        $gas = new Gas();
        $gas->name = 'Partículas PM 10';
        $gas->description = 'Partículas gruesas. Un indicador representativo común de la contaminación del aire. Afectan a más personas que cualquier otro contaminante. Los principales componentes de las PM son los sulfatos, los nitratos, el amoníaco, el cloruro de sodio, el hollín, los polvos minerales y el agua. Existe una estrecha relación entre la exposición a altas concentraciones PM10 y PM2,5 y el aumento de la mortalidad o morbilidad diaria y a largo plazo.';
        $gas->fix_values = '50 μg/m3 de media en 24h.';
        $gas->information_values = '60 μg/m3 de media en 24h.';
        $gas->alert_values = '75 μg/m3 de media en 24h.';
        $gas->route_image = 'web';
        $gas->save();

        $gas = new Gas();
        $gas->name = 'Ozono (O3)';
        $gas->description = 'Es uno de los principales componentes de la niebla tóxica. Éste se forma por la reacción con la luz solar (fotoquímica) de contaminantes como los óxidos de nitrógeno procedentes de las emisiones de vehículos o la industria y los compuestos orgánicos volátiles emitidos por los vehículos, los disolventes y la industria. Los niveles de ozono más elevados se registran durante los períodos de tiempo soleado. El exceso de ozono en el aire puede producir efectos adversos de consideración en la salud humana. Puede causar problemas respiratorios, provocar asma, reducir la función pulmonar y originar enfermedades pulmonares.';
        $gas->fix_values = '120 μg/m3 de media en 8h';
        $gas->information_values = '180 μg/m3';
        $gas->alert_values = '240 μg/m3';
        $gas->route_image = 'web';
        $gas->save();


        $gas = new Gas();
        $gas->name = 'Dióxido de nitrógeno (NO2)';
        $gas->description = 'Puede correlacionarse con varias actividades. En concentraciones de corta duración superiores a 200 mg/m3, es un gas tóxico que causa una importante inflamación de las vías respiratorias. Es la fuente principal de los aerosoles de nitrato, que constituyen una parte importante de las PM2.5 y, en presencia de luz ultravioleta, del ozono. Las principales fuentes de emisiones antropogénicas de NO2 son los procesos de combustión (calefacción, generación de electricidad y motores de vehículos y barcos). Estudios epidemiológicos han revelado que los síntomas de bronquitis en niños asmáticos aumentan en relación con la exposición prolongada al NO2. La disminución del desarrollo de la función pulmonar también se asocia con las concentraciones de NO2 registradas (u observadas) actualmente en ciudades europeas y norteamericanas.';
        $gas->fix_values = '200 μg/m3 de media en 24h.';
        $gas->information_values = '300 μg/m3';
        $gas->alert_values = '400 μg/m3';
        $gas->route_image = 'web';
        $gas->save();


        $gas = new Gas();
        $gas->name = 'Dióxido de azufre (SO2)';
        $gas->description = 'Es un gas incoloro con un olor penetrante que se genera con la combustión de fósiles (carbón y petróleo) y la fundición de menas que contienen azufre. La principal fuente antropogénica del SO2 es la combustión de fósiles que contienen azufre usados para la calefacción doméstica, la generación de electricidad y los vehículos a motor. Puede afectar al sistema respiratorio y las funciones pulmonares, y causa irritación ocular. La inflamación del sistema respiratorio provoca tos, secreción mucosa y agravamiento del asma y la bronquitis crónica; asimismo, aumenta la propensión de las personas a contraer infecciones del sistema respiratorio.';
        $gas->fix_values = '125 μg/m3 de media en 1h.';
        $gas->information_values = '300 μg/m3';
        $gas->alert_values = '500 μg/m3';
        $gas->route_image = 'web';
        $gas->save();


        $gas = new Gas();
        $gas->name = 'Plomo (Pb)';
        $gas->description = 'Es un metal tóxico presente de forma natural en la corteza terrestre. Su uso generalizado ha dado lugar a una importante contaminación ambiental, a la exposición humana y a graves problemas de salud pública en muchas partes del mundo.';
        $gas->fix_values = '0,5 μg/m3 media anual';
        $gas->information_values = '1,5 μg/m3 media anual';
        $gas->alert_values = '5 μg/m3 media anual';
        $gas->route_image = 'web';
        $gas->save();

        $gas = new Gas();
        $gas->name = 'Benceno (C6H6)';
        $gas->description = 'Es un líquido incoloro de olor dulce, se evapora al aire rápidamente y es sólo ligeramente soluble en agua. Es sumamente inflamable. as principales fuentes de benceno en el ambiente son los procesos industriales. Los niveles de benceno en el aire pueden aumentar por emisiones generadas por la combustión de carbón y petróleo, operaciones que involucran residuos o almacenaje de benceno, el tubo de escape de automóviles y evaporación de gasolina en estaciones de servicio. La exposición breve (5 a 10 minutos) a niveles muy altos de benceno en el aire (10,000 a 20,000 ppm) puede producir la muerte. Niveles más bajos (700 a 3,000 ppm) pueden producir letargo, mareo, aceleración del latido del corazón, dolor de cabeza, temblores, confusión y pérdida del conocimiento. En la mayoría de los casos, los efectos desaparecerán cuando la exposición termina y la persona empieza a respirar aire fresco.';
        $gas->fix_values = '5 μg/m3 media anual';
        $gas->information_values = '8 μg/m3 media anual';
        $gas->alert_values = '12 μg/m3 media anual';
        $gas->route_image = 'web';
        $gas->save();

        $gas = new Gas();
        $gas->name = 'Arsénico';
        $gas->description = 'Es un elemento natural de la corteza terrestre, distribuido en todo el medio ambiente, presente en el aire, el agua y la tierra. En su forma inorgánica es muy tóxico. La exposición a altos niveles de arsénico inorgánico puede deberse a diversas causas, como el consumo de agua contaminada o su uso para la preparación de comidas, para el riego de cultivos alimentarios y para procesos industriales, así como al consumo de tabaco y de alimentos contaminados.';
        $gas->fix_values = '6 ng/ m3 media anual';
        $gas->information_values = '10 ng/ m3 media anual';
        $gas->alert_values = '17 ng/ m3 media anual';
        $gas->route_image = 'web';
        $gas->save();


        $gas = new Gas();
        $gas->name = 'Benzo (a) pireno';
        $gas->description = 'Nocivos para la salud humana por su efecto bioacumulativo y cancerígeno, de los que constituye un buen trazador. Además de su elevada potencialidad para inducir tumores (sobre todo, de pulmón) también resultan irritantes para las vías aéreas y para los ojos; y son tóxicos para los organismos dependientes del medio acuático (incluidas las aves asociadas a dicho medio), por acumulación, sobre todo en invertebrados.';
        $gas->fix_values = '1 ng/ m3 media anual';
        $gas->information_values = '5 ng/ m3 media anual';
        $gas->alert_values = '12 ng/ m3 media anual';
        $gas->route_image = 'web';
        $gas->save();

    }
}
