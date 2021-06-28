<?php

namespace Tinspj\Fixtures;
use Tinspj\Fixtures\Console\Commands\InstallFixtures;
use Illuminate\Support\ServiceProvider;


class FixturesServiceProvider extends ServiceProvider
{
  public function register()
  {
    //
  }

  public function boot()
  {
    $this->loadRoutesFrom(__DIR__.'/routes/web.php');
    if ($this->app->runningInConsole()) {
        $this->commands([
          InstallFixtures::class,
        ]);
    }
  }
}