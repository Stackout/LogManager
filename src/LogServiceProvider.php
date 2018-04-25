<?php

namespace Stackout\LogManager;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use Route;

class LogServiceProvider extends ServiceProvider
{


    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Where the route file lives, both inside the package and in the app (if overwritten).
     *
     * @var string
     */
    public $routeFilePath = '/routes/logmanager.php';


    public function boot()
    {

        Schema::defaultStringLength(191);
        
        $this->loadRoutesFrom(__DIR__ . './routes/web.php');
        $this->loadViewsFrom(__DIR__ . './resources/views', 'stackout.logmanager');

        
    }

    /**
     * Register
     * 
     * @return void
     */
    public function register()
    {
        $this->registerPublishables();
    }

    /**
     * Register Publishables
     * 
     * @return void
     */
    public function registerPublishables()
    {

        $basePath = dirname(__DIR__);

        $publishable = [
            'migrations' => [
                $basePath . "/publishable/database/migrations" => database_path('migrations'),
            ],
            'config' =>[
                $basePath . "/publishable/config/payment_gateways.php" => config_path('payment_gateways.php'),
            ]
        ];

        foreach($publishable as $group => $path){
            $this->publishes($path, $group);
        }
    }

}