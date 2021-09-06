<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class References extends Model
{
    protected $table = 'references';
    protected $primaryKey = 'reference_id';
    protected $fillable = ['reference_groupname', 'reference_shortcodename', 'reference_longcodename'];
}
