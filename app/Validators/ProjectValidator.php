<?php
/**
 * Created by PhpStorm.
 * User: guilherme
 * Date: 06/12/15
 * Time: 20:28
 */

namespace CodeProject\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator
{

    protected $rules = [
        'name' => 'required|max:255'
    ];

}