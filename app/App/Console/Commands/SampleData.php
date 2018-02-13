<?php

namespace Genusshaus\App\Console\Commands;

use Illuminate\Console\Command;

class SampleData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'install:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Sample Data';

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
        $this->call('down', ['--message' => 'Upgrading Database']);

        $this->call('migrate:fresh');

        $this->call('db:seed');

        $this->call('db:seed', ['--class' => 'SampleDataSeeder']);

        $this->call('recommendation:setup');

        $this->call('up');
    }
}
