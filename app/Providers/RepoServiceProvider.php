<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\App;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {


        $this->app->bind('App\Http\Repositories\teacher_interface', 'App\Http\Repositories\teacher_Repositie');
        $this->app->bind('App\Http\Repositories\Student_interface', 'App\Http\Repositories\StudentRepositie');
        $this->app->bind('App\Http\Repositories\PromotionInterfac', 'App\Http\Repositories\PromotionRepositie');
        $this->app->bind('App\Http\Repositories\GraduateInterface', 'App\Http\Repositories\GraduateRepositie');
        $this->app->bind('App\Http\Repositories\Invoice_Interface', 'App\Http\Repositories\InvoiceRepositie');
        $this->app->bind('App\Http\Repositories\Section_interface', 'App\Http\Repositories\SectionRepositie');
        $this->app->bind('App\Http\Repositories\PaymentInterface', 'App\Http\Repositories\PaymentRepositie');
        $this->app->bind('App\Http\Repositories\ProcessInterface', 'App\Http\Repositories\ProcessRepositie');
        $this->app->bind('App\Http\Repositories\ReciptInterface', 'App\Http\Repositories\ReciptRepositie');
        $this->app->bind('App\Http\Repositories\BookInterface', 'App\Http\Repositories\BookRepositie');
    }
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
