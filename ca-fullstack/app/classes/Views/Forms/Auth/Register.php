<?php

namespace App\Views\Forms\Auth;

use Core\Views\Form;

class Register extends Form
{
    public function __construct(array $data = [])
    {

        $data = [
            'attr' => [
                'method' => 'POST',
                'class' => 'form'
            ],
            'title' => 'Register',
            'fields' => [
                'name' => [
                    'label' => 'Insert your name',
                    'type' => 'text',
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Your name...',
                        ]
                    ],
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_field_contains_only_letters',
                        'validate_field_length' => [
                            'min' => 1,
                            'max' => 40
                        ]
                    ]
                ],
                'surname' => [
                    'label' => 'Insert your surname',
                    'type' => 'text',
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Your surname...',
                        ]
                    ],
                    'validators' => [
                        'validate_field_not_empty',
                        'validate_field_contains_only_letters',
                        'validate_field_length' => [
                            'min' => 1,
                            'max' => 40
                        ]
                    ]
                ],
                'email' => [
                    'label' => 'Insert your email',
                    'type' => 'email',
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'Your email...',
                            'validate_field_is_email'
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
                'number' => [
                    'label' => 'Type your phone number',
                    'type' => 'number',
                    'extra' => [
                        'attr' => [
                            'placeholder' => '+370...',
                        ]
                    ],
                    'validators' => [
                        'validate_field_is_numeric'
                    ]
                ],
                'address' => [
                    'label' => 'Type your address',
                    'type' => 'text',
                    'extra' => [
                        'attr' => [
                            'placeholder' => 'P. Vileisio st...',
                        ]
                    ],
                    'validators' => []
                ],
            ],
            'validators' => [
                'validate_field_unique' => [
                    'field' => 'email'
                ]

            ],
            'buttons' => [
                'submit' => [
                    'title' => 'Register',
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
