<?php

namespace Tests\Feature;

use Tests\TestCase;
use RefreshDatabase;
use App\Repositories\EventsRepository;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class EventsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_signed_in_user_can_view_all_events()
    {
        $this->signIn();

        create('App\Event');

        $response = $this->get('/events_blade');

        $response->assertSee("Events");
    }

    /** @test */
    public function a_signed_in_user_can_view_a_single_event()
    {
        $this->signIn();

        $event = create('App\Event');

        $response = $this->get('/events/'. $event->id);

        $response->assertSee($event->name);
    }

    /** @test */
    public function admins_can_add_events()
    {
        $this->signInAdmin();

        $event = make('App\Event');

        $response = $this->post('/events',$event->toArray());

        $this->assertDatabaseHas('events',["name"=>$event->name]);
    }

    /** @test */
    public function redirects_to_list_after_adding_an_event()
    {
        $this->signInAdmin();

        $event = make('App\Event');

        $response = $this->post('/events',$event->toArray());

        $response->assertRedirect('events_blade');
    }
}
