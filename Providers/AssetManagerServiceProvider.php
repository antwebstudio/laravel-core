<?php
/**
 * Created by PhpStorm.
 * User: veoc
 * Date: 4/09/16
 * Time: 10:21 PM.
 */

namespace Ant\Core\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Ant\Core\Components\AssetManager;

class AssetManagerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            module_path('Core', 'Config/asset-manager.php') => config_path('asset-manager.php'),
        ], 'config');
		
        Blade::directive('assets', function ($expression) {
            $expression = $this->parseExpression($expression);

            return "<?php echo app('asset-manager')->assetsBundle($expression) ?>";
        });
		
        Blade::directive('css', function ($expression) {
            $expression = $this->parseExpression($expression);

            return "<?php echo app('asset-manager')->css($expression) ?>";
        });

        Blade::directive('js', function ($expression) {
            $expression = $this->parseExpression($expression);

            return "<?php echo app('asset-manager')->js($expression) ?>";
        });
    }

    /**
     * @param $expression
     *
     * @return array
     */
    protected function parseExpression($expression)
    {
        if (starts_with($expression, '(')) {
            $expression = substr($expression, 1, -1);
        }

        //$expression = str_replace(["'"], '', $expression);

        return $expression;
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $configPath = module_path('Core', 'Config/asset-manager.php');
        $this->mergeConfigFrom($configPath, 'asset-manager');

        $this->app->singleton('asset-manager', function () {
            $assets = $this->app['config']->get('asset-manager.assets');

            return new AssetManager($assets);
        });
    }
}