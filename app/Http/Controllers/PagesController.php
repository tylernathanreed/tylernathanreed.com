<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Displays the index page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('pages.index');
    }

    /**
     * Displays the resume page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function resume()
    {
        return view('pages.resume');
    }

    /**
     * Displays the about page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about()
    {
        return view('pages.about');
    }
}
