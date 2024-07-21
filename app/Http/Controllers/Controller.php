<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function renderError(string $message)
    {
        return view("error",["message" => $message]);
    }
}
