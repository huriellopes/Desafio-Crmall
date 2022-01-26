<?php

namespace App\Architeture\Comics\Validate;

use App\Architeture\Validate;

class WebServiceValidate extends Validate
{
    protected $rules = [
        'comicID' => 'required|integer'
    ];

    protected $messages = [
        'comicID.required' => 'ComicId is Required.'
    ];
}
