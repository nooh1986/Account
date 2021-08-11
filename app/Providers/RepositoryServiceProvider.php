<?php

namespace App\Providers;

use App\Repository\BoxRepository;
use App\Repository\InvoiceRepository;
use App\Repository\CustomerRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\BoxRepositoryInterface;
use App\Interfaces\InvoiceRepositoryInterface;
use App\Interfaces\CustomerRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BoxRepositoryInterface::class, BoxRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(InvoiceRepositoryInterface::class, InvoiceRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
