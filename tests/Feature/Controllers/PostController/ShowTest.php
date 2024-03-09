<?php

use App\Models\Post;
use Inertia\Testing\AssertableInertia;
use function Pest\Laravel\get;


it('can show a post', function () {
    $post = Post::factory()->create();

    get(route('posts.show', $post))
        ->assertComponent('Posts/Show');
});
