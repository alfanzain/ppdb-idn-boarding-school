<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentRegistrationController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('guest.student-registration.form');
    }
}
