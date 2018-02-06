<?php

namespace Tests\Feature\Places;

use Genusshaus\Domain\Places\Models\Place;
use Genusshaus\Domain\Places\Models\Region;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class StorePlacesTest extends TestCase
{
    use DatabaseMigrations;

    protected function setUp()
    {
        parent::setUp();
        $this->disableExceptionHandling();
    }

    public function publishPlace($overrides = [])
    {
        $this->withExceptionHandling()->signIn();
        $place = make(Place::class, $overrides);

        return $this->post(route('places.store', $place->toArray()));
    }

    /** @test */
    public function a_place_requires_a_name()
    {
        $this->publishPlace(['name' => null])
            ->assertSessionHasErrors('name');
    }

    /** @test */
    public function a_place_requires_a_valid_region_id()
    {
        factory(create(Region::class));
        $this->publishPlace(['region_id' => null])
            ->assertSessionHasErrors('region_id');

        $this->publishPlace(['region_id' => 99])
            ->assertSessionHasErrors('region_id');
    }
}
