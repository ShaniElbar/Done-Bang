<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['user_id', 'name', 'color', 'favorit'];

    public function lists()
    {
        return $this->hasMany(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function teams()
    {
        return $this->hasMany(Team::class, 'category_id', 'id');
    }

}
