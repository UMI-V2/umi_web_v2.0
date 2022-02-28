<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\master_province;

class master_provinceApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_master_province()
    {
        $masterProvince = master_province::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/master_provinces', $masterProvince
        );

        $this->assertApiResponse($masterProvince);
    }

    /**
     * @test
     */
    public function test_read_master_province()
    {
        $masterProvince = master_province::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/master_provinces/'.$masterProvince->id
        );

        $this->assertApiResponse($masterProvince->toArray());
    }

    /**
     * @test
     */
    public function test_update_master_province()
    {
        $masterProvince = master_province::factory()->create();
        $editedmaster_province = master_province::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/master_provinces/'.$masterProvince->id,
            $editedmaster_province
        );

        $this->assertApiResponse($editedmaster_province);
    }

    /**
     * @test
     */
    public function test_delete_master_province()
    {
        $masterProvince = master_province::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/master_provinces/'.$masterProvince->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/master_provinces/'.$masterProvince->id
        );

        $this->response->assertStatus(404);
    }
}
