<?php

namespace App\Controllers;

class Index extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
}
