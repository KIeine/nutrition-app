<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Provision a new web server.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return inertia('Home');
    }
}
