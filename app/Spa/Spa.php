<?php

namespace App\Spa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Spa
{
    /**
     * The variables that should be made available on the Spa JavaScript object.
     *
     * @var array
     */
    public static $jsonVariables = [];

    /**
     * Returns the JSON variables that should be provided to the global Spa JavaScript object.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array
     */
    public static function jsonVariables(Request $request)
    {
        return collect(static::$jsonVariables)->map(function ($variable) use ($request) {
            return is_callable($variable) ? $variable($request) : $variable;
        })->all();
    }

    /**
     * Provides additional variables to the global Spa JavaScript object.
     *
     * @param  array  $variables
     *
     * @return static
     */
    public static function provideToScript(array $variables)
    {
        if (empty(static::$jsonVariables)) {
            static::$jsonVariables = [
                'base' => static::path(),
                'userId' => Auth::id() ?? null,
            ];
        }

        static::$jsonVariables = array_merge(static::$jsonVariables, $variables);

        return new static;
    }
}
