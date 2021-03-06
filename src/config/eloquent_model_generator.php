<?php
return [
    'db_types' => [
        'enum' => 'string',
    ],
    'model_defaults' => [
        'namespace'       => 'App\\Models',
        'base_class_name' => '\\App\\Models\\BaseModel',
        'output_path'     => '\\Models',
        'no_timestamps'   => null,
        'date_format'     => null,
        'connection'      => null,
        'backup'          => null,
    ],
];
