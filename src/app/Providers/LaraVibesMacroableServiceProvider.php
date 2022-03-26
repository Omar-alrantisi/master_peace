<?php

namespace App\Providers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

/**
 * LaraVibesMacroableServiceProvider
 * Created By Amer Almoghrabi (Vibes Solutions)
 * @package LaraVibes Framework
 */
class LaraVibesMacroableServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        //createdBy
        Blueprint::macro('addCreatedBy', function ($column = 'created_by_id', $foreignTable = 'users', $foreignPrimaryId = 'id') {
            $this->unsignedBigInteger($column)->nullable();

            $this->foreign($column)
                ->references($foreignPrimaryId)->on($foreignTable)
                ->onDelete('set null');
        });

        //updatedBy
        Blueprint::macro('addUpdatedBy', function ($column = 'updated_by_id', $foreignTable = 'users', $foreignPrimaryId = 'id') {
            $this->unsignedBigInteger($column)->nullable();

            $this->foreign($column)
                ->references($foreignPrimaryId)->on($foreignTable)
                ->onDelete('set null');
        });
    }
}
