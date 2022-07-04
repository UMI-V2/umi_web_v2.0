<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Announcement;

class AnnouncementApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_announcement()
    {
        $announcement = Announcement::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/announcements', $announcement
        );

        $this->assertApiResponse($announcement);
    }

    /**
     * @test
     */
    public function test_read_announcement()
    {
        $announcement = Announcement::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/announcements/'.$announcement->id
        );

        $this->assertApiResponse($announcement->toArray());
    }

    /**
     * @test
     */
    public function test_update_announcement()
    {
        $announcement = Announcement::factory()->create();
        $editedAnnouncement = Announcement::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/announcements/'.$announcement->id,
            $editedAnnouncement
        );

        $this->assertApiResponse($editedAnnouncement);
    }

    /**
     * @test
     */
    public function test_delete_announcement()
    {
        $announcement = Announcement::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/announcements/'.$announcement->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/announcements/'.$announcement->id
        );

        $this->response->assertStatus(404);
    }
}
