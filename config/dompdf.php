<?php

return [
    'fontDir' => storage_path('fonts/'),
    'fontCache' => storage_path('fonts/'),
    'tempDir' => storage_path('temp/'),
    'options' => [
        'isHtml5ParserEnabled' => true,
        'isPhpEnabled' => true,
        'isPhpDebug' => false,
        'isHtml5PhpEnabled' => true,
        'chroot' => base_path(),
        'base_path' => public_path(),
        'fontDir' => storage_path('fonts/'),
        'fontCache' => storage_path('fonts/'),
        'tempDir' => storage_path('temp/'),
    ],
];
