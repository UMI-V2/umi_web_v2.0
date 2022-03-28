<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\MasterProvince;

class MasterProvinceApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_MasterProvince()
    {
        $masterProvince = MasterProvince::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/master_provinces', $masterProvince
        );

        $this->assertApiResponse($masterProvince);
    }

    /**
     * @test
     */
    public function test_read_MasterProvince()
    {
        $masterProvince = MasterProvince::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/master_provinces/'.$masterProvince->id
        );

        $this->assertApiResponse($masterProvince->toArray());
    }

    /**
     * @test
     */
    public function test_update_MasterProvince()
    {
        $masterProvince = MasterProvince::factory()->create();
        $editedMasterProvince = MasterProvince::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/master_provinces/'.$masterProvince->id,
            $editedMasterProvince
        );

        $this->assertApiResponse($editedMasterProvince);
    }

    /**
     * @test
     */
    public function test_delete_MasterProvince()
    {
        $masterProvince = MasterProvince::factory()->create();

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
