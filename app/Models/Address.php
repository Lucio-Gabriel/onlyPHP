<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'zipcode',
        'street',
        'number',
        'complement',
        'neighborhood',
        'state',
        'city',
        'selected'
    ];

    /**
     * Scopes
    */

    /**
     * Relationships
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }   
    
    /**
     * Accerssors and Mutators
    */
}
