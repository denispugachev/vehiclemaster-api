<?php
return [
    'components' => [
        'mongodb' => [
            'class' => \yii\mongodb\Connection::class,
            'dsn' => 'mongodb://localhost/vehiclemaster',
        ],
    ],
];
