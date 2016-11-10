<?php
namespace App\Providers;
use App;
use Illuminate\Support\ServiceProvider;

class TestFacadesServiceProvider extends ServiceProvider {
    public function boot() {
        //
    }
    public function register() {
        App::bind('testfacades',function() {
            return new \App\Test\TestFacades;
        });
    }
}