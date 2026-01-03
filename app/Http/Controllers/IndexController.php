<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    function index()
    {
        return view('index');
    }

    function about()
    {
        return view('about', ['pageTitle' => 'About UUUs']);
    }

    function contact()
    {
        return view('contact' , ['pageTitle' => 'Contact UUUUs']);
    }
}
