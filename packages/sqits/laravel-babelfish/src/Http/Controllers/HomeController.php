<?php

namespace Sqits\Babelfish\Http\Controllers;

use Illuminate\Support\Facades\App;
use Laravel\Horizon\Horizon;

class HomeController extends Controller
{
    /**
     * Single page application catch-all route.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('babelfish::test', []);
    }
}
