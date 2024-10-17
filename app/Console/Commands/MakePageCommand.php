<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakePageCommand extends Command
{
    // A parancs neve, amit futtatni fogsz (php artisan make:page)
    protected $signature = 'make:page {name}';

    // A parancs leírása
    protected $description = 'Creates a new page with a folder and app.blade.php file';

    // A parancs végrehajtása
    public function handle()
    {
        // A page név argumentum lekérése
        $name = $this->argument('name');

        // A célmappa útvonala
        $directory = resource_path('views/pages/' . $name);

        // Ellenőrizzük, hogy a mappa létezik-e, ha nem, létrehozzuk
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
            $this->info("Directory {$directory} created.");
        } else {
            $this->error("Directory {$directory} already exists.");
            return;
        }

        // A blade fájl útvonala
        $filePath = $directory . '/app.blade.php';

        // Blade fájl tartalma
        $content = "@extends('app')\n\n@section('content')\n    @include('sections.header', ['variant' => 'variant-headline-first'])\n@endsection";

        // Létrehozzuk a blade fájlt a tartalommal
        File::put($filePath, $content);

        $this->info("Page created at: {$filePath}");
    }
}
