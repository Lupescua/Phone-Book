<?php

namespace Tests\Feature;

use Response;
use Tests\TestCase;
use App\Person;

class ExampleTest extends TestCase
{
        
    public function testHome()
    {
        $person = factory(Person::class)->create();
        $person->save();

        $this->get('/')
            ->assertsee($person->name);
    }

    public function testCreatePerson()
{
    $person = factory(Person::class)->create();
    $this->get('/')
        ->press('add')
         ->type($person->name, 'name')
         ->type($person->phone_nr, 'phone_nr')
         ->press('save')
         ->seePageIs('/')
         ->see($person->name);

    $this->get('/')
         ->press('add')
              ->type($person->name, 'name')
              ->press('save')
              ->seePageIs('/create')
              ->see('The phone nr field is required');
        
}
}
