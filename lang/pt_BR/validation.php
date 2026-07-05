<?php

return [
    'required' => 'O campo :attribute é obrigatório.',
    'email' => 'O campo :attribute deve ser um e-mail válido.',
    'unique' => 'O valor informado para :attribute já está em uso.',
    'min' => [
        'string' => 'O campo :attribute deve ter pelo menos :min caracteres.',
    ],
    'max' => [
        'string' => 'O campo :attribute não pode ter mais que :max caracteres.',
    ],
    'confirmed' => 'A confirmação do campo :attribute não corresponde.',
    'current_password' => 'A senha atual está incorreta.',

    'attributes' => [
        'name' => 'nome',
        'email' => 'e-mail',
        'password' => 'senha',
        'current_password' => 'senha atual',
        'password_confirmation' => 'confirmação de senha',
        'role' => 'perfil',
        'slug' => 'slug',
    ],
];
