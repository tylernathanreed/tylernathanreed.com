<?php

namespace App\Providers;

use Form;
use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->registerParagraph();
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Adds the Form::paragraph() component.
	 *
	 * @return void
	 */
	protected function registerParagraph()
	{
		/**
		 * Creates a Paragraph for the Resume Page.
		 *
		 * @param  array  $attributes  The Attributes of the Paragraph.
		 *
		 * @return string  The Html that constructs the Skill.
		 */
		Form::component('paragraph', 'components.forms.templates.paragraph', ['attributes']);
	}
}
