<?php

use App\Models\Level;

return [
    'mail_order' => [
        'out' => [
            Level::LEVEL_TU,
            Level::LEVEL_KETUM,
            Level::LEVEL_SEKRETARIS,
            Level::LEVEL_KABID,
            Level::LEVEL_KADEP,
            Level::LEVEL_ANGGOTA,
        ],

        'in' => [
            Level::LEVEL_ANGGOTA,
            Level::LEVEL_KADEP,
            Level::LEVEL_KABID,
            Level::LEVEL_KETUM,
            Level::LEVEL_SEKRETARIS,
            Level::LEVEL_TU,
        ]
    ],


    'disposition_tag' => [
        Level::LEVEL_KETUM,
        Level::LEVEL_SEKRETARIS,
    ]
];
