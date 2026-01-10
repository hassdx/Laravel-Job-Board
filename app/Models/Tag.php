<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    use HasUlids;

    use HasFactory;
    protected $primaryKey = 'id';

    protected $keytype = 'string';

    public $incrementing = false;
    protected $table = 'tags';

    protected $fillable = ['title'];

    protected $guarded = ['id'];

    public function posts(){
        return $this->belongsToMany(Post::class, 'post_tag', 'tag_id', 'post_id');
    }
}
