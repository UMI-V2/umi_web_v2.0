<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\master_unit;

class master_unitApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_master_unit()
    {
        $masterUnit = master_unit::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/master_units', $masterUnit
        );

        $this->assertApiResponse($masterUnit);
    }

    /**
     * @test
     */
    public function test_read_master_unit()
    {
        $masterUnit = master_unit::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/master_units/'.$masterUnit->id
        );

        $this->assertApiResponse($masterUnit->toArray());
    }

    /**
     * @test
     */
    public function test_update_master_unit()
    {
        $masterUnit = master_unit::factory()->create();
        $editedmaster_unit = master_unit::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/master_units/'.$masterUnit->id,
            $editedmaster_unit
        );

        $this->assertApiResponse($editedmaster_unit);
    }

    /**
     * @test
     */
    public function test_delete_master_unit()
    {
        $masterUnit = master_unit::factory()->create();

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
