<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\master_privilege;

class master_privilegeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_master_privilege()
    {
        $masterPrivilege = master_privilege::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/master_privileges', $masterPrivilege
        );

        $this->assertApiResponse($masterPrivilege);
    }

    /**
     * @test
     */
    public function test_read_master_privilege()
    {
        $masterPrivilege = master_privilege::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/master_privileges/'.$masterPrivilege->id
        );

        $this->assertApiResponse($masterPrivilege->toArray());
    }

    /**
     * @test
     */
    public function test_update_master_privilege()
    {
        $masterPrivilege = master_privilege::factory()->create();
        $editedmaster_privilege = master_privilege::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/master_privileges/'.$masterPrivilege->id,
            $editedmaster_privilege
        );

        $this->assertApiResponse($editedmaster_privilege);
    }

    /**
     * @test
     */
    public function test_delete_master_privilege()
    {
        $masterPrivilege = master_privilege::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/master_privileges/'.$masterPrivilege->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/master_privileges/'.$masterPrivilege->id
        );

        $this->response->assertStatus(404);
    }
}
