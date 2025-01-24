<?php

namespace App\Providers;

use App\Filament\Tiptap\Corousel;
use App\Filament\Tiptap\Stats;
use Illuminate\Support\ServiceProvider;
use FilamentTiptapEditor\TiptapEditor;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        TiptapEditor::configureUsing(function (TiptapEditor $component) {
            $component
                ->blocks([
                    Stats::class,
                    Corousel::class,
                ]);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
