<?php namespace Tests\Repositories;

use App\Models\Event;
use App\Repositories\EventRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class EventRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var EventRepository
     */
    protected $eventRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->eventRepo = \App::make(EventRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_event()
    {
        $event = Event::factory()->make()->toArray();

        $createdEvent = $this->eventRepo->create($event);

        $createdEvent = $createdEvent->toArray();
        $this->assertArrayHasKey('id', $createdEvent);
        $this->assertNotNull($createdEvent['id'], 'Created Event must have id specified');
        $this->assertNotNull(Event::find($createdEvent['id']), 'Event with given id must be in DB');
        $this->assertModelData($event, $createdEvent);
    }

    /**
     * @test read
     */
    public function test_read_event()
    {
        $event = Event::factory()->create();

        $dbEvent = $this->eventRepo->find($event->id);

        $dbEvent = $dbEvent->toArray();
        $this->assertModelData($event->toArray(), $dbEvent);
    }

    /**
     * @test update
     */
    public function test_update_event()
    {
        $event = Event::factory()->create();
        $fakeEvent = Event::factory()->make()->toArray();

        $updatedEvent = $this->eventRepo->update($fakeEvent, $event->id);

        $this->assertModelData($fakeEvent, $updatedEvent->toArray());
        $dbEvent = $this->eventRepo->find($event->id);
        $this->assertModelData($fakeEvent, $dbEvent->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_event()
    {
        $event = Event::factory()->create();

        $resp = $this->eventRepo->delete($event->id);

        $this->assertTrue($resp);
        $this->assertNull(Event::find($event->id), 'Event should not exist in DB');
    }
}
