<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PassagerController extends Controller
{
    public function showPassagerView()
    {
            $user = Auth::user(); 
    }
}
