<?php

return [
    'required' => 'Het :attribute veld is verplicht.',
    'email' => 'Het :attribute moet een geldig e-mailadres zijn.',
    'min' => [
        'string' => 'Het :attribute moet minimaal :min tekens bevatten.',
    ],
    'max' => [
        'string' => 'Het :attribute mag niet langer zijn dan :max tekens.',
    ],
    'confirmed' => 'De :attribute bevestiging komt niet overeen.',
    'unique' => 'Het :attribute is al in gebruik.',
    
    'attributes' => [
        'name' => 'naam',
        'email' => 'e-mailadres',
        'password' => 'wachtwoord',
        'password_confirmation' => 'wachtwoord bevestiging',
    ],
];
