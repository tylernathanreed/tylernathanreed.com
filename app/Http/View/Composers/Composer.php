<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;

abstract class Composer
{
    /**
     * Binds the composer data to the specified view.
     *
     * @param  \Illuminate\View\View  $view
     *
     * @return void
     */
    public function compose(View $view)
    {
    	//
    }

    /**
     * Returns the views to attach this composer to.
     *
     * @return array
     */
    public function composes()
    {
    	return [];
    }
}