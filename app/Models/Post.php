<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Comment;
use App\Models\Tag;
use Illuminate\Types\Model\Comments;

class Post extends Model
{
    //
    use HasUlids;

    use HasFactory;
    protected $primaryKey = 'id';

    protected $keytype = 'string';

    public $incrementing = false;
    protected $table = 'post';
    protected $fillable = [
        'title',
        'body',
        'author',
        "published"
    ];

    protected $guarded = ['id'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }


    public function getTable()
    {
        return 'post';
    }

}
