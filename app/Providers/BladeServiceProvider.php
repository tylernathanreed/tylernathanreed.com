<?php

namespace App\Providers;

use Auth;
use Blade;

use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		// Compile all Directives
		$this->compileContinue();
		$this->compileBreak();
		$this->compileIfEmpty();
		$this->compileIfNotEmpty();
		$this->compileOptional();
		$this->compileSet();
		$this->compileError();
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
	 * Add @continue for Loops.
	 *
	 * @return void
	 */
	private function compileContinue()
	{
		// Add @continue for Loops
		Blade::directive('continue', function($expression)
		{
			return '<?php continue; ?>';
		});
	}

	/**
	 * Add @break for Loops.
	 *
	 * @return void
	 */
	private function compileBreak()
	{
		// Add @break for Loops
		Blade::directive('break', function($expression)
		{
			return '<?php break; ?>';
		});
	}

	/**
	 * Add @ifempty and @endifempty for Loops.
	 *
	 * @return void
	 */
	private function compileIfEmpty()
	{
		// Add @ifempty for Loops
		Blade::directive('ifempty', function($expression)
		{
			return "<?php if(count$expression == 0): ?>";
		});

		// Add @endifempty for Loops
		Blade::directive('endifempty', function($expression)
		{
			return '<?php endif; ?>';
		});
	}

	/**
	 * Add @ifnotempty and @endifnotempty for Loops.
	 *
	 * @return void
	 */
	private function compileIfNotEmpty()
	{
		// Add @ifnotempty for Loops
		Blade::directive('ifnotempty', function($expression)
		{
			return "<?php if(count$expression > 0): ?>";
		});

		// Add @endifnotempty for Loops
		Blade::directive('endifnotempty', function($expression)
		{
			return '<?php endif; ?>';
		});
	}

	/**
	 * Add @optional and @endoption for Complex Yielding.
	 *
	 * @return void
	 */
	private function compileOptional()
	{
		// Add @optional for Complex Yielding
		Blade::directive('optional', function($expression)
		{
			return "<?php if(trim(\$__env->yieldContent{$expression})): ?>";
		});

		// Add @endoptional for Complex Yielding
		Blade::directive('endoptional', function($expression)
		{
			return "<?php endif; ?>";
		});
	}

	/**
	 * Add @set for Variable Assignment.
	 *
	 * @return void
	 */
	private function compileSet()
	{
		// Add @set for Variable Assignment
		Blade::directive('set', function($expression)
		{
			// Strip Open and Close Parenthesis
			if(Str::startsWith($expression, '('))
				$expression = substr($expression, 1, -1);

			// Break the Expression into Pieces
			$segments = explode(',', $expression, 2);

			// Return the Conversion
			return "<?php " . $segments[0] . " = " . $segments[1] . "; ?>";
		});
	}

	/**
	 * Add @error for Form Errors.
	 *
	 * @return void
	 */
	private function compileError()
	{
		// Add @error for Form Errors
		Blade::directive('error', function($expression)
		{
			return "<?php if(\$errors->has$expression): ?><span class=\"help-block\"><strong><?php echo \$errors->first$expression; ?></strong></span><?php endif; ?>";
		});
	}
}
