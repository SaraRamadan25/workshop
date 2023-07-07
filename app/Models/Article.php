<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;

    protected $fillable=['title','description','category_id','worker_id','image'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function worker(): BelongsTo
    {
        return $this->belongsTo(Worker::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

}
