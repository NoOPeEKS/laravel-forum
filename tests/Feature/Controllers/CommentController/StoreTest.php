<?php

namespace Tests\Feature\Controllers\CommentController;

use App\Models\Post;
use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;

it('can store a comment' function () {
    $user = User::factory()->create();
    $post = Post::factory()->create();

    actingAs($user)->post(route('posts.comments.store', $post), [
        'body' => 'this is a comment',
    ]);

    assertDatabaseHas(Comment::class, [
        'post_id' => $post->id,
        'user_id' => $user->id,
        'body' => 'this is a commment'
    ]);
});
