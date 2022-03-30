<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\OpenHour;

class OpenHourApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_open_hour()
    {
        $openHour = OpenHour::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/open_hours', $openHour
        );

        $this->assertApiResponse($openHour);
    }

    /**
     * @test
     */
    public function test_read_open_hour()
    {
        $openHour = OpenHour::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/open_hours/'.$openHour->id
        );

        $this->assertApiResponse($openHour->toArray());
    }

    /**
     * @test
     */
    public function test_update_open_hour()
    {
        $openHour = OpenHour::factory()->create();
        $editedOpenHour = OpenHour::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/open_hours/'.$openHour->id,
            $editedOpenHour
        );

        $this->assertApiResponse($editedOpenHour);
    }

    /**
     * @test
     */
    public function test_delete_open_hour()
    {
        $openHour = OpenHour::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/open_hours/'.$openHour->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/open_hours/'.$openHour->id
        );

        $this->response->assertStatus(404);
    }
}
