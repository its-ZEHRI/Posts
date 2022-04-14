<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /** * @return void */

    public function __construct()
    {
        $this->middleware('auth');
    }

    /** * @return \Illuminate\Contracts\Support\Renderable */

    public function index()
    {
        return view('home');
    }
}
