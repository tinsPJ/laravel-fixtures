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
    
    if ($this->app->runningInConsole()) {
        $this->commands([
          InstallFixtures::class,
        ]);
    }
  }
}