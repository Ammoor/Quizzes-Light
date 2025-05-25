<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (!File::isDirectory(app_path('Services'))) {
            File::makeDirectory(app_path('Services'));
        }

        $name = $this->argument('name');
        $servicePath = app_path("Services/{$name}.php");

        if (File::exists($servicePath)) {
            $this->error('Service already exists!');
            return;
        }

        $serviceTemplate = <<<"template"
        <?php

        namespace App\Services;

        class {$name}
        {
            //
        }
        template;

        File::put($servicePath, $serviceTemplate);

        $this->info("Service {$name} created successfully!");
    }
}
