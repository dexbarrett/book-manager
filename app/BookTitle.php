<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookTitle extends Model
{
    protected $table = 'titles';
    protected $fillable = ['title', 'sort_title', 'author_id'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
}
