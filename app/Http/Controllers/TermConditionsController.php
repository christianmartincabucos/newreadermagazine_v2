<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermConditionsController extends Controller
{
    public function termsconditions()
    {
        return view('terms.index');
    }
}
