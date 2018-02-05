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
        $this->region  = create(Region::class);
    }


    /** @test */
    function a_region_has_places()
    {
        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $this->region->places);
    }


}
