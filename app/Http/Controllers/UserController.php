<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['hello']);
        $this->middleware('can')->except(['show']);
        $this->middleware('guest');
    }

    public function hello($name)
    {
        return view('hello', ['user' => $name]);
    } 
    
    public function show()
    {
        return 'Show Function';
    }
}
