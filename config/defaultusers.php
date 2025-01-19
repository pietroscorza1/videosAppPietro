<?php

return [
    'user' => [
        'id' => env('USER_ID', 0),
        'name' => env('USER_NAME', 'UserDefault'),
        'email' => env('USER_EMAIL', 'user@example.com'),
        'password' => env('USER_PASSWORD', 'password'),
        'current_team_id' =>env("TEAM_ID", '1')

    ],
    'professor' => [
        'id' => env('PROFESSOR_ID', 1),
        'name' => env('PROFESSOR_NAME', 'ProfessorDefault'),
        'email' => env('PROFESSOR_EMAIL', 'professor@example.com'),
        'password' => env('PROFESSOR_PASSWORD', 'password'),
        'current_team_id' =>env("TEAM_ID", '2')
    ],
    'team_user' => [
        'id'=> env('TEAM_USER_ID', 0),
        'user_id'=> env('USER_ID', 0),
        'name' => env('TEAM_USER_NAME', 'TeamDefaultUser')
    ],
    'team_professor' => [
        'id'=> env('TEAM_PROFESSOR_ID', 1),
        'professor_id'=> env('PROFESSOR_ID', 1),
        'name' => env('TEAM_PROFESSOR_NAME', 'TeamDefaultProfessor')
    ]
];
