<?php namespace Tests\Repositories;

use App\Models\ProductFile;
use App\Repositories\ProductFileRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ProductFileRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ProductFileRepository
     */
    protected $productFileRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->productFileRepo = \App::make(ProductFileRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_product_file()
    {
        $productFile = ProductFile::factory()->make()->toArray();

        $createdProductFile = $this->productFileRepo->create($productFile);

        $createdProductFile = $createdProductFile->toArray();
        $this->assertArrayHasKey('id', $createdProductFile);
        $this->assertNotNull($createdProductFile['id'], 'Created ProductFile must have id specified');
        $this->assertNotNull(ProductFile::find($createdProductFile['id']), 'ProductFile with given id must be in DB');
        $this->assertModelData($productFile, $createdProductFile);
    }

    /**
     * @test read
     */
    public function test_read_product_file()
    {
        $productFile = ProductFile::factory()->create();

        $dbProductFile = $this->productFileRepo->find($productFile->id);

        $dbProductFile = $dbProductFile->toArray();
        $this->assertModelData($productFile->toArray(), $dbProductFile);
    }

    /**
     * @test update
     */
    public function test_update_product_file()
    {
        $productFile = ProductFile::factory()->create();
        $fakeProductFile = ProductFile::factory()->make()->toArray();

        $updatedProductFile = $this->productFileRepo->update($fakeProductFile, $productFile->id);

        $this->assertModelData($fakeProductFile, $updatedProductFile->toArray());
        $dbProductFile = $this->productFileRepo->find($productFile->id);
        $this->assertModelData($fakeProductFile, $dbProductFile->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_product_file()
    {
        $productFile = ProductFile::factory()->create();

        $resp = $this->productFileRepo->delete($productFile->id);

        $this->assertTrue($resp);
        $this->assertNull(ProductFile::find($productFile->id), 'ProductFile should not exist in DB');
    }
}
