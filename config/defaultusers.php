<?php

return [
    'user' => [
        'name' => env('USER_NAME', 'UserDefault'),
        'email' => env('USER_EMAIL', 'user@example.com'),
        'password' => env('USER_PASSWORD', 'password'),
    ],
    'professor' => [
        'name' => env('PROFESSOR_NAME', 'ProfessorDefault'),
        'email' => env('PROFESSOR_EMAIL', 'professor@example.com'),
        'password' => env('PROFESSOR_PASSWORD', 'password'),
    ],
];
