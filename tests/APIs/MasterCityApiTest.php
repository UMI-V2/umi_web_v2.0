<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\MasterCity;

class MasterCityApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_city()
    {
        $masterCity = MasterCity::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/master_cities', $masterCity
        );

        $this->assertApiResponse($masterCity);
    }

    /**
     * @test
     */
    public function test_read_city()
    {
        $masterCity = MasterCity::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/master_cities/'.$masterCity->id
        );

        $this->assertApiResponse($masterCity->toArray());
    }

    /**
     * @test
     */
    public function test_update_city()
    {
        $masterCity = MasterCity::factory()->create();
        $editedCity = MasterCity::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/master_cities/'.$masterCity->id,
            $editedCity
        );

        $this->assertApiResponse($editedCity);
    }

    /**
     * @test
     */
    public function test_delete_city()
    {
        $masterCity = MasterCity::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/master_cities/'.$masterCity->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/master_cities/'.$masterCity->id
        );

        $this->response->assertStatus(404);
    }
}
