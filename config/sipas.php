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
            Level::LEVEL_TU,
            Level::LEVEL_SEKRETARIS,
            Level::LEVEL_KETUM,
            Level::LEVEL_KABID,
            Level::LEVEL_KADEP,
            Level::LEVEL_ANGGOTA,
        ]
    ],


    'disposition_tag' => [
        Level::LEVEL_KETUM,
        Level::LEVEL_SEKRETARIS,
    ]
];
