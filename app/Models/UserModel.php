<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserModel extends Model
{
    protected $table = "users";

    protected $fillable = [
        'username',
        'password',
        'rights'
    ];

    
}
