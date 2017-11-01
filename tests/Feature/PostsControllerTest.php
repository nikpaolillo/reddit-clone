<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostsControllerTest extends TestCase
{

    use DatabaseMigrations;

    /** @test */
    public function a_guest_can_see_all_the_posts() {

      $posts = factory(\App\Post::class, 10)->create();

      $response = $this->get(route('posts_path'));

      $response->assertStatus(200);

      foreach ($posts as $post) {
        $response->assertSee($post->title);
      }

    }

    /** @test */
    public function a_registered_user_can_see_all_the_posts() {

      $user = factory(\App\User::class)->create();

      $this->userSignIn($user);

      $posts = factory(\App\Post::class, 10)->create();

      $response = $this->get(route('posts_path'));

      $response->assertStatus(200);

      foreach ($posts as $post) {
        $response->assertSee($post->title);
      }

    }

    /** @test */
    public function it_sees_posts_author() {

      $user = factory(\App\User::class)->create();

      $this->userSignIn($user);

      $posts = factory(\App\Post::class, 10)->create();

      $response = $this->get(route('posts_path'));

      $response->assertStatus(200);

      foreach ($posts as $post) {
        $response->assertSee($post->title);
        $response->assertSee($post->user->name);
      }

    }

}
