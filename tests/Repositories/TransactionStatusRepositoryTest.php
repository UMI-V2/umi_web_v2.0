<?php namespace Tests\Repositories;

use App\Models\TransactionStatus;
use App\Repositories\TransactionStatusRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class TransactionStatusRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var TransactionStatusRepository
     */
    protected $transactionStatusRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->transactionStatusRepo = \App::make(TransactionStatusRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_transaction_status()
    {
        $transactionStatus = TransactionStatus::factory()->make()->toArray();

        $createdTransactionStatus = $this->transactionStatusRepo->create($transactionStatus);

        $createdTransactionStatus = $createdTransactionStatus->toArray();
        $this->assertArrayHasKey('id', $createdTransactionStatus);
        $this->assertNotNull($createdTransactionStatus['id'], 'Created TransactionStatus must have id specified');
        $this->assertNotNull(TransactionStatus::find($createdTransactionStatus['id']), 'TransactionStatus with given id must be in DB');
        $this->assertModelData($transactionStatus, $createdTransactionStatus);
    }

    /**
     * @test read
     */
    public function test_read_transaction_status()
    {
        $transactionStatus = TransactionStatus::factory()->create();

        $dbTransactionStatus = $this->transactionStatusRepo->find($transactionStatus->id);

        $dbTransactionStatus = $dbTransactionStatus->toArray();
        $this->assertModelData($transactionStatus->toArray(), $dbTransactionStatus);
    }

    /**
     * @test update
     */
    public function test_update_transaction_status()
    {
        $transactionStatus = TransactionStatus::factory()->create();
        $fakeTransactionStatus = TransactionStatus::factory()->make()->toArray();

        $updatedTransactionStatus = $this->transactionStatusRepo->update($fakeTransactionStatus, $transactionStatus->id);

        $this->assertModelData($fakeTransactionStatus, $updatedTransactionStatus->toArray());
        $dbTransactionStatus = $this->transactionStatusRepo->find($transactionStatus->id);
        $this->assertModelData($fakeTransactionStatus, $dbTransactionStatus->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_transaction_status()
    {
        $transactionStatus = TransactionStatus::factory()->create();

        $resp = $this->transactionStatusRepo->delete($transactionStatus->id);

        $this->assertTrue($resp);
        $this->assertNull(TransactionStatus::find($transactionStatus->id), 'TransactionStatus should not exist in DB');
    }
}
