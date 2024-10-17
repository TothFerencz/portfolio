<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeSectionCommand extends Command
{
    // A parancs neve, amit futtatni fogsz (php artisan make:section)
    protected $signature = 'make:section {name}';

    // A parancs leírása
    protected $description = 'Creates a new section with a Blade file and a corresponding SCSS file using Vite';

    // A parancs végrehajtása
    public function handle()
    {
        // A section név argumentum lekérése
        $name = $this->argument('name');

        // Blade fájl útvonala
        $bladeFilePath = resource_path('views/sections/' . $name . '.blade.php');

        // Ellenőrizzük, hogy a Blade fájl létezik-e, ha nem, létrehozzuk
        if (File::exists($bladeFilePath)) {
            $this->error("The section {$name} already exists.");
            return;
        }

        // SCSS mappa útvonala
        $scssDirectory = resource_path('scss/sections');

        // Ellenőrizzük, hogy a SCSS mappa létezik-e, ha nem, létrehozzuk
        if (!File::exists($scssDirectory)) {
            File::makeDirectory($scssDirectory, 0755, true);
            $this->info("SCSS directory created at: {$scssDirectory}");
        }

        // SCSS fájl útvonala
        $scssFilePath = $scssDirectory . '/' . $name . '.scss';

        // Ellenőrizzük, hogy a SCSS fájl létezik-e, ha nem, létrehozzuk
        if (File::exists($scssFilePath)) {
            $this->error("The SCSS file {$name}.scss already exists.");
            return;
        }

        // Blade fájl tartalma, ami a Vite direktívával importálja az SCSS-t és a section class neve megegyezik a névvel
        $bladeContent = "@vite('resources/scss/sections/{$name}.scss')\n\n<section class=\"{$name}\">\n    <div>\n        <!-- Add your content here -->\n    </div>\n</section>";

        // Létrehozzuk a Blade fájlt a tartalommal
        File::put($bladeFilePath, $bladeContent);
        $this->info("Blade section created at: {$bladeFilePath}");

        // SCSS fájl tartalma, ami az osztály név alapján indul
        $scssContent = ".{$name} {\n    /* Styles for {$name} section */\n}\n";

        // Létrehozzuk a SCSS fájlt
        File::put($scssFilePath, $scssContent);
        $this->info("SCSS file created at: {$scssFilePath}");
    }
}
