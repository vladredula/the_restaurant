<?php

namespace App\Http\Controllers;

use hisorange\BrowserDetect\Parser as Browser;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function __construct()
    {
        if (!Browser::isMobile()) {
            $this->middleware('auth');
        }
    }
    //
    public function index()
    {
        return view('menu');
    }
}
