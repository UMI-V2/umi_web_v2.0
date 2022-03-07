<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\master_status_user;

class master_status_userApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_master_status_user()
    {
        $masterStatusUser = master_status_user::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/master_status_users', $masterStatusUser
        );

        $this->assertApiResponse($masterStatusUser);
    }

    /**
     * @test
     */
    public function test_read_master_status_user()
    {
        $masterStatusUser = master_status_user::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/master_status_users/'.$masterStatusUser->id
        );

        $this->assertApiResponse($masterStatusUser->toArray());
    }

    /**
     * @test
     */
    public function test_update_master_status_user()
    {
        $masterStatusUser = master_status_user::factory()->create();
        $editedmaster_status_user = master_status_user::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/master_status_users/'.$masterStatusUser->id,
            $editedmaster_status_user
        );

        $this->assertApiResponse($editedmaster_status_user);
    }

    /**
     * @test
     */
    public function test_delete_master_status_user()
    {
        $masterStatusUser = master_status_user::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/master_status_users/'.$masterStatusUser->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/master_status_users/'.$masterStatusUser->id
        );

        $this->response->assertStatus(404);
    }
}
