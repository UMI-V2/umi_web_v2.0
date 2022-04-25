<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\SubDistrict;

class SubDistrictApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_sub_district()
    {
        $subDistrict = SubDistrict::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/sub_districts', $subDistrict
        );

        $this->assertApiResponse($subDistrict);
    }

    /**
     * @test
     */
    public function test_read_sub_district()
    {
        $subDistrict = SubDistrict::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/sub_districts/'.$subDistrict->id
        );

        $this->assertApiResponse($subDistrict->toArray());
    }

    /**
     * @test
     */
    public function test_update_sub_district()
    {
        $subDistrict = SubDistrict::factory()->create();
        $editedSubDistrict = SubDistrict::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/sub_districts/'.$subDistrict->id,
            $editedSubDistrict
        );

        $this->assertApiResponse($editedSubDistrict);
    }

    /**
     * @test
     */
    public function test_delete_sub_district()
    {
        $subDistrict = SubDistrict::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/sub_districts/'.$subDistrict->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/sub_districts/'.$subDistrict->id
        );

        $this->response->assertStatus(404);
    }
}
