<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\MasterPrivilege;

class MasterPrivilegeApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_MasterPrivilege()
    {
        $masterPrivilege = MasterPrivilege::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/master_privileges', $masterPrivilege
        );

        $this->assertApiResponse($masterPrivilege);
    }

    /**
     * @test
     */
    public function test_read_MasterPrivilege()
    {
        $masterPrivilege = MasterPrivilege::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/master_privileges/'.$masterPrivilege->id
        );

        $this->assertApiResponse($masterPrivilege->toArray());
    }

    /**
     * @test
     */
    public function test_update_MasterPrivilege()
    {
        $masterPrivilege = MasterPrivilege::factory()->create();
        $editedMasterPrivilege = MasterPrivilege::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/master_privileges/'.$masterPrivilege->id,
            $editedMasterPrivilege
        );

        $this->assertApiResponse($editedMasterPrivilege);
    }

    /**
     * @test
     */
    public function test_delete_MasterPrivilege()
    {
        $masterPrivilege = MasterPrivilege::factory()->create();

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
