<?php

namespace Tests\Feature;

use App\Models\Projects;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProjectsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_project()
    {
        $data = [
            'title' => 'Test Project',
            'description' => 'This is a test project',
            'heading1' => 'Heading 1',
            'heading2' => 'Heading 2',
            'heading3' => 'Heading 3',
            'heading4' => 'Heading 4',
            'url' => 'http://example.com',
            'year' => '2023',
            // 'banner' => 'banner.jpg',
            // 'images' => ['image1.jpg', 'image2.jpg'],
        ];

        $response = $this->postJson('/api/projects', $data);

        $response->assertStatus(201);
        $this->assertDatabaseHas('projects', ['title' => 'Test Project']);
    }

    /** @test */
    public function it_can_update_a_project()
    {
        $project = Projects::factory()->create();

        $data = [
            'title' => 'Updated Project',
            'description' => 'This is an updated project',
            'heading1' => 'Updated Heading 1',
            'heading2' => 'Updated Heading 2',
            'heading3' => 'Updated Heading 3',
            'heading4' => 'Updated Heading 4',
            'url' => 'http://updated-example.com',
            'year' => '2024',
        ];

        $response = $this->patchJson("/api/projects/{$project->id}", $data);

        $response->assertStatus(200);
        $this->assertDatabaseHas('projects', ['title' => 'Updated Project']);
    }

    /** @test */
    public function it_can_delete_a_project()
    {
        $project = Projects::factory()->create();

        $response = $this->deleteJson("/api/projects/{$project->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('projects', ['id' => $project->id]);
    }

    /** @test */
    public function it_can_list_projects()
    {
        Projects::factory()->count(3)->create();

        $response = $this->getJson('/api/projects');

        $response->assertStatus(200);
        $response->assertJsonCount(3);
    }

    /** @test */
    public function it_can_show_a_project()
    {
        $project = Projects::factory()->create();

        $response = $this->getJson("/api/projects/{$project->id}");

        $response->assertStatus(200);
        $response->assertJson(['id' => $project->id]);
    }
}
