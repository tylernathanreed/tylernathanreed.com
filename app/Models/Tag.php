<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Conner\Tagging\Model\Tag as BaseTag;

/*
|--------------------------------------------------------------------------
| Tag Model
|--------------------------------------------------------------------------
|
| The Tag Model represents an Tag that a User could Post to the
| site. Tags have a title and body, and may contain additional
| information, such as the User that created the Tag.
|
*/
class Tag extends BaseTag
{

}
