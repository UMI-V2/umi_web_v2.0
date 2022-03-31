<?php namespace Tests\Repositories;

use App\Models\SalesTransaction;
use App\Repositories\SalesTransactionRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SalesTransactionRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SalesTransactionRepository
     */
    protected $salesTransactionRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->salesTransactionRepo = \App::make(SalesTransactionRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_sales_transaction()
    {
        $salesTransaction = SalesTransaction::factory()->make()->toArray();

        $createdSalesTransaction = $this->salesTransactionRepo->create($salesTransaction);

        $createdSalesTransaction = $createdSalesTransaction->toArray();
        $this->assertArrayHasKey('id', $createdSalesTransaction);
        $this->assertNotNull($createdSalesTransaction['id'], 'Created SalesTransaction must have id specified');
        $this->assertNotNull(SalesTransaction::find($createdSalesTransaction['id']), 'SalesTransaction with given id must be in DB');
        $this->assertModelData($salesTransaction, $createdSalesTransaction);
    }

    /**
     * @test read
     */
    public function test_read_sales_transaction()
    {
        $salesTransaction = SalesTransaction::factory()->create();

        $dbSalesTransaction = $this->salesTransactionRepo->find($salesTransaction->id);

        $dbSalesTransaction = $dbSalesTransaction->toArray();
        $this->assertModelData($salesTransaction->toArray(), $dbSalesTransaction);
    }

    /**
     * @test update
     */
    public function test_update_sales_transaction()
    {
        $salesTransaction = SalesTransaction::factory()->create();
        $fakeSalesTransaction = SalesTransaction::factory()->make()->toArray();

        $updatedSalesTransaction = $this->salesTransactionRepo->update($fakeSalesTransaction, $salesTransaction->id);

        $this->assertModelData($fakeSalesTransaction, $updatedSalesTransaction->toArray());
        $dbSalesTransaction = $this->salesTransactionRepo->find($salesTransaction->id);
        $this->assertModelData($fakeSalesTransaction, $dbSalesTransaction->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_sales_transaction()
    {
        $salesTransaction = SalesTransaction::factory()->create();

        $resp = $this->salesTransactionRepo->delete($salesTransaction->id);

        $this->assertTrue($resp);
        $this->assertNull(SalesTransaction::find($salesTransaction->id), 'SalesTransaction should not exist in DB');
    }
}
