<?php

namespace Genusshaus\Domain\Administrators\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Recombee\RecommApi\Requests\AddItem;
use Recombee\RecommApi\Requests\SetItemValues;

class AddPlaceToRecommender implements ShouldQueue
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
        foreach ($this->collection as $place) {
            app()->recombee->send(new AddItem($place->uuid));

            app()->recombee->send(new SetItemValues($place->uuid,

                [
                    'region'      => $place->region->name,
                    'title'       => $place->name,
                    'description' => $place->description,
                    'deleted'     => false,
                    'tags'        => $place->tags()->pluck('name')->toJson(),
                ]
            ));
        }
    }
}
