<?php

namespace Tests\Feature;

use Tests\TestCase;
use RefreshDatabase;
use App\Repositories\EventsRepository;
use Illuminate\Foundation\Testing\WithFaker;

class EventsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    /** @test */

    public function can_get_all_the_events()
    {
        $events = factory('App\Event', 3)->create();

        $this->get('/events')
            ->assertStatus(200);
    }
}
