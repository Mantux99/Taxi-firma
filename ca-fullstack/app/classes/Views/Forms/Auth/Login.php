<?php

namespace App\Views\Forms\Auth;

use Core\Views\Form;

class Login extends Form
{
    public function __construct(array $data = [])
    {
        $data = [
            'attr' => [
                'method' => 'POST',
                'class' => 'form'
            ],
            'title' => 'Login',
            'fields' => [
                'email' => [
                    'label' => 'Insert your email',
                    'type' => 'email',
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Your email...',
                        ]
                    ],
                    'validators' => [
                        'validate_field_not_empty',
                    ]
                ],
                'password' => [
                    'label' => 'Please enter your password',
                    'type' => 'password',
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Your password...',
                        ]
                    ],
                    'validators' => [
                        'validate_field_not_empty',
                    ]
                ],
            ],
            'validators' => [
                'validate_login'
            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Log in',
                    'extra' => [
                        'attr' => [
                            'class' => 'button'
                        ]
                    ],
                ],
            ],
            'callbacks' => [
                'success' => 'form_success',
                'fail' => 'form_fail',
            ],
        ];
        parent::__construct($data);
    }
}
