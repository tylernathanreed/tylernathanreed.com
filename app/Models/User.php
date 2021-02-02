<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    use Concerns\HasResource;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Returns the avatar field for this model.
     *
     * @return \Nova\Fields\Field
     */
    public function getAvatarField()
    {
        return tap($this->resource->getAvatarField(), function($field) {
            $field->resolve($this);
        });
    }

    /**
     * Returns the avatar url for this user.
     *
     * @return string
     */
    public function getAvatarUrl()
    {
        return $this->getAvatarField()->resolveThumbnailUrl();
    }
}
