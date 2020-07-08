<?php

namespace App\Views\Forms\Comments;

use App\Views\Forms\Comments\CommentForm;

class CommentCreateForm extends CommentForm
{
    public function __construct(array $data = [])
    {
        parent::__construct($data);
        $this->data['buttons']['submit']['title'] = 'Send';
    }

}