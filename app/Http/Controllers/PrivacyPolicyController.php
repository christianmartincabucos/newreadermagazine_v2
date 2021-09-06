<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    public function privacypolicy()
    {
        return view('policy.index');
    }
}
