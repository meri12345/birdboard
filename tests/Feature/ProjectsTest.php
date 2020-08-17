<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectsTest extends TestCase
{
    use WithFaker,RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_project(){

        $this->actingAs(factory(User::class)->create());
        $this->withoutExceptionHandling();
        $attributes = [
            'title'=>$this->faker->sentence,
            'desc'=> $this->faker->paragraph
        ];

        $this->post('/projects',$attributes)->assertRedirect('/projects');

        $this->assertDatabaseHas('projects',$attributes);

        $this->get('/projects')->assertSee($attributes['title']);
    }

    public function a_user_can_view_a_project(){
        $this->withoutExceptionHandling();
        $project = factory('App\Project')->create();
        $this->get($project->path())->assertSee($project->title)->assertSee($project->desc);
    }
}
