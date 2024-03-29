<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'body', // make it so that the CommentController::store() can fill the property body
    // ]; // This $fillable is no longer needed because we deactivated mass assignment protection
    //    // and we will validate every request from now on.

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function post(): BelongsTo {
        return $this->belongsTo(Post::class);
    }

}
