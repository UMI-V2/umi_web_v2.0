<?php namespace Tests\Repositories;

use App\Models\OpenHour;
use App\Repositories\OpenHourRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class OpenHourRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var OpenHourRepository
     */
    protected $openHourRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->openHourRepo = \App::make(OpenHourRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_open_hour()
    {
        $openHour = OpenHour::factory()->make()->toArray();

        $createdOpenHour = $this->openHourRepo->create($openHour);

        $createdOpenHour = $createdOpenHour->toArray();
        $this->assertArrayHasKey('id', $createdOpenHour);
        $this->assertNotNull($createdOpenHour['id'], 'Created OpenHour must have id specified');
        $this->assertNotNull(OpenHour::find($createdOpenHour['id']), 'OpenHour with given id must be in DB');
        $this->assertModelData($openHour, $createdOpenHour);
    }

    /**
     * @test read
     */
    public function test_read_open_hour()
    {
        $openHour = OpenHour::factory()->create();

        $dbOpenHour = $this->openHourRepo->find($openHour->id);

        $dbOpenHour = $dbOpenHour->toArray();
        $this->assertModelData($openHour->toArray(), $dbOpenHour);
    }

    /**
     * @test update
     */
    public function test_update_open_hour()
    {
        $openHour = OpenHour::factory()->create();
        $fakeOpenHour = OpenHour::factory()->make()->toArray();

        $updatedOpenHour = $this->openHourRepo->update($fakeOpenHour, $openHour->id);

        $this->assertModelData($fakeOpenHour, $updatedOpenHour->toArray());
        $dbOpenHour = $this->openHourRepo->find($openHour->id);
        $this->assertModelData($fakeOpenHour, $dbOpenHour->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_open_hour()
    {
        $openHour = OpenHour::factory()->create();

        $resp = $this->openHourRepo->delete($openHour->id);

        $this->assertTrue($resp);
        $this->assertNull(OpenHour::find($openHour->id), 'OpenHour should not exist in DB');
    }
}
