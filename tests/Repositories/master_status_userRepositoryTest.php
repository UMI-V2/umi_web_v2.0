<?php namespace Tests\Repositories;

use App\Models\master_status_user;
use App\Repositories\master_status_userRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class master_status_userRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var master_status_userRepository
     */
    protected $masterStatusUserRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->masterStatusUserRepo = \App::make(master_status_userRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_master_status_user()
    {
        $masterStatusUser = master_status_user::factory()->make()->toArray();

        $createdmaster_status_user = $this->masterStatusUserRepo->create($masterStatusUser);

        $createdmaster_status_user = $createdmaster_status_user->toArray();
        $this->assertArrayHasKey('id', $createdmaster_status_user);
        $this->assertNotNull($createdmaster_status_user['id'], 'Created master_status_user must have id specified');
        $this->assertNotNull(master_status_user::find($createdmaster_status_user['id']), 'master_status_user with given id must be in DB');
        $this->assertModelData($masterStatusUser, $createdmaster_status_user);
    }

    /**
     * @test read
     */
    public function test_read_master_status_user()
    {
        $masterStatusUser = master_status_user::factory()->create();

        $dbmaster_status_user = $this->masterStatusUserRepo->find($masterStatusUser->id);

        $dbmaster_status_user = $dbmaster_status_user->toArray();
        $this->assertModelData($masterStatusUser->toArray(), $dbmaster_status_user);
    }

    /**
     * @test update
     */
    public function test_update_master_status_user()
    {
        $masterStatusUser = master_status_user::factory()->create();
        $fakemaster_status_user = master_status_user::factory()->make()->toArray();

        $updatedmaster_status_user = $this->masterStatusUserRepo->update($fakemaster_status_user, $masterStatusUser->id);

        $this->assertModelData($fakemaster_status_user, $updatedmaster_status_user->toArray());
        $dbmaster_status_user = $this->masterStatusUserRepo->find($masterStatusUser->id);
        $this->assertModelData($fakemaster_status_user, $dbmaster_status_user->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_master_status_user()
    {
        $masterStatusUser = master_status_user::factory()->create();

        $resp = $this->masterStatusUserRepo->delete($masterStatusUser->id);

        $this->assertTrue($resp);
        $this->assertNull(master_status_user::find($masterStatusUser->id), 'master_status_user should not exist in DB');
    }
}
