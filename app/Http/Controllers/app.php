<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class app extends Controller
{
    public function getHome()
    {

        return view('app.home');

    }
}
