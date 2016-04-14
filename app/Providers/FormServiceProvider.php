<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Form;

class FormServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->registerGroup();
		$this->registerSkill();
		$this->registerParagraph();
	}

	public function register()
	{
		//
	}

	protected function registerGroup()
	{
		Form::component('group', 'components.form.templates.group', ['type', 'name', 'label' => null, 'value' => null, 'attributes' => [], 'group' => []]);
	}

	protected function registerSkill()
	{
		Form::component('skill', 'components.form.templates.skill', ['name', 'years']);
	}

	protected function registerParagraph()
	{
		Form::component('paragraph', 'components.form.templates.paragraph', ['attributes']);
	}
}
