<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Frontend Views Of API
 *
 * @Resource("Frontend", uri="/")
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the Application Dashboard
     *
     * @Get("/home")
     */
    public function index()
    {
        return view('home');
    }
}
