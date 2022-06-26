<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\EventRegister;

class EventRegisterApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_event_register()
    {
        $eventRegister = EventRegister::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/event_registers', $eventRegister
        );

        $this->assertApiResponse($eventRegister);
    }

    /**
     * @test
     */
    public function test_read_event_register()
    {
        $eventRegister = EventRegister::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/event_registers/'.$eventRegister->id
        );

        $this->assertApiResponse($eventRegister->toArray());
    }

    /**
     * @test
     */
    public function test_update_event_register()
    {
        $eventRegister = EventRegister::factory()->create();
        $editedEventRegister = EventRegister::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/event_registers/'.$eventRegister->id,
            $editedEventRegister
        );

        $this->assertApiResponse($editedEventRegister);
    }

    /**
     * @test
     */
    public function test_delete_event_register()
    {
        $eventRegister = EventRegister::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/event_registers/'.$eventRegister->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/event_registers/'.$eventRegister->id
        );

        $this->response->assertStatus(404);
    }
}
