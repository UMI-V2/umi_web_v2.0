<?php namespace Tests\Repositories;

use App\Models\TransactionProduct;
use App\Repositories\TransactionProductRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TransactionProductRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TransactionProductRepository
     */
    protected $transactionProductRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->transactionProductRepo = \App::make(TransactionProductRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_transaction_product()
    {
        $transactionProduct = TransactionProduct::factory()->make()->toArray();

        $createdTransactionProduct = $this->transactionProductRepo->create($transactionProduct);

        $createdTransactionProduct = $createdTransactionProduct->toArray();
        $this->assertArrayHasKey('id', $createdTransactionProduct);
        $this->assertNotNull($createdTransactionProduct['id'], 'Created TransactionProduct must have id specified');
        $this->assertNotNull(TransactionProduct::find($createdTransactionProduct['id']), 'TransactionProduct with given id must be in DB');
        $this->assertModelData($transactionProduct, $createdTransactionProduct);
    }

    /**
     * @test read
     */
    public function test_read_transaction_product()
    {
        $transactionProduct = TransactionProduct::factory()->create();

        $dbTransactionProduct = $this->transactionProductRepo->find($transactionProduct->id);

        $dbTransactionProduct = $dbTransactionProduct->toArray();
        $this->assertModelData($transactionProduct->toArray(), $dbTransactionProduct);
    }

    /**
     * @test update
     */
    public function test_update_transaction_product()
    {
        $transactionProduct = TransactionProduct::factory()->create();
        $fakeTransactionProduct = TransactionProduct::factory()->make()->toArray();

        $updatedTransactionProduct = $this->transactionProductRepo->update($fakeTransactionProduct, $transactionProduct->id);

        $this->assertModelData($fakeTransactionProduct, $updatedTransactionProduct->toArray());
        $dbTransactionProduct = $this->transactionProductRepo->find($transactionProduct->id);
        $this->assertModelData($fakeTransactionProduct, $dbTransactionProduct->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_transaction_product()
    {
        $transactionProduct = TransactionProduct::factory()->create();

        $resp = $this->transactionProductRepo->delete($transactionProduct->id);

        $this->assertTrue($resp);
        $this->assertNull(TransactionProduct::find($transactionProduct->id), 'TransactionProduct should not exist in DB');
    }
}
