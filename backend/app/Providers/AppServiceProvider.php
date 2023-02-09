<?php

namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->bindRepositories();

        $this->bindServices();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Binds the repository with its interface.
     * 
     * @return void
     */
    protected function bindRepositories()
    {
        $path = app_path('Repositories');
        $directories = file_exists($path) ? File::directories($path) : [];

        foreach ($directories as $directory) {

            $files = file_exists($directory) ? File::files($directory) : [];

            $classes = [];

            foreach ($files as $file) {

                $directory = basename($directory);

                $classes[] = 'App\Repositories\\' . $directory . '\\' . $file->getFilenameWithoutExtension();
            }

            (count($classes) > 0) && $this->app->bind($classes[0], $classes[1]);
        }
    }

    /**
     * Binds the service with its interface.
     * 
     * @return void
     */
    protected function bindServices()
    {
        $path = app_path('Services');
        $directories = (file_exists($path)) ? File::directories($path) : [];

        foreach ($directories as $directory) {

            $files = (file_exists($directory)) ? File::files($directory) : [];

            $classes = [];

            foreach ($files as $file) {

                $directory = basename($directory);

                $classes[] = 'App\Services\\' . $directory . '\\' . $file->getFilenameWithoutExtension();;
            }

            (count($classes) > 0) && $this->app->bind($classes[0], $classes[1]);
        }
    }
}
