<?php

namespace Tests\Unit\Places;

use Genusshaus\Domain\Places\Models\Contact;
use Genusshaus\Domain\Places\Models\Place;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use DatabaseMigrations;

    protected $place;

    public function setUp()
    {
        parent::setUp();
        $this->disableExceptionHandling();
    }

    /** @test */
    public function create_a_contact()
    {
        $contact = create(Contact::class);
        $this->assertInstanceOf(Contact::class, $contact);
    }


    /** @test */
    public function a_contact_belongs_to_one_place()
    {
        $contact = create(Contact::class);
        $this->assertInstanceOf(Place::class, $contact->place);
    }
}
