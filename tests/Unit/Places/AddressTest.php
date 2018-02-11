<?php

namespace Tests\Unit\Places;

use Genusshaus\Domain\Places\Models\Address;
use Genusshaus\Domain\Places\Models\Country;
use Genusshaus\Domain\Places\Models\Place;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class AddressTest extends TestCase
{
    use DatabaseMigrations;

    protected $address;

    public function setUp()
    {
        parent::setUp();
        $this->disableExceptionHandling();

        $this->address = $address = create(Address::class);
    }

    /** @test */
    public function create_a_address()
    {
        $this->assertInstanceOf(Address::class, $this->address);
    }

    /** @test */
    public function a_address_belongs_to_one_place()
    {
        $this->assertInstanceOf(Place::class, $this->address->place);
    }

    /** @test */
    public function a_address_belongts_to_one_country()
    {
        $this->assertInstanceOf(Country::class, $this->address->country);
    }
}
