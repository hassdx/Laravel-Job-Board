<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job 
{
    public static function all()
    {
        return [
            ['title' => 'Software Engineer', 'salary' => '100000'],
            ['title' => 'Data Scientist', 'salary' => '120000'],
            ['title' => 'Product Manager', 'salary' => '110000'],
        ];
    }
}
