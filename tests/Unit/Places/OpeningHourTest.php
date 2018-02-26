<?php

namespace Tests\Unit\Places;

use Genusshaus\Domain\Places\Models\OpeningHour;
use Genusshaus\Domain\Places\Models\Place;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class OpeningHourTest extends TestCase
{
    use DatabaseMigrations;

    protected $place;

    public function setUp()
    {
        parent::setUp();
        $this->disableExceptionHandling();
        $this->hours = $hours = create(OpeningHour::class);
    }


    /** @test */
    public function a_opening_hours_belongs_to_one_place()
    {
        $this->assertInstanceOf(Place::class, $this->hours->place);
    }


}
