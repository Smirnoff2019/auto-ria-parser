<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Acura
    |--------------------------------------------------------------------------
    */
    'Acura' => [
        'models' => [
            'MDX' => ['year_from' => 2009],
            'TLX' => [],
            'ILX' => [],
        ],
        'transmission' => ['automatic'],
        'exclude_colors' => ['red','yellow','blue','cyan','green'],
        'max_mileage'=>300000,
    ],

    /*
    |--------------------------------------------------------------------------
    | Audi
    |--------------------------------------------------------------------------
    */
    'Audi' => [
        'models' => [
            'A3'=>['year_from'=>2010],'A4'=>['year_from'=>2010],'A5'=>['year_from'=>2010],
            'A6'=>['year_from'=>2010],'A7 Sportback'=>['year_from'=>2010],'A8'=>['year_from'=>2010],
            'Q5'=>['year_from'=>2010],'Q7'=>['year_from'=>2010],'Q8'=>['year_from'=>2010],
            'SQ5'=>['year_from'=>2010],'SQ7'=>['year_from'=>2010],'SQ8'=>['year_from'=>2010],
            'RS Q8'=>['year_from'=>2010],'RS3'=>['year_from'=>2010],'RS4'=>['year_from'=>2010],
            'RS5'=>['year_from'=>2010],'RS6'=>['year_from'=>2010],'RS7 Sportback'=>['year_from'=>2010],
            'S3'=>['year_from'=>2010],'S5'=>['year_from'=>2010],'S6'=>['year_from'=>2010],
            'S7 Sportback'=>['year_from'=>2010],'S8'=>['year_from'=>2010],
        ],
        'transmission'=>['automatic'],
        'drive'=>['4x4'],
        'exclude_colors'=>['red','yellow','blue','cyan','green'],
        'max_mileage'=>300000,
    ],

    /*
    |--------------------------------------------------------------------------
    | BMW
    |--------------------------------------------------------------------------
    */
    'BMW'=>[
        'models'=>[
            '1 Series'=>['year_from'=>2006,'transmission'=>['automatic','mechanical']],
            '2 Series'=>['year_from'=>2006,'transmission'=>['automatic','mechanical']],
            '3 Series'=>['year_from'=>2006,'transmission'=>['automatic','mechanical']],
            '4 Series'=>['year_from'=>2006],'5 Series'=>['year_from'=>2006],'6 Series'=>['year_from'=>2006],
            '7 Series'=>['year_from'=>2006],'8 Series'=>['year_from'=>2006],
            'X1'=>['year_from'=>2006],'X3'=>['year_from'=>2006],'X5'=>['year_from'=>2006],
            'X6'=>['year_from'=>2006],'X7'=>['year_from'=>2006],
            'M1'=>['year_from'=>2006],'M2'=>['year_from'=>2006],'M3'=>['year_from'=>2006],
            'M4'=>['year_from'=>2006],'M5'=>['year_from'=>2006],'M6'=>['year_from'=>2006],
            'M8'=>['year_from'=>2006],
            'X3 M'=>['year_from'=>2006],'X5 M'=>['year_from'=>2006],'X6 M'=>['year_from'=>2006],
        ],
        'transmission'=>['automatic'],
        'exclude_colors'=>['red','green','yellow'],
        'max_mileage'=>300000,
    ],

    /*
    |--------------------------------------------------------------------------
    | Chevrolet
    |--------------------------------------------------------------------------
    */
    'Chevrolet'=>[
        'models'=>[
            'Cruze'=>['year_from'=>2010],
            'Captiva'=>['year_from'=>2010],
        ],
        'transmission'=>['automatic'],
        'exclude_colors'=>['red','blue','yellow','green'],
        'max_mileage'=>300000,
    ],

    /*
    |--------------------------------------------------------------------------
    | Citroen
    |--------------------------------------------------------------------------
    */
    'Citroen'=>[
        'models'=>[
            'C4 Cactus'=>[],
        ],
        'transmission'=>['automatic'],
        'max_mileage'=>300000,
    ],

    /*
    |--------------------------------------------------------------------------
    | Cupra
    |--------------------------------------------------------------------------
    */
    'Cupra'=>[
        'models'=>['*'=>[]],
        'exclude_fuel'=>['electric'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Dodge
    |--------------------------------------------------------------------------
    */
    'Dodge'=>[
        'models'=>[
            'Journey'=>[],
            'Challenger'=>[],
            'Caliber'=>[],
        ],
        'transmission'=>['automatic'],
        'max_mileage'=>300000,
    ],

    /*
    |--------------------------------------------------------------------------
    | Fiat
    |--------------------------------------------------------------------------
    */
    'Fiat'=>[
        'models'=>[
            '500'=>[],'500L'=>[],'500X'=>[],'Tipo'=>[],
        ],
        'transmission'=>['automatic'],
        'max_mileage'=>300000,
    ],

    /*
    |--------------------------------------------------------------------------
    | Ford
    |--------------------------------------------------------------------------
    */
    'Ford'=>[
        'models'=>[
            'Fiesta'=>['year_from'=>2009,'transmission'=>['automatic','mechanical']],
            'Focus'=>['year_from'=>2009,'transmission'=>['automatic','mechanical']],
            'Fusion'=>['year_from'=>2009],
            'Escape'=>['year_from'=>2009],
            'Kuga'=>['year_from'=>2009],
            'Edge'=>['year_from'=>2009],
            'Explorer'=>['year_from'=>2009],
            'Puma'=>['year_from'=>2009],
            'Mondeo'=>['year_from'=>2009,'transmission'=>['automatic','mechanical']],
            'S-Max'=>['year_from'=>2009,'transmission'=>['automatic','mechanical']],
            'Mustang'=>['year_from'=>2009],
        ],
        'exclude_engine'=>['1.0','1.2','1.3'],
        'max_mileage'=>250000,
        'transmission'=>['automatic'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Genesis
    |--------------------------------------------------------------------------
    */
    'Genesis'=>[
        'models'=>['*'=>[]],
    ],

    /*
    |--------------------------------------------------------------------------
    | Honda
    |--------------------------------------------------------------------------
    */
    'Honda'=>[
        'models'=>[
            'Accord'=>['year_from'=>2008],
            'Civic'=>['year_from'=>2008],
            'CR-V'=>['year_from'=>2008],
            'HR-V'=>['year_from'=>2008],
            'Jazz'=>['year_from'=>2008],
            'Pilot'=>['year_from'=>2008],
            'Odyssey'=>['year_from'=>2008],
            'Fit'=>['year_from'=>2008],
            'Passport'=>['year_from'=>2008],
        ],
        'transmission'=>['automatic'],
        'exclude_colors'=>['red','green','blue','yellow','cyan'],
        'max_mileage'=>300000,
    ],

    /*
    |--------------------------------------------------------------------------
    | Hyundai
    |--------------------------------------------------------------------------
    */
    'Hyundai'=>[
        'models'=>[
            'Accent'=>[],'Elantra'=>[],'Sonata'=>[],'Tucson'=>[],
            'Santa FE'=>[],'Grand SantaFe'=>[],'i30'=>[],'i40'=>[],
            'Kona'=>[],'Palisade'=>[],'Getz'=>[],'Staria'=>[],
        ],
        'transmission'=>['automatic'],
        'exclude_colors'=>['red','cyan','green','yellow'],
        'max_mileage'=>250000,
    ],

    /*
    |--------------------------------------------------------------------------
    | Infiniti
    |--------------------------------------------------------------------------
    */
    'Infiniti'=>[
        'models'=>[
            'Q50'=>[],'Q60'=>[],'QX70'=>[],'Q70'=>[],
        ],
        'transmission'=>['automatic'],
        'drive'=>['4x4'],
        'exclude_colors'=>['red','blue','cyan','green','yellow'],
        'max_mileage'=>150000,
    ],

    /*
    |--------------------------------------------------------------------------
    | Jaguar
    |--------------------------------------------------------------------------
    */
    'Jaguar'=>[
        'models'=>[
            'F-Pace'=>[],'F-Type'=>[],
        ],
        'max_mileage'=>120000,
    ],

    /*
    |--------------------------------------------------------------------------
    | Jeep
    |--------------------------------------------------------------------------
    */
    'Jeep'=>[
        'models'=>[
            'Avenger'=>['year_from'=>2015],
            'Cherokee'=>['year_from'=>2015],
            'Compass'=>['year_from'=>2015],
            'Grand Cherokee'=>['year_from'=>2015],
            'Wrangler'=>['year_from'=>2015],
            'Renegade'=>['year_from'=>2015],
        ],
        'max_mileage'=>150000,
        'exclude_colors'=>['yellow','red'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Kia
    |--------------------------------------------------------------------------
    */
    'Kia'=>[
        'models'=>[
            'Ceed'=>['year_from'=>2008,'transmission'=>['automatic','mechanical']],
            'Ceed SW'=>['year_from'=>2008,'transmission'=>['automatic','mechanical']],
            'Cerato'=>['year_from'=>2008],
            'Cerato Koup'=>['year_from'=>2008],
            'Niro'=>['year_from'=>2008],
            'Optima'=>['year_from'=>2008],
            'Picanto'=>['year_from'=>2008],
            'Rio'=>['year_from'=>2008,'transmission'=>['automatic','mechanical']],
            'Sedona'=>['year_from'=>2008],
            'Sorento'=>['year_from'=>2008],
            'Soul'=>['year_from'=>2008],
            'Sportage'=>['year_from'=>2008],
            'Stinger'=>['year_from'=>2008],
            'Stonic'=>['year_from'=>2008],
        ],
        'transmission'=>['automatic'],
        'exclude_colors'=>['red','cyan','green','yellow'],
        'max_mileage'=>300000,
    ],

    /*
    |--------------------------------------------------------------------------
    | Land Rover
    |--------------------------------------------------------------------------
    */
    'Land Rover'=>[
        'models'=>[
            'Range Rover'=>['year_from'=>2014,'max_mileage'=>200000],
            'Discovery'=>['year_from'=>2016],
            'Range Rover Sport'=>['year_from'=>2016],
            'Defender'=>['year_from'=>2017],
            'Range Rover Velar'=>[],
            'Freelander'=>['year_from'=>2008],
            'Discovery Sport'=>[],
        ],
        'transmission'=>['automatic'],
        'drive'=>['4x4'],
        'max_mileage'=>300000,
    ],

    /*
    |--------------------------------------------------------------------------
    | Lexus
    |--------------------------------------------------------------------------
    */
    'Lexus'=>[
        'models'=>[
            'CT'=>['year_from'=>2008],
            'LS'=>['year_from'=>2008],
            'LX'=>['year_from'=>2008],
            'RX'=>['year_from'=>2008],
            'ES'=>['year_from'=>2012],
            'GS'=>['year_from'=>2012],
            'GX'=>['year_from'=>2012],
            'IS'=>['year_from'=>2012],
            'NX'=>['year_from'=>2012],
            'RC'=>['year_from'=>2012],
            'UX'=>['year_from'=>2012],
        ],
        'transmission'=>['automatic'],
        'max_mileage'=>300000,
        'exclude_colors'=>['red','yellow','cyan','blue'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Mazda
    |--------------------------------------------------------------------------
    */
    'Mazda'=>[
        'models'=>[
            '3'=>['year_from'=>2006,'transmission'=>['automatic','mechanical']],
            '6'=>['year_from'=>2006,'transmission'=>['automatic','mechanical']],
            'CX-30'=>['year_from'=>2015],
            'CX-5'=>['year_from'=>2015],
            'CX-50'=>['year_from'=>2015],
            'CX-60'=>['year_from'=>2015],
            'CX-7'=>['year_from'=>2015],
            'CX-70'=>['year_from'=>2015],
            'CX-8'=>['year_from'=>2015],
            'CX-80'=>['year_from'=>2015],
            'CX-9'=>['year_from'=>2015],
            'CX-90'=>['year_from'=>2015],
        ],
        'fuel'=>['petrol','gas'],
        'transmission'=>['automatic'],
        'max_mileage'=>300000,
    ],

    /*
    |--------------------------------------------------------------------------
    | Mercedes-Benz
    |--------------------------------------------------------------------------
    */
    'Mercedes-Benz'=>[
        'models'=>[
            'M-Class'=>['year_from'=>2010],'GL-Class'=>['year_from'=>2010],'CL-Class'=>['year_from'=>2010],
            'A-Class'=>['year_from'=>2010],'C-Class'=>['year_from'=>2010],'CLS-Class'=>['year_from'=>2010],
            'E-Class'=>['year_from'=>2010],'G-Class'=>['year_from'=>2010],
            'GLA-Class'=>['year_from'=>2010],'GLC-Class'=>['year_from'=>2010],
            'GLC-Class Coupe'=>['year_from'=>2010],'GLE-Class'=>['year_from'=>2010],
            'GLE-Class Coupe'=>['year_from'=>2010],'GLS-Class'=>['year_from'=>2010],
            'S-Class'=>['year_from'=>2010],'V-Class'=>['year_from'=>2010],
        ],
        'transmission'=>['automatic'],
        'exclude_engine'=>['4.7'],
        'exclude_colors'=>['red','cyan','blue','yellow','green'],
        'exclude_body'=>['universal'],
        'max_mileage'=>300000,
    ],

    /*
    |--------------------------------------------------------------------------
    | Mini
    |--------------------------------------------------------------------------
    */
    'Mini'=>[
        'models'=>[
            'Cooper'=>['year_from'=>2014],
            'Countryman'=>['year_from'=>2014],
            'Hatch'=>['year_from'=>2014],
        ],
        'transmission'=>['automatic'],
        'exclude_colors'=>['red','yellow','green'],
        'max_mileage'=>300000,
    ],

    /*
    |--------------------------------------------------------------------------
    | Mitsubishi
    |--------------------------------------------------------------------------
    */
    'Mitsubishi'=>[
        'models'=>[
            'Pajero Wagon'=>['year_from'=>2008],
            'Eclipse Cross'=>['year_from'=>2008],
            'Lancer'=>['year_from'=>2008],
            'Outlander'=>['year_from'=>2008],
        ],
        'transmission'=>['automatic'],
        'max_mileage'=>250000,
    ],

    /*
    |--------------------------------------------------------------------------
    | Nissan
    |--------------------------------------------------------------------------
    */
    'Nissan'=>[
        'models'=>[
            '350Z'=>['year_from'=>2006],'370Z'=>['year_from'=>2006],'GT-R'=>['year_from'=>2006],
            'Juke'=>['year_from'=>2006],'Note'=>['year_from'=>2006],
            'Qashqai'=>['year_from'=>2006],'Rogue'=>['year_from'=>2006],
            'Rogue Sport'=>['year_from'=>2006],'TIIDA'=>['year_from'=>2006],
            'X-Trail'=>['year_from'=>2006],
        ],
        'max_mileage'=>300000,
    ],

    /*
    |--------------------------------------------------------------------------
    | Opel
    |--------------------------------------------------------------------------
    */
    'Opel'=>[
        'models'=>[
            'Astra'=>['year_from'=>2010],
            'Vectra'=>['year_from'=>2010],
            'Zafira'=>['year_from'=>2010],
            'Insignia'=>['year_from'=>2010],
            'Vivaro'=>['year_from'=>2010,'body'=>'passenger'],
        ],
        'max_mileage'=>300000,
    ],

    /*
    |--------------------------------------------------------------------------
    | Peugeot
    |--------------------------------------------------------------------------
    */
    'Peugeot'=>[
        'models'=>['*'=>['year_from'=>2008]],
        'transmission'=>['automatic'],
        'max_mileage'=>300000,
    ],

    /*
    |--------------------------------------------------------------------------
    | Porsche
    |--------------------------------------------------------------------------
    */
    'Porsche'=>[
        'models'=>['*'=>[]],
        'transmission'=>['automatic'],
        'max_mileage'=>100000,
    ],

    /*
    |--------------------------------------------------------------------------
    | Renault
    |--------------------------------------------------------------------------
    */
    'Renault'=>[
        'models'=>[
            'Grand Scenic'=>[],'Scenic'=>[],'Megane'=>[],'Captur'=>[],
            'Kaptur'=>[],'Kadjar'=>[],'Duster'=>[],
            'Espace'=>[],'Kangoo'=>[],'Talisman'=>[],
        ],
        'transmission'=>['automatic','mechanical'],
        'max_mileage'=>300000,
    ],

    /*
    |--------------------------------------------------------------------------
    | Seat
    |--------------------------------------------------------------------------
    */
    'Seat'=>[
        'models'=>[
            'Ibiza'=>['year_from'=>2012],
            'Leon'=>['year_from'=>2012],
            'Exeo ST'=>['year_from'=>2012],
            'Tarraco'=>['year_from'=>2012],
        ],
        'transmission'=>['automatic'],
        'exclude_colors'=>['red','yellow','cyan'],
        'max_mileage'=>300000,
    ],

    /*
    |--------------------------------------------------------------------------
    | Skoda
    |--------------------------------------------------------------------------
    */
    'Skoda'=>[
        'models'=>[
            'Fabia'=>['year_from'=>2008],'Kamiq'=>['year_from'=>2008],
            'Karoq'=>['year_from'=>2008],'Kodiaq'=>['year_from'=>2008],
            'Octavia'=>['year_from'=>2008],'Scala'=>['year_from'=>2008],
            'Superb'=>['year_from'=>2008],
        ],
        'exclude_colors'=>['cyan','red','yellow','green'],
        'max_mileage'=>300000,
    ],

    /*
    |--------------------------------------------------------------------------
    | Subaru
    |--------------------------------------------------------------------------
    */
    'Subaru'=>[
        'models'=>[
            'Forester'=>['year_from'=>2008],
            'Impreza'=>['year_from'=>2008],
            'Outback'=>['year_from'=>2008],
        ],
        'transmission'=>['automatic'],
        'fuel'=>['petrol'],
        'exclude_colors'=>['cyan','red','yellow','green'],
        'max_mileage'=>300000,
    ],

    /*
    |--------------------------------------------------------------------------
    | Suzuki
    |--------------------------------------------------------------------------
    */
    'Suzuki'=>[
        'models'=>[
            'Grand Vitara'=>['year_from'=>2008],
            'SX4'=>['year_from'=>2008],
        ],
        'transmission'=>['automatic'],
        'exclude_colors'=>['red','yellow','green','cyan','blue'],
        'max_mileage'=>300000,
    ],

    /*
    |--------------------------------------------------------------------------
    | Toyota
    |--------------------------------------------------------------------------
    */
    'Toyota'=>[
        'models'=>[
            'RAV4'=>['year_from'=>2008],'Camry'=>['year_from'=>2008],
            'Corolla'=>['year_from'=>2008],'Avensis'=>['year_from'=>2008],
            'C-HR'=>['year_from'=>2008],'Yaris'=>['year_from'=>2008],
            'Yaris Cross'=>['year_from'=>2008],'Corolla Cross'=>['year_from'=>2008],
            'Auris'=>['year_from'=>2008],'Hilux'=>['year_from'=>2008],
            'Highlander'=>['year_from'=>2008],'Sienna'=>['year_from'=>2008],
            'Avalon'=>['year_from'=>2008],
            'Land Cruiser'=>['year_from'=>2008],
            'Land Cruiser Prado'=>['year_from'=>2008],
        ],
        'transmission'=>['automatic'],
        'max_mileage'=>300000,
    ],

    /*
    |--------------------------------------------------------------------------
    | Volkswagen
    |--------------------------------------------------------------------------
    */
    'Volkswagen'=>[
        'models'=>[
            'Passat'=>['year_from'=>2015],'Touareg'=>['year_from'=>2015],
            'Touran'=>['year_from'=>2015],'Golf'=>['year_from'=>2015],
            'Tiguan'=>['year_from'=>2015],'Jetta'=>['year_from'=>2015],
            'Multivan'=>['year_from'=>2015],'CC / Passat CC'=>['year_from'=>2015],
            'Amarok'=>['year_from'=>2015],'Atlas'=>['year_from'=>2015],
            'Caddy'=>['year_from'=>2015],'Golf GTI'=>['year_from'=>2015],
            'Golf GTD'=>['year_from'=>2015],'Golf R'=>['year_from'=>2015],
            'Polo'=>['year_from'=>2015],'Tiguan Allspace'=>['year_from'=>2015],
        ],
        'max_mileage'=>300000,
    ],

    /*
    |--------------------------------------------------------------------------
    | Volvo
    |--------------------------------------------------------------------------
    */
    'Volvo'=>[
        'models'=>[
            'V50'=>['year_from'=>2010],
            'XC90'=>['year_from'=>2010],
            'XC60'=>['year_from'=>2010],
        ],
        'transmission'=>['automatic'],
        'max_mileage'=>300000,
    ],

];
