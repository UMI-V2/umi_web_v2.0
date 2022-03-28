<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\MasterUnit;

class MasterUnitApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_MasterUnit()
    {
        $masterUnit = MasterUnit::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/master_units', $masterUnit
        );

        $this->assertApiResponse($masterUnit);
    }

    /**
     * @test
     */
    public function test_read_MasterUnit()
    {
        $masterUnit = MasterUnit::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/master_units/'.$masterUnit->id
        );

        $this->assertApiResponse($masterUnit->toArray());
    }

    /**
     * @test
     */
    public function test_update_MasterUnit()
    {
        $masterUnit = MasterUnit::factory()->create();
        $editedMasterUnit = MasterUnit::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/master_units/'.$masterUnit->id,
            $editedMasterUnit
        );

        $this->assertApiResponse($editedMasterUnit);
    }

    /**
     * @test
     */
    public function test_delete_MasterUnit()
    {
        $masterUnit = MasterUnit::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/master_units/'.$masterUnit->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/master_units/'.$masterUnit->id
        );

        $this->response->assertStatus(404);
    }
}
