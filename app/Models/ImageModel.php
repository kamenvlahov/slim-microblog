<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ImageModel extends Model
{
    protected $table = "images";

    protected $fillable = [
        'url',
        'article_id'
    ];

    public function article(): BelongsTo
    {
        return $this->belongsTo(ArticlesModel::class, 'article_id');
    }

}