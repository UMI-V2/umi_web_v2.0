<?php namespace Tests\Repositories;

use App\Models\master_status_business;
use App\Repositories\master_status_businessRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class master_status_businessRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var master_status_businessRepository
     */
    protected $masterStatusBusinessRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->masterStatusBusinessRepo = \App::make(master_status_businessRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_master_status_business()
    {
        $masterStatusBusiness = master_status_business::factory()->make()->toArray();

        $createdmaster_status_business = $this->masterStatusBusinessRepo->create($masterStatusBusiness);

        $createdmaster_status_business = $createdmaster_status_business->toArray();
        $this->assertArrayHasKey('id', $createdmaster_status_business);
        $this->assertNotNull($createdmaster_status_business['id'], 'Created master_status_business must have id specified');
        $this->assertNotNull(master_status_business::find($createdmaster_status_business['id']), 'master_status_business with given id must be in DB');
        $this->assertModelData($masterStatusBusiness, $createdmaster_status_business);
    }

    /**
     * @test read
     */
    public function test_read_master_status_business()
    {
        $masterStatusBusiness = master_status_business::factory()->create();

        $dbmaster_status_business = $this->masterStatusBusinessRepo->find($masterStatusBusiness->id);

        $dbmaster_status_business = $dbmaster_status_business->toArray();
        $this->assertModelData($masterStatusBusiness->toArray(), $dbmaster_status_business);
    }

    /**
     * @test update
     */
    public function test_update_master_status_business()
    {
        $masterStatusBusiness = master_status_business::factory()->create();
        $fakemaster_status_business = master_status_business::factory()->make()->toArray();

        $updatedmaster_status_business = $this->masterStatusBusinessRepo->update($fakemaster_status_business, $masterStatusBusiness->id);

        $this->assertModelData($fakemaster_status_business, $updatedmaster_status_business->toArray());
        $dbmaster_status_business = $this->masterStatusBusinessRepo->find($masterStatusBusiness->id);
        $this->assertModelData($fakemaster_status_business, $dbmaster_status_business->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_master_status_business()
    {
        $masterStatusBusiness = master_status_business::factory()->create();

        $resp = $this->masterStatusBusinessRepo->delete($masterStatusBusiness->id);

        $this->assertTrue($resp);
        $this->assertNull(master_status_business::find($masterStatusBusiness->id), 'master_status_business should not exist in DB');
    }
}
