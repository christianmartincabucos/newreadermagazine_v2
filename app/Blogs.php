<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model
{
    protected $table = 'blogs';
    protected $primaryKey = 'blog_id';
    protected $fillable = ['title', 'category_id', 'body', 'meta_desc', 'primary_key', 'secondary_key', 'author_id'];

    public function reference()
    {
        return $this->belongsTo(References::class, 'reference_id');

    }

    public function author()
    {
        return $this->belongsTo(Authors::class, 'author_id');

    }
}
