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
        return inertia('Index');
    }

    /**
     * Displays the about page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about()
    {
        return inertia('About');
    }

    /**
     * Displays the contact page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contact()
    {
        return inertia('Contact');
    }

    /**
     * Displays the projects page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function projects()
    {
        return inertia('Projects');
    }

    /**
     * Displays the resume page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function resume()
    {
        return inertia('Resume');
    }
}
