<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */

    public function post_determines_its_author() {

      $user = factory(\App\User::class)->create();

      $post = factory(\App\Post::class)->create([
        'user_id' => $user->id
      ]);

      $postByAnotherUser = factory(\App\Post::class)->create();

      $postByAuthor = $post->wasCreatedBy($user);

      $postByAnotherAuthor = $postByAnotherUser->wasCreatedBy($user);

      $this->assertTrue($postByAuthor);
      $this->assertFalse($postByAnotherAuthor);

    }

    /** @test */

    public function post_determines_its_author_if_null_return_false() {

      $post = factory(\App\Post::class)->create();

      $postByAuthor = $post->wasCreatedBy(null);

      $this->assertFalse($postByAuthor);

    }
}
