<?php

namespace Genusshaus\Domain\Administrators\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Recombee\RecommApi\Requests\AddDetailView;
use Recombee\RecommApi\Requests\AddItem;
use Recombee\RecommApi\Requests\SetItemValues;

class AddLogsPlacesToRecommender implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $collection;

    public function __construct(Collection $collection)
    {
        $this->collection = $collection;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->collection as $log)
        {
            app()->recombee->send(new AddDetailView($log->device->uuid, $log->place->uuid));

        }
    }
}
