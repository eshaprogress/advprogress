<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class WriteJSEnvironmentConf extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:js:conf';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Write resources/assets/js/environment.json';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line("Writing resources/assets/js/environment.json");

        file_put_contents(base_path('resources/assets/js/environment.json'), json_encode([
            'stripePublishToken'=>config('services.stripe.key'),
            'emailOctopusId'=>config('app.octopus_id'),
        ]));
    }
}
