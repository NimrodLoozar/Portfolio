<?php

return [
    'required' => 'A(z) :attribute mező kitöltése kötelező.',
    'email' => 'A(z) :attribute nem érvényes e-mail cím.',
    'min' => [
        'string' => 'A(z) :attribute legalább :min karakter hosszú kell legyen.',
    ],
    'max' => [
        'string' => 'A(z) :attribute nem lehet hosszabb :max karakternél.',
    ],
    'confirmed' => 'A(z) :attribute megerősítése nem egyezik.',
    'unique' => 'A(z) :attribute már foglalt.',
    
    'attributes' => [
        'name' => 'név',
        'email' => 'e-mail cím',
        'password' => 'jelszó',
        'password_confirmation' => 'jelszó megerősítése',
    ],
];
