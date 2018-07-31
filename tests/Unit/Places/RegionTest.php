<?php

namespace Tests\Unit\Places;

use Genusshaus\Domain\Places\Models\Region;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class RegionTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->disableExceptionHandling();
        $this->region = create(Region::class);
    }

    /** @test */
    public function create_a_region()
    {
        $region = create(Region::class);
        $this->assertInstanceOf(Region::class, $region);
    }

    /** @test */
    public function a_region_has_many_places()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->region->places);
    }
}
