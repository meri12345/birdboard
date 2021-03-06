<?php

namespace Tests\Unit;

use App\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;


class UserTest extends TestCase
{
    use WithFaker,RefreshDatabase;
    /** @test */
    public function a_user_has_projects(){
        $this->withoutExceptionHandling();
        $user = factory(User::class)->create();
        $this->assertInstanceOf(Collection::class,$user->projects);
    }
}
