<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'partyId',
        'ownerId',
        'date'
    ];

    public function users(){

        return $this->belongsTo('App\Models\User', 'ownerId');
    }

    public function parties(){

        return $this->belongsTo('App\Models\Party', 'partyId');
    }
}
