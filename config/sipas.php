<?php

use App\Models\Level;

return [
    // 'mail_order' => [
    //     'out' => [
    //         Level::LEVEL_TU,
    //         Level::LEVEL_KADIS,
    //         Level::LEVEL_SEKRETARIS,
    //         Level::LEVEL_KABID,
    //         Level::LEVEL_KASIE,
    //         Level::LEVEL_STAF,
    //     ],

    //     'in' => [
    //         Level::LEVEL_TU,
    //         Level::LEVEL_SEKRETARIS,
    //         Level::LEVEL_KADIS,
    //         Level::LEVEL_KABID,
    //         Level::LEVEL_KASIE,
    //         Level::LEVEL_STAF,
    //     ]
    // ],

    'mail_order' => [
        'out' => [
            Level::LEVEL_TU => Level::LEVEL_KADIS,
            Level::LEVEL_KADIS => Level::LEVEL_SEKRETARIS,
            Level::LEVEL_SEKRETARIS => [
                Level::LEVEL_KASUBBAG,
                Level::LEVEL_KABID,
            ],
            Level::LEVEL_KASUBBAG => Level::LEVEL_STAF_SUBBAG,
            Level::LEVEL_KABID => Level::LEVEL_KASIE,
            Level::LEVEL_KASIE => Level::LEVEL_STAF_SEKSIE,
        ],

        'in' => [
            Level::LEVEL_TU => Level::LEVEL_SEKRETARIS,
            Level::LEVEL_SEKRETARIS => Level::LEVEL_KADIS,
            Level::LEVEL_KADIS => [
                Level::LEVEL_KASUBBAG,
                Level::LEVEL_KABID,
            ],
            Level::LEVEL_KASUBBAG => Level::LEVEL_STAF_SUBBAG,
            Level::LEVEL_KABID => Level::LEVEL_KASIE,
            Level::LEVEL_KASIE => Level::LEVEL_STAF_SEKSIE,
        ]
    ],

    'disposition_tag' => [
        Level::LEVEL_KADIS,
        Level::LEVEL_SEKRETARIS,
    ],

    'all_mail_access_tag' => [
        Level::LEVEL_KADIS,
        Level::LEVEL_SEKRETARIS,
    ],

    'department_mail_code' => [
        'Ilmu Pengetahuan' => 'A',
    ],
];
