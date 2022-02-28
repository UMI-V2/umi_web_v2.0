<?php namespace Tests\Repositories;

use App\Models\master_payment_method;
use App\Repositories\master_payment_methodRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class master_payment_methodRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var master_payment_methodRepository
     */
    protected $masterPaymentMethodRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->masterPaymentMethodRepo = \App::make(master_payment_methodRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_master_payment_method()
    {
        $masterPaymentMethod = master_payment_method::factory()->make()->toArray();

        $createdmaster_payment_method = $this->masterPaymentMethodRepo->create($masterPaymentMethod);

        $createdmaster_payment_method = $createdmaster_payment_method->toArray();
        $this->assertArrayHasKey('id', $createdmaster_payment_method);
        $this->assertNotNull($createdmaster_payment_method['id'], 'Created master_payment_method must have id specified');
        $this->assertNotNull(master_payment_method::find($createdmaster_payment_method['id']), 'master_payment_method with given id must be in DB');
        $this->assertModelData($masterPaymentMethod, $createdmaster_payment_method);
    }

    /**
     * @test read
     */
    public function test_read_master_payment_method()
    {
        $masterPaymentMethod = master_payment_method::factory()->create();

        $dbmaster_payment_method = $this->masterPaymentMethodRepo->find($masterPaymentMethod->id);

        $dbmaster_payment_method = $dbmaster_payment_method->toArray();
        $this->assertModelData($masterPaymentMethod->toArray(), $dbmaster_payment_method);
    }

    /**
     * @test update
     */
    public function test_update_master_payment_method()
    {
        $masterPaymentMethod = master_payment_method::factory()->create();
        $fakemaster_payment_method = master_payment_method::factory()->make()->toArray();

        $updatedmaster_payment_method = $this->masterPaymentMethodRepo->update($fakemaster_payment_method, $masterPaymentMethod->id);

        $this->assertModelData($fakemaster_payment_method, $updatedmaster_payment_method->toArray());
        $dbmaster_payment_method = $this->masterPaymentMethodRepo->find($masterPaymentMethod->id);
        $this->assertModelData($fakemaster_payment_method, $dbmaster_payment_method->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_master_payment_method()
    {
        $masterPaymentMethod = master_payment_method::factory()->create();

        $resp = $this->masterPaymentMethodRepo->delete($masterPaymentMethod->id);

        $this->assertTrue($resp);
        $this->assertNull(master_payment_method::find($masterPaymentMethod->id), 'master_payment_method should not exist in DB');
    }
}
