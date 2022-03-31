<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ProductFile;

class ProductFileApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_product_file()
    {
        $productFile = ProductFile::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/product_files', $productFile
        );

        $this->assertApiResponse($productFile);
    }

    /**
     * @test
     */
    public function test_read_product_file()
    {
        $productFile = ProductFile::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/product_files/'.$productFile->id
        );

        $this->assertApiResponse($productFile->toArray());
    }

    /**
     * @test
     */
    public function test_update_product_file()
    {
        $productFile = ProductFile::factory()->create();
        $editedProductFile = ProductFile::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/product_files/'.$productFile->id,
            $editedProductFile
        );

        $this->assertApiResponse($editedProductFile);
    }

    /**
     * @test
     */
    public function test_delete_product_file()
    {
        $productFile = ProductFile::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/product_files/'.$productFile->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/product_files/'.$productFile->id
        );

        $this->response->assertStatus(404);
    }
}
