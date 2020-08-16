<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name', 'sort_name'];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower(trim($value));
    }

    public function setSortNameAttribute($value)
    {
        $this->attributes['sort_name'] = strtolower(trim($value));
    }
}