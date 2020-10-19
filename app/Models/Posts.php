<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Posts extends Model
{
    use SoftDeletes;

    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->BelongsTo('App\Models\Category');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tags');
    }

    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }
}
