<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Balances;

class BalancesApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_balances()
    {
        $balances = Balances::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/balances', $balances
        );

        $this->assertApiResponse($balances);
    }

    /**
     * @test
     */
    public function test_read_balances()
    {
        $balances = Balances::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/balances/'.$balances->id
        );

        $this->assertApiResponse($balances->toArray());
    }

    /**
     * @test
     */
    public function test_update_balances()
    {
        $balances = Balances::factory()->create();
        $editedBalances = Balances::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/balances/'.$balances->id,
            $editedBalances
        );

        $this->assertApiResponse($editedBalances);
    }

    /**
     * @test
     */
    public function test_delete_balances()
    {
        $balances = Balances::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/balances/'.$balances->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/balances/'.$balances->id
        );

        $this->response->assertStatus(404);
    }
}
