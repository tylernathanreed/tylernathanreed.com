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
		$this->registerPanel();
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
	 * Adds the Form::group() component.
	 *
	 * @return void
	 */
	protected function registerGroup()
	{
		/**
		 * Creates a Form Group.
		 *
		 * @param  string       $type   The Input Type within the Group.
		 * @param  string       $name   The Name of the Input.
		 * @param  string|null  $label  The Label within the Group.
		 * @param  string|null  $value  The Value of the Input.
		 * @param  array        $attributes  The Attributes for the Input.
		 * @param  array        $group       The Attributes for the Group.
		 *
		 * @return string  The Html that constructs the Form Group.
		 */
		Form::component('group', 'components.form.templates.group', ['type', 'name', 'label' => null, 'value' => null, 'attributes' => [], 'group' => []]);
	}

	/**
	 * Adds the Form::skill() component.
	 *
	 * @return void
	 */
	protected function registerSkill()
	{
		/**
		 * Creates a Skill for the Resume Page.
		 *
		 * @param  string   $name   The Name of the Skill.
		 * @param  integer  $years  How long the Skill has been used.
		 *
		 * @return string  The Html that constructs the Skill.
		 */
		Form::component('skill', 'components.form.templates.skill', ['name', 'years']);
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
		Form::component('paragraph', 'components.form.templates.paragraph', ['attributes']);
	}

	/**
	 * Adds the Form::panel() component.
	 *
	 * @return void
	 */
	protected function registerPanel()
	{
		/**
		 * Creates a Panel.
		 *
		 * @param  string|null  $status   The Status Type of the Panel (Primary, Success, Info, Warning, Danger).
		 * @param  string|null  $title    The Title of the Panel.
		 * @param  string|null  $body     The Body of the Panel.
		 * @param  string|null  $content  The Panel Content that exists outside of the Body.
		 * @param  string|null  $footer   The Footer of the Panel.
		 *
		 * @return string  The Html that constructs the Panel.
		 */
		Form::component('panel', 'components.form.templates.panel', ['status' => null, 'title' => null, 'body' => null, 'content' => null, 'footer' => null]);
	}
}
