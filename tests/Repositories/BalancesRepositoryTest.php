<?php namespace Tests\Repositories;

use App\Models\Balances;
use App\Repositories\BalancesRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BalancesRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BalancesRepository
     */
    protected $balancesRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->balancesRepo = \App::make(BalancesRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_balances()
    {
        $balances = Balances::factory()->make()->toArray();

        $createdBalances = $this->balancesRepo->create($balances);

        $createdBalances = $createdBalances->toArray();
        $this->assertArrayHasKey('id', $createdBalances);
        $this->assertNotNull($createdBalances['id'], 'Created Balances must have id specified');
        $this->assertNotNull(Balances::find($createdBalances['id']), 'Balances with given id must be in DB');
        $this->assertModelData($balances, $createdBalances);
    }

    /**
     * @test read
     */
    public function test_read_balances()
    {
        $balances = Balances::factory()->create();

        $dbBalances = $this->balancesRepo->find($balances->id);

        $dbBalances = $dbBalances->toArray();
        $this->assertModelData($balances->toArray(), $dbBalances);
    }

    /**
     * @test update
     */
    public function test_update_balances()
    {
        $balances = Balances::factory()->create();
        $fakeBalances = Balances::factory()->make()->toArray();

        $updatedBalances = $this->balancesRepo->update($fakeBalances, $balances->id);

        $this->assertModelData($fakeBalances, $updatedBalances->toArray());
        $dbBalances = $this->balancesRepo->find($balances->id);
        $this->assertModelData($fakeBalances, $dbBalances->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_balances()
    {
        $balances = Balances::factory()->create();

        $resp = $this->balancesRepo->delete($balances->id);

        $this->assertTrue($resp);
        $this->assertNull(Balances::find($balances->id), 'Balances should not exist in DB');
    }
}
