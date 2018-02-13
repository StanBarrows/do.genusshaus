<?php

namespace Genusshaus\App\Console\Commands;

use Genusshaus\Domain\Administrators\Jobs\AddDeviceToRecommender;
use Genusshaus\Domain\Administrators\Jobs\AddLogsPlacesToRecommender;
use Genusshaus\Domain\Administrators\Jobs\AddPlaceToRecommender;
use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Domain\Ressources\Models\Device;
use Genusshaus\Domain\Ressources\Models\LogPlace;
use Illuminate\Console\Command;
use Recombee\RecommApi\Requests\AddItemProperty;
use Recombee\RecommApi\Requests\ResetDatabase;

class RecommendationSetUp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'recommendation:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'SetUp Recommendation Engine';

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

        app()->recombee->send(new ResetDatabase());

        sleep(2);

        app()->recombee->send(new AddItemProperty('title', 'string'));

        sleep(1);

        app()->recombee->send(new AddItemProperty('region', 'string'));

        sleep(1);

        app()->recombee->send(new AddItemProperty('description', 'string'));

        sleep(1);

        app()->recombee->send(new AddItemProperty('tags', 'set'));

        sleep(1);

        app()->recombee->send(new AddItemProperty('deleted', 'boolean'));

        sleep(1);

        $devices = Device::all();

        foreach ($devices->chunk(100) as $collection) {
            AddDeviceToRecommender::dispatch($collection);
        }

        $places = Place::all();

        foreach ($places->chunk(100) as $collection) {
            AddPlaceToRecommender::dispatch($collection);
        }

        $logs = LogPlace::all();

        foreach ($logs->chunk(100) as $collection) {
            AddLogsPlacesToRecommender::dispatch($collection);
        }

        $this->call('up');
    }
}
