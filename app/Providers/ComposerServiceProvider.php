<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//Panggil composer views
use App\Views\Composers\NavigationComposer;

class ComposerServiceProvider extends ServiceProvider
{
     /**
    * Bootstrap services.
    *
    * @return void
    */
    public function boot()
    {
        //Panggil navigations composer dari App\Views\Composers 
        //view()->composer('frontend.sikka.sidebarpostdetail', NavigationComposer::class);
        view()->composer('livewire.frontend.main.sidebar', NavigationComposer::class);
        view()->composer('livewire.frontend.main.sidebarevent', NavigationComposer::class);
        view()->composer('livewire.frontend.main.footer', NavigationComposer::class);
        view()->composer('admin.templates.sidebar', NavigationComposer::class);
        
        // disini isi service helper filter category dipindah ke file App\Views\NavigationComposer agar lebih rapih
        
    }
    
    /**
    * Register services.
    *
    * @return void
    */
    public function register()
    {
        //
    }
    
   
}
