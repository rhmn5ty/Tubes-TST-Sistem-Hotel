<?php

namespace App\Controllers;

class About extends BaseController
{
    public function index(): string
    {
        return view('header') . view('menu') . view('about') . view('footer');
    }
}
