<?php

namespace App\Views\Forms\Comments;

class CommentForm extends \Core\Views\Form
{
     public function __construct(array $data = [])
     {
         $form = [
             'attr' => [
                 'method' => 'POST',
                 'class' => 'comment_form',
                 'id' => 'commentForm'
             ],
             'title' => 'Comment',
             'fields' => [
                 'comment' => [
                     'type' => 'textarea',
                     'validators' => [
                         'validate_user_logged_in',
                         'validate_field_not_empty',
                         'validate_field_length' => [
                             'min' => 1,
                             'max' => 500
                         ]
                       
                     ],
                     'extra' => [
                         'attr' => [
                             'placeholder' => 'Type your text here...',
                         ]
                     ]
                 ],
             ],
             'buttons' => [
                'submit' => [
                    'title' => 'Send',
                    'extra' => [
                        'attr' => [
                            'class' => 'button'
                        ]
                    ],
                ],
        
            ],
             'callbacks' => [
                 'success' => 'form_success',
                 'fail' => 'fail',
             ]
         ];

         parent::__construct($form);
     }
     public function setId(int $id) {
        $this->data['fields']['id']['value'] = $id;
    }
}