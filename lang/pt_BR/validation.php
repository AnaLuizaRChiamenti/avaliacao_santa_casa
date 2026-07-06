<?php

return [
    'required' => 'O campo :attribute é obrigatório.',
    'required_if' => 'O campo :attribute é obrigatório quando :other for :value.',
    'email' => 'O campo :attribute deve ser um e-mail válido.',
    'unique' => 'O valor informado para :attribute já está em uso.',
    'regex' => 'O campo :attribute possui um formato inválido.',
    'confirmed' => 'A confirmação do campo :attribute não corresponde.',
    'current_password' => 'A senha atual está incorreta.',

    'min' => [
        'string' => 'O campo :attribute deve ter pelo menos :min caracteres.',
    ],

    'max' => [
        'string' => 'O campo :attribute não pode ter mais que :max caracteres.',
    ],

    'custom' => [
        'slug' => [
            'regex' => 'O slug deve conter apenas letras minúsculas, números e hífen.',
        ],
        'name' => [
            'regex' => 'O nome deve conter apenas letras, espaços, apóstrofo ou hífen.',
        ],
    ],

    'attributes' => [
        'name' => 'nome',
        'email' => 'e-mail',
        'password' => 'senha',
        'password_confirmation' => 'confirmação de senha',
        'current_password' => 'senha atual',
        'role' => 'perfil',
        'permissions' => 'permissões',
        'slug' => 'slug',
    ],
];
