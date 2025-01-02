<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['street', 'purok', 'barangay', 'city', 'zipcode', 'isMain', 'user_id',];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'isMain' => 'boolean',
    ];

    /**
     * Relationship: User
     *
     * Each address belongs to a single user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include the main address for a user.
     */
    public function scopeMain($query)
    {
        return $query->where('isMain', true);
    }
}
