<?php
/**
 * Created by PhpStorm.
 * User: guilherme
 * Date: 06/12/15
 * Time: 20:28
 */

namespace CodeProject\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectNoteValidator extends LaravelValidator
{

    protected $rules = [
        'project_id' => 'required|integer',
        'title' => 'required',
        'note' => 'required'
    ];

}