<?php namespace Tests\Repositories;

use App\Models\MasterStatusUser;
use App\Repositories\MasterStatusUserRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MasterStatusUserRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MasterStatusUserRepository
     */
    protected $masterStatusUserRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->masterStatusUserRepo = \App::make(MasterStatusUserRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_MasterStatusUser()
    {
        $masterStatusUser = MasterStatusUser::factory()->make()->toArray();

        $createdMasterStatusUser = $this->masterStatusUserRepo->create($masterStatusUser);

        $createdMasterStatusUser = $createdMasterStatusUser->toArray();
        $this->assertArrayHasKey('id', $createdMasterStatusUser);
        $this->assertNotNull($createdMasterStatusUser['id'], 'Created MasterStatusUser must have id specified');
        $this->assertNotNull(MasterStatusUser::find($createdMasterStatusUser['id']), 'MasterStatusUser with given id must be in DB');
        $this->assertModelData($masterStatusUser, $createdMasterStatusUser);
    }

    /**
     * @test read
     */
    public function test_read_MasterStatusUser()
    {
        $masterStatusUser = MasterStatusUser::factory()->create();

        $dbMasterStatusUser = $this->masterStatusUserRepo->find($masterStatusUser->id);

        $dbMasterStatusUser = $dbMasterStatusUser->toArray();
        $this->assertModelData($masterStatusUser->toArray(), $dbMasterStatusUser);
    }

    /**
     * @test update
     */
    public function test_update_MasterStatusUser()
    {
        $masterStatusUser = MasterStatusUser::factory()->create();
        $fakeMasterStatusUser = MasterStatusUser::factory()->make()->toArray();

        $updatedMasterStatusUser = $this->masterStatusUserRepo->update($fakeMasterStatusUser, $masterStatusUser->id);

        $this->assertModelData($fakeMasterStatusUser, $updatedMasterStatusUser->toArray());
        $dbMasterStatusUser = $this->masterStatusUserRepo->find($masterStatusUser->id);
        $this->assertModelData($fakeMasterStatusUser, $dbMasterStatusUser->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_MasterStatusUser()
    {
        $masterStatusUser = MasterStatusUser::factory()->create();

        $resp = $this->masterStatusUserRepo->delete($masterStatusUser->id);

        $this->assertTrue($resp);
        $this->assertNull(MasterStatusUser::find($masterStatusUser->id), 'MasterStatusUser should not exist in DB');
    }
}
