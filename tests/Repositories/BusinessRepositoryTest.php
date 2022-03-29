<?php namespace Tests\Repositories;

use App\Models\Business;
use App\Repositories\BusinessRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BusinessRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BusinessRepository
     */
    protected $businessRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->businessRepo = \App::make(BusinessRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_business()
    {
        $business = Business::factory()->make()->toArray();

        $createdBusiness = $this->businessRepo->create($business);

        $createdBusiness = $createdBusiness->toArray();
        $this->assertArrayHasKey('id', $createdBusiness);
        $this->assertNotNull($createdBusiness['id'], 'Created Business must have id specified');
        $this->assertNotNull(Business::find($createdBusiness['id']), 'Business with given id must be in DB');
        $this->assertModelData($business, $createdBusiness);
    }

    /**
     * @test read
     */
    public function test_read_business()
    {
        $business = Business::factory()->create();

        $dbBusiness = $this->businessRepo->find($business->id);

        $dbBusiness = $dbBusiness->toArray();
        $this->assertModelData($business->toArray(), $dbBusiness);
    }

    /**
     * @test update
     */
    public function test_update_business()
    {
        $business = Business::factory()->create();
        $fakeBusiness = Business::factory()->make()->toArray();

        $updatedBusiness = $this->businessRepo->update($fakeBusiness, $business->id);

        $this->assertModelData($fakeBusiness, $updatedBusiness->toArray());
        $dbBusiness = $this->businessRepo->find($business->id);
        $this->assertModelData($fakeBusiness, $dbBusiness->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_business()
    {
        $business = Business::factory()->create();

        $resp = $this->businessRepo->delete($business->id);

        $this->assertTrue($resp);
        $this->assertNull(Business::find($business->id), 'Business should not exist in DB');
    }
}
