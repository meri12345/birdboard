<?php

namespace Tests\Feature;

use App\Project;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTasksTest extends TestCase
{
    use RefreshDatabase,WithFaker;
    /** @test */
    public function project_can_have_task(){

        $this->withoutExceptionHandling();
        $this->actingAs(factory(User::class)->create());
        $project = factory(Project::class)->create(['owner_id'=>auth()->user()->id]);

        $this->post($project->path().'/tasks',[
            'body'=>'Test task'
        ]);

        $this->get($project->path())->assertSee('Test task');
    }
}
