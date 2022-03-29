<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BusinessFile;

class BusinessFileApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_business_file()
    {
        $businessFile = BusinessFile::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/business_files', $businessFile
        );

        $this->assertApiResponse($businessFile);
    }

    /**
     * @test
     */
    public function test_read_business_file()
    {
        $businessFile = BusinessFile::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/business_files/'.$businessFile->id
        );

        $this->assertApiResponse($businessFile->toArray());
    }

    /**
     * @test
     */
    public function test_update_business_file()
    {
        $businessFile = BusinessFile::factory()->create();
        $editedBusinessFile = BusinessFile::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/business_files/'.$businessFile->id,
            $editedBusinessFile
        );

        $this->assertApiResponse($editedBusinessFile);
    }

    /**
     * @test
     */
    public function test_delete_business_file()
    {
        $businessFile = BusinessFile::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/business_files/'.$businessFile->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/business_files/'.$businessFile->id
        );

        $this->response->assertStatus(404);
    }
}
