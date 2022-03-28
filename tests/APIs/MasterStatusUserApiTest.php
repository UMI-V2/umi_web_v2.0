<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\MasterStatusUser;

class MasterStatusUserApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_MasterStatusUser()
    {
        $masterStatusUser = MasterStatusUser::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/master_status_users', $masterStatusUser
        );

        $this->assertApiResponse($masterStatusUser);
    }

    /**
     * @test
     */
    public function test_read_MasterStatusUser()
    {
        $masterStatusUser = MasterStatusUser::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/master_status_users/'.$masterStatusUser->id
        );

        $this->assertApiResponse($masterStatusUser->toArray());
    }

    /**
     * @test
     */
    public function test_update_MasterStatusUser()
    {
        $masterStatusUser = MasterStatusUser::factory()->create();
        $editedMasterStatusUser = MasterStatusUser::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/master_status_users/'.$masterStatusUser->id,
            $editedMasterStatusUser
        );

        $this->assertApiResponse($editedMasterStatusUser);
    }

    /**
     * @test
     */
    public function test_delete_MasterStatusUser()
    {
        $masterStatusUser = MasterStatusUser::factory()->create();

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
