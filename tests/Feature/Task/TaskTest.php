<?php

namespace Tests\Feature\Task;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_site_loaded_correctly()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/');
        $response->assertStatus(200);
    }
    public function test_site_redirect()
    {
        $response = $this->get('/');
        $response->assertRedirect('/login');
    }
    public function test_task_index()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/tasks');
        $response->assertStatus(200);
    }
    public function test_task_completed()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/tasks/completed');
        $response->assertStatus(200);
    }
    public function test_task_create()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/tasks', [
            'name' => 'MyTask',
            'description' => 'Create todo app on laravel'
        ]);
        $response->assertRedirect('/tasks');
    }
    public function test_task_create_no_data()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/');
        $response->assertStatus(405);
    }
    public function test_task_create_invalid_data()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post('/tasks', [
            'name' => 'MyTask',
        ]);
        $response->assertStatus(302);
    }
    public function test_task_updated()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create();
        $response = $this->actingAs($user)->patch('/tasks/' . $task->id, [
            'name' => 'another name',
            'description' => 'another description'
        ]);
        $response->assertRedirect('/tasks');
    }
    public function test_task_delete()
    {
        $user = User::factory()->create();
        $task = Task::factory()->create();
        $response = $this->actingAs($user)->delete('/tasks/' . $task->id);
        $response->assertRedirect('/tasks');
    }

}
