<?php 
namespace locng\TextClassification;

use Illuminate\Support\ServiceProvider;

class TextClassificationServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }
    public function register()
    {
        $this->app->singleton(TextClassification::class,function(){
            return new TextClassification();
        });
    }
}