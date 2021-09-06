<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    protected $table = 'authors';
    protected $primaryKey = 'author_id';
    protected $fillable = ['name', 'email', 'occupation'];

    public function reference()
    {
        return $this->hasMany(Blogs::class, 'blog_id');
    }
}
