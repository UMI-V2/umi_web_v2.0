<?php namespace Tests\Repositories;

use App\Models\master_transaction_category;
use App\Repositories\master_transaction_categoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class master_transaction_categoryRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var master_transaction_categoryRepository
     */
    protected $masterTransactionCategoryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->masterTransactionCategoryRepo = \App::make(master_transaction_categoryRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_master_transaction_category()
    {
        $masterTransactionCategory = master_transaction_category::factory()->make()->toArray();

        $createdmaster_transaction_category = $this->masterTransactionCategoryRepo->create($masterTransactionCategory);

        $createdmaster_transaction_category = $createdmaster_transaction_category->toArray();
        $this->assertArrayHasKey('id', $createdmaster_transaction_category);
        $this->assertNotNull($createdmaster_transaction_category['id'], 'Created master_transaction_category must have id specified');
        $this->assertNotNull(master_transaction_category::find($createdmaster_transaction_category['id']), 'master_transaction_category with given id must be in DB');
        $this->assertModelData($masterTransactionCategory, $createdmaster_transaction_category);
    }

    /**
     * @test read
     */
    public function test_read_master_transaction_category()
    {
        $masterTransactionCategory = master_transaction_category::factory()->create();

        $dbmaster_transaction_category = $this->masterTransactionCategoryRepo->find($masterTransactionCategory->id);

        $dbmaster_transaction_category = $dbmaster_transaction_category->toArray();
        $this->assertModelData($masterTransactionCategory->toArray(), $dbmaster_transaction_category);
    }

    /**
     * @test update
     */
    public function test_update_master_transaction_category()
    {
        $masterTransactionCategory = master_transaction_category::factory()->create();
        $fakemaster_transaction_category = master_transaction_category::factory()->make()->toArray();

        $updatedmaster_transaction_category = $this->masterTransactionCategoryRepo->update($fakemaster_transaction_category, $masterTransactionCategory->id);

        $this->assertModelData($fakemaster_transaction_category, $updatedmaster_transaction_category->toArray());
        $dbmaster_transaction_category = $this->masterTransactionCategoryRepo->find($masterTransactionCategory->id);
        $this->assertModelData($fakemaster_transaction_category, $dbmaster_transaction_category->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_master_transaction_category()
    {
        $masterTransactionCategory = master_transaction_category::factory()->create();

        $resp = $this->masterTransactionCategoryRepo->delete($masterTransactionCategory->id);

        $this->assertTrue($resp);
        $this->assertNull(master_transaction_category::find($masterTransactionCategory->id), 'master_transaction_category should not exist in DB');
    }
}
