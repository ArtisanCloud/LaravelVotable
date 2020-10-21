<?php

namespace ArtisanCloud\LaravelVotable\Providers;

use Illuminate\Support\ServiceProvider;
use ArtisanCloud\LaravelVotable\Contracts\VotableServiceContract;
use ArtisanCloud\LaravelVotable\VotableService;

/**
 * Class VotableServiceProvider
 * @package App\Providers
 */
class VotableServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            VotableServiceContract::class,
            VotableService::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
              // publish config file
//              $this->publishes([
//                  __DIR__ . '/../../config/votable.php' => "/../" . config_path('test/votable.php'),
//              ], ['ArtisanCloud', 'SaaSFramework', 'Votable-Config']);

              // publish migration file
//              $this->publishes([
//                  __DIR__ . '/../../config/votable.php' => "/../" . config_path('votable.php'),
//              ], ['ArtisanCloud', 'SaaSFramework', 'Votable-Model']);

              // register artisan command
              if (! class_exists('CreateVotableTable')) {
                $this->publishes([
                  __DIR__ . '/../../database/migrations/create_votables_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_votables_table.php'),
                  // you can add any number of migrations here
                ], ['ArtisanCloud', 'SaaSFramework', 'Votable-Migration']);
              }
            }

    }
}
