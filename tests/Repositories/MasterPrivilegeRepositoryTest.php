<?php namespace Tests\Repositories;

use App\Models\MasterPrivilege;
use App\Repositories\MasterPrivilegeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MasterPrivilegeRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MasterPrivilegeRepository
     */
    protected $masterPrivilegeRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->masterPrivilegeRepo = \App::make(MasterPrivilegeRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_MasterPrivilege()
    {
        $masterPrivilege = MasterPrivilege::factory()->make()->toArray();

        $createdMasterPrivilege = $this->masterPrivilegeRepo->create($masterPrivilege);

        $createdMasterPrivilege = $createdMasterPrivilege->toArray();
        $this->assertArrayHasKey('id', $createdMasterPrivilege);
        $this->assertNotNull($createdMasterPrivilege['id'], 'Created MasterPrivilege must have id specified');
        $this->assertNotNull(MasterPrivilege::find($createdMasterPrivilege['id']), 'MasterPrivilege with given id must be in DB');
        $this->assertModelData($masterPrivilege, $createdMasterPrivilege);
    }

    /**
     * @test read
     */
    public function test_read_MasterPrivilege()
    {
        $masterPrivilege = MasterPrivilege::factory()->create();

        $dbMasterPrivilege = $this->masterPrivilegeRepo->find($masterPrivilege->id);

        $dbMasterPrivilege = $dbMasterPrivilege->toArray();
        $this->assertModelData($masterPrivilege->toArray(), $dbMasterPrivilege);
    }

    /**
     * @test update
     */
    public function test_update_MasterPrivilege()
    {
        $masterPrivilege = MasterPrivilege::factory()->create();
        $fakeMasterPrivilege = MasterPrivilege::factory()->make()->toArray();

        $updatedMasterPrivilege = $this->masterPrivilegeRepo->update($fakeMasterPrivilege, $masterPrivilege->id);

        $this->assertModelData($fakeMasterPrivilege, $updatedMasterPrivilege->toArray());
        $dbMasterPrivilege = $this->masterPrivilegeRepo->find($masterPrivilege->id);
        $this->assertModelData($fakeMasterPrivilege, $dbMasterPrivilege->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_MasterPrivilege()
    {
        $masterPrivilege = MasterPrivilege::factory()->create();

        $resp = $this->masterPrivilegeRepo->delete($masterPrivilege->id);

        $this->assertTrue($resp);
        $this->assertNull(MasterPrivilege::find($masterPrivilege->id), 'MasterPrivilege should not exist in DB');
    }
}
