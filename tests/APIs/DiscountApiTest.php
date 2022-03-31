<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Discount;

class DiscountApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_discount()
    {
        $discount = Discount::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/discounts', $discount
        );

        $this->assertApiResponse($discount);
    }

    /**
     * @test
     */
    public function test_read_discount()
    {
        $discount = Discount::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/discounts/'.$discount->id
        );

        $this->assertApiResponse($discount->toArray());
    }

    /**
     * @test
     */
    public function test_update_discount()
    {
        $discount = Discount::factory()->create();
        $editedDiscount = Discount::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/discounts/'.$discount->id,
            $editedDiscount
        );

        $this->assertApiResponse($editedDiscount);
    }

    /**
     * @test
     */
    public function test_delete_discount()
    {
        $discount = Discount::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/discounts/'.$discount->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/discounts/'.$discount->id
        );

        $this->response->assertStatus(404);
    }
}
