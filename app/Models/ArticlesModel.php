<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ArticlesModel extends Model
{
    protected $table = "articles";

    protected $fillable = [
        'title',
        'description',
        'body',
        'user_id'
    ];

    public function images(): HasMany
    {
        return $this->hasMany(ImageModel::class,'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }
}
