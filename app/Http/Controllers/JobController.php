<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\Job;   

class JobController extends Controller
{
    function index()
    {
        $data = Job::all();
        return view('job/index', ['jobs' => $data, 'name' => 'HHHHHHassan']);
    }
}
