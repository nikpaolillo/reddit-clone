<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    /** @test */

    public function post_determines_its_author() {

      $user = factory(\App\User::class)->create();

      $post = factory(\App\Post::class)->create([
        'user_id' => $user->id
      ]);

      $postByAuthor = $post->wasCreatedBy($user);

      $this->assertTrue($postByAuthor);

    }
}
