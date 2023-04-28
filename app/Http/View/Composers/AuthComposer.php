<?php

namespace App\Http\View\Composers;

use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\View\View;

class AuthComposer extends Composer
{
    /**
     * The auth factory implementation.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new profile composer.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     *
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Binds the composer data to the specified view.
     *
     * @param  \Illuminate\View\View  $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('auth', $this->auth->user());
    }

    /**
     * Returns the views to attach this composer to.
     *
     * @return array
     */
    public function composes()
    {
        return ['*'];
    }
}
