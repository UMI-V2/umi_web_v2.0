<?php namespace Tests\Repositories;

use App\Models\EventRegister;
use App\Repositories\EventRegisterRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class EventRegisterRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var EventRegisterRepository
     */
    protected $eventRegisterRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->eventRegisterRepo = \App::make(EventRegisterRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_event_register()
    {
        $eventRegister = EventRegister::factory()->make()->toArray();

        $createdEventRegister = $this->eventRegisterRepo->create($eventRegister);

        $createdEventRegister = $createdEventRegister->toArray();
        $this->assertArrayHasKey('id', $createdEventRegister);
        $this->assertNotNull($createdEventRegister['id'], 'Created EventRegister must have id specified');
        $this->assertNotNull(EventRegister::find($createdEventRegister['id']), 'EventRegister with given id must be in DB');
        $this->assertModelData($eventRegister, $createdEventRegister);
    }

    /**
     * @test read
     */
    public function test_read_event_register()
    {
        $eventRegister = EventRegister::factory()->create();

        $dbEventRegister = $this->eventRegisterRepo->find($eventRegister->id);

        $dbEventRegister = $dbEventRegister->toArray();
        $this->assertModelData($eventRegister->toArray(), $dbEventRegister);
    }

    /**
     * @test update
     */
    public function test_update_event_register()
    {
        $eventRegister = EventRegister::factory()->create();
        $fakeEventRegister = EventRegister::factory()->make()->toArray();

        $updatedEventRegister = $this->eventRegisterRepo->update($fakeEventRegister, $eventRegister->id);

        $this->assertModelData($fakeEventRegister, $updatedEventRegister->toArray());
        $dbEventRegister = $this->eventRegisterRepo->find($eventRegister->id);
        $this->assertModelData($fakeEventRegister, $dbEventRegister->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_event_register()
    {
        $eventRegister = EventRegister::factory()->create();

        $resp = $this->eventRegisterRepo->delete($eventRegister->id);

        $this->assertTrue($resp);
        $this->assertNull(EventRegister::find($eventRegister->id), 'EventRegister should not exist in DB');
    }
}
