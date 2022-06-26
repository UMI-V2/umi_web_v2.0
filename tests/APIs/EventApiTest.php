<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Event;

class EventApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_event()
    {
        $event = Event::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/events', $event
        );

        $this->assertApiResponse($event);
    }

    /**
     * @test
     */
    public function test_read_event()
    {
        $event = Event::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/events/'.$event->id
        );

        $this->assertApiResponse($event->toArray());
    }

    /**
     * @test
     */
    public function test_update_event()
    {
        $event = Event::factory()->create();
        $editedEvent = Event::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/events/'.$event->id,
            $editedEvent
        );

        $this->assertApiResponse($editedEvent);
    }

    /**
     * @test
     */
    public function test_delete_event()
    {
        $event = Event::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/events/'.$event->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/events/'.$event->id
        );

        $this->response->assertStatus(404);
    }
}
