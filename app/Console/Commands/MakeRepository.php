<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeRepository extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (!File::isDirectory(app_path('Repositories'))) {
            File::makeDirectory(app_path('Repositories'));
        }

        $name = $this->argument('name');
        $repositoryPath = app_path("Repositories/{$name}.php");

        if (File::exists($repositoryPath)) {
            $this->error('Repository already exists!');
            return;
        }

        $repositoryTemplate = <<<"template"
        <?php

        namespace App\Repositories;

        class {$name}
        {
            //
        }
        template;

        File::put($repositoryPath, $repositoryTemplate);

        $this->info("Repository {$name} created successfully!");
    }
}
