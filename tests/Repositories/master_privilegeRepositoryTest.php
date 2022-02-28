<?php namespace Tests\Repositories;

use App\Models\master_privilege;
use App\Repositories\master_privilegeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class master_privilegeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var master_privilegeRepository
     */
    protected $masterPrivilegeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->masterPrivilegeRepo = \App::make(master_privilegeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_master_privilege()
    {
        $masterPrivilege = master_privilege::factory()->make()->toArray();

        $createdmaster_privilege = $this->masterPrivilegeRepo->create($masterPrivilege);

        $createdmaster_privilege = $createdmaster_privilege->toArray();
        $this->assertArrayHasKey('id', $createdmaster_privilege);
        $this->assertNotNull($createdmaster_privilege['id'], 'Created master_privilege must have id specified');
        $this->assertNotNull(master_privilege::find($createdmaster_privilege['id']), 'master_privilege with given id must be in DB');
        $this->assertModelData($masterPrivilege, $createdmaster_privilege);
    }

    /**
     * @test read
     */
    public function test_read_master_privilege()
    {
        $masterPrivilege = master_privilege::factory()->create();

        $dbmaster_privilege = $this->masterPrivilegeRepo->find($masterPrivilege->id);

        $dbmaster_privilege = $dbmaster_privilege->toArray();
        $this->assertModelData($masterPrivilege->toArray(), $dbmaster_privilege);
    }

    /**
     * @test update
     */
    public function test_update_master_privilege()
    {
        $masterPrivilege = master_privilege::factory()->create();
        $fakemaster_privilege = master_privilege::factory()->make()->toArray();

        $updatedmaster_privilege = $this->masterPrivilegeRepo->update($fakemaster_privilege, $masterPrivilege->id);

        $this->assertModelData($fakemaster_privilege, $updatedmaster_privilege->toArray());
        $dbmaster_privilege = $this->masterPrivilegeRepo->find($masterPrivilege->id);
        $this->assertModelData($fakemaster_privilege, $dbmaster_privilege->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_master_privilege()
    {
        $masterPrivilege = master_privilege::factory()->create();

        $resp = $this->masterPrivilegeRepo->delete($masterPrivilege->id);

        $this->assertTrue($resp);
        $this->assertNull(master_privilege::find($masterPrivilege->id), 'master_privilege should not exist in DB');
    }
}
