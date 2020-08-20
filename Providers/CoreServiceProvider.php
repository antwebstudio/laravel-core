<?php

namespace Ant\Core\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;
use Ant\Core\FormFields\MultipleInputField;
use Ant\Core\FormFields\WidgetField;
use Ant\Core\FormFields\StateField;
use Ant\Core\FormFields\JsonField;
use Ant\Core\FormFields\AddressField;
use Illuminate\Support\Facades\Blade;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerFactories();
        $this->loadMigrationsFrom(module_path('Core', 'Database/Migrations'));
		
		Blade::directive('debug', function ($expression) {
			return '<?php if(env("APP_DEBUG")): ?>';
		});
		
		Blade::directive('enddebug', function ($expression) {
			return '<?php endif ?>';
		});
		
        Blade::directive('hiddenField', function ($expression) {

            return '<?php foreach((array) '.$expression.' as $name => $value) : ?><input type="hidden" name="<?= $name ?>" value="<?= $value ?>"/><?php endforeach ?>';
        });
		
        Blade::directive('submitButton', function ($expression) {
            return '<?= Form::smartSubmitButton('.$expression.'); // call_user_func_array(function($label) { return \'<button class="btn btn-primary" onclick="this.disabled=true">\'.$label.\'</button>\'; }, ['.$expression.']) ?>';
        });
		
        Blade::directive('jsonEncode', function ($expression) {
            return '<?= \Ant\Core\Helpers\Json::encode('.$expression.') ?>';
        });
		
        Blade::directive('panel', function ($expression) {
            return '<div class="panel panel-body">';
        });
		
        Blade::directive('endpanel', function ($expression) {
            return '</div>';
        });
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
		
		\TCG\Voyager\Facades\Voyager::addFormField(MultipleInputField::class);
		\TCG\Voyager\Facades\Voyager::addFormField(WidgetField::class);
		\TCG\Voyager\Facades\Voyager::addFormField(StateField::class);
		\TCG\Voyager\Facades\Voyager::addFormField(JsonField::class);
		\TCG\Voyager\Facades\Voyager::addFormField(AddressField::class);

    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path('Core', 'Config/config.php') => config_path('core.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path('Core', 'Config/config.php'), 'core'
        );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/core');

        $sourcePath = module_path('Core', 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ],'views');

        $this->loadViewsFrom(array_merge(array_map(function ($path) {
            return $path . '/modules/core';
        }, \Config::get('view.paths')), [$sourcePath]), 'core');
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/core');

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, 'core');
        } else {
            $this->loadTranslationsFrom(module_path('Core', 'Resources/lang'), 'core');
        }
    }

    /**
     * Register an additional directory of factories.
     *
     * @return void
     */
    public function registerFactories()
    {
        if (! app()->environment('production') && $this->app->runningInConsole()) {
            app(Factory::class)->load(module_path('Core', 'Database/factories'));
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}
