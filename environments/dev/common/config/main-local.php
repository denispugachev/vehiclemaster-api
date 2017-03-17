<?php
return [
    'components' => [
        'mongodb' => [
            'class' => \yii\mongodb\Connection::class,
            'dsn' => 'mongodb://localhost:27017/mydatabase',
        ],
    ],
];
