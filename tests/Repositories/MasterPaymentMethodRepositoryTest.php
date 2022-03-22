<?php namespace Tests\Repositories;

use App\Models\MasterPaymentMethod;
use App\Repositories\MasterPaymentMethodRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MasterPaymentMethodRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MasterPaymentMethodRepository
     */
    protected $masterPaymentMethodRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->masterPaymentMethodRepo = \App::make(MasterPaymentMethodRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_MasterPaymentMethod()
    {
        $masterPaymentMethod = MasterPaymentMethod::factory()->make()->toArray();

        $createdMasterPaymentMethod = $this->masterPaymentMethodRepo->create($masterPaymentMethod);

        $createdMasterPaymentMethod = $createdMasterPaymentMethod->toArray();
        $this->assertArrayHasKey('id', $createdMasterPaymentMethod);
        $this->assertNotNull($createdMasterPaymentMethod['id'], 'Created MasterPaymentMethod must have id specified');
        $this->assertNotNull(MasterPaymentMethod::find($createdMasterPaymentMethod['id']), 'MasterPaymentMethod with given id must be in DB');
        $this->assertModelData($masterPaymentMethod, $createdMasterPaymentMethod);
    }

    /**
     * @test read
     */
    public function test_read_MasterPaymentMethod()
    {
        $masterPaymentMethod = MasterPaymentMethod::factory()->create();

        $dbMasterPaymentMethod = $this->masterPaymentMethodRepo->find($masterPaymentMethod->id);

        $dbMasterPaymentMethod = $dbMasterPaymentMethod->toArray();
        $this->assertModelData($masterPaymentMethod->toArray(), $dbMasterPaymentMethod);
    }

    /**
     * @test update
     */
    public function test_update_MasterPaymentMethod()
    {
        $masterPaymentMethod = MasterPaymentMethod::factory()->create();
        $fakeMasterPaymentMethod = MasterPaymentMethod::factory()->make()->toArray();

        $updatedMasterPaymentMethod = $this->masterPaymentMethodRepo->update($fakeMasterPaymentMethod, $masterPaymentMethod->id);

        $this->assertModelData($fakeMasterPaymentMethod, $updatedMasterPaymentMethod->toArray());
        $dbMasterPaymentMethod = $this->masterPaymentMethodRepo->find($masterPaymentMethod->id);
        $this->assertModelData($fakeMasterPaymentMethod, $dbMasterPaymentMethod->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_MasterPaymentMethod()
    {
        $masterPaymentMethod = MasterPaymentMethod::factory()->create();

        $resp = $this->masterPaymentMethodRepo->delete($masterPaymentMethod->id);

        $this->assertTrue($resp);
        $this->assertNull(MasterPaymentMethod::find($masterPaymentMethod->id), 'MasterPaymentMethod should not exist in DB');
    }
}
