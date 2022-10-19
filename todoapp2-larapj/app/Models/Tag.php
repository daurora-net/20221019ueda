<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = array('id');

    public function getLists()
    {
        $taglist = Tag::pluck('title', 'id');

        return $taglist;
    }

    public function todos()
    {
        return $this->hasMany('Todo::class');
    }
}