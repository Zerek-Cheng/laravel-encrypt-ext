<?php

return [

    'driver' => 'aes',

    'aes' => [
        'key' => app()['config']['app.key'],
        'cipher' => app()['config']['app.cipher'],
    ],
];
