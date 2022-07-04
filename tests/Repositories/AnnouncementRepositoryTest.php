<?php namespace Tests\Repositories;

use App\Models\Announcement;
use App\Repositories\AnnouncementRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AnnouncementRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AnnouncementRepository
     */
    protected $announcementRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->announcementRepo = \App::make(AnnouncementRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_announcement()
    {
        $announcement = Announcement::factory()->make()->toArray();

        $createdAnnouncement = $this->announcementRepo->create($announcement);

        $createdAnnouncement = $createdAnnouncement->toArray();
        $this->assertArrayHasKey('id', $createdAnnouncement);
        $this->assertNotNull($createdAnnouncement['id'], 'Created Announcement must have id specified');
        $this->assertNotNull(Announcement::find($createdAnnouncement['id']), 'Announcement with given id must be in DB');
        $this->assertModelData($announcement, $createdAnnouncement);
    }

    /**
     * @test read
     */
    public function test_read_announcement()
    {
        $announcement = Announcement::factory()->create();

        $dbAnnouncement = $this->announcementRepo->find($announcement->id);

        $dbAnnouncement = $dbAnnouncement->toArray();
        $this->assertModelData($announcement->toArray(), $dbAnnouncement);
    }

    /**
     * @test update
     */
    public function test_update_announcement()
    {
        $announcement = Announcement::factory()->create();
        $fakeAnnouncement = Announcement::factory()->make()->toArray();

        $updatedAnnouncement = $this->announcementRepo->update($fakeAnnouncement, $announcement->id);

        $this->assertModelData($fakeAnnouncement, $updatedAnnouncement->toArray());
        $dbAnnouncement = $this->announcementRepo->find($announcement->id);
        $this->assertModelData($fakeAnnouncement, $dbAnnouncement->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_announcement()
    {
        $announcement = Announcement::factory()->create();

        $resp = $this->announcementRepo->delete($announcement->id);

        $this->assertTrue($resp);
        $this->assertNull(Announcement::find($announcement->id), 'Announcement should not exist in DB');
    }
}
