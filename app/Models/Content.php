<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = [
        'title',
        'description',
        'file',
        'published',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function history()
    {
        return $this->hasMany(History::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorites::class);
    }

}
