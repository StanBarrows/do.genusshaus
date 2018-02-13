<?php

namespace Tests\Unit\Places;

use Genusshaus\Domain\Places\Models\Country;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class CountryTest extends TestCase
{
    use DatabaseMigrations;

    protected $country;

    public function setUp()
    {
        parent::setUp();
        $this->disableExceptionHandling();

        $this->country = $country = create(Country::class);
    }

    /** @test */
    public function create_a_country()
    {
        $this->assertInstanceOf(Country::class, $this->country);
    }
}
