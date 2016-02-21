<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Auth;

use App\Support\Traits\Sluggable;

/*
|--------------------------------------------------------------------------
| Article Model
|--------------------------------------------------------------------------
|
| The Article Model represents an Article that a User could Post to the
| site. Articles have a title and body, and may contain additional
| information, such as the User that created the Article.
|
*/
class Article extends Model
{
	//////////////
	//* Traits *//
	//////////////
	use Sluggable;

	/**
	 * Defines the Name of the Attribute that generates the Slug.
	 *
	 * @var string
	 */
	protected $sluggable = 'title';

	//////////////////
	//* Attributes *//
	//////////////////
	/**
	 * The attributes that are not mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['created_by', 'updated_by'];

	/////////////////////
	//* Boot Override *//
	/////////////////////
	/**
	 * Override the Boot Method to schedule tasks that are Event-Triggered.
	 *
	 * @return void
	 */
	public static function boot()
	{
		// Call the Parent Method
		parent::boot();

		// Intercept the 'Creating' Event
		static::creating(function($article)
		{
			// Initialize the Slug for the Article
			$article->makeSlug();

			// Assign the Author for the Article
			$article->author = Auth::user();
		});
	}

	/////////////////////
	//* Relationships *//
	/////////////////////
	/**
	 * Returns the User that created the Model.
	 *
	 * @return Relationship
	 */
	public function author()
	{
		return $this->belongsTo(User::class, 'created_by');
	}

	////////////////////////
	//* Attribute Overrides *//
	////////////////////////
	/**
	 * Overrides the $article->author Mutator to allow assignment.
	 *
	 * @return void
	 */
	public function setAuthorAttribute(User $author)
	{
		$this->created_by = $author->id;
	}
}
