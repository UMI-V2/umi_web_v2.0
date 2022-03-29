<?php namespace Tests\Repositories;

use App\Models\BusinessFile;
use App\Repositories\BusinessFileRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BusinessFileRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BusinessFileRepository
     */
    protected $businessFileRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->businessFileRepo = \App::make(BusinessFileRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_business_file()
    {
        $businessFile = BusinessFile::factory()->make()->toArray();

        $createdBusinessFile = $this->businessFileRepo->create($businessFile);

        $createdBusinessFile = $createdBusinessFile->toArray();
        $this->assertArrayHasKey('id', $createdBusinessFile);
        $this->assertNotNull($createdBusinessFile['id'], 'Created BusinessFile must have id specified');
        $this->assertNotNull(BusinessFile::find($createdBusinessFile['id']), 'BusinessFile with given id must be in DB');
        $this->assertModelData($businessFile, $createdBusinessFile);
    }

    /**
     * @test read
     */
    public function test_read_business_file()
    {
        $businessFile = BusinessFile::factory()->create();

        $dbBusinessFile = $this->businessFileRepo->find($businessFile->id);

        $dbBusinessFile = $dbBusinessFile->toArray();
        $this->assertModelData($businessFile->toArray(), $dbBusinessFile);
    }

    /**
     * @test update
     */
    public function test_update_business_file()
    {
        $businessFile = BusinessFile::factory()->create();
        $fakeBusinessFile = BusinessFile::factory()->make()->toArray();

        $updatedBusinessFile = $this->businessFileRepo->update($fakeBusinessFile, $businessFile->id);

        $this->assertModelData($fakeBusinessFile, $updatedBusinessFile->toArray());
        $dbBusinessFile = $this->businessFileRepo->find($businessFile->id);
        $this->assertModelData($fakeBusinessFile, $dbBusinessFile->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_business_file()
    {
        $businessFile = BusinessFile::factory()->create();

        $resp = $this->businessFileRepo->delete($businessFile->id);

        $this->assertTrue($resp);
        $this->assertNull(BusinessFile::find($businessFile->id), 'BusinessFile should not exist in DB');
    }
}
