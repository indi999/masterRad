<?php


namespace App\Http\Classes;


class Tasks
{
    public static $validationRules = [
        'number' => 'required|integer|unique:tasks',
        'brand' => 'required|string|max:50',
        'client' => 'required|string|max:50',
        'saller_id' => 'required|integer',
        'desc' => 'required|string|max:10000',
        'date_end' => 'required|string|max:50',
    ];


}
