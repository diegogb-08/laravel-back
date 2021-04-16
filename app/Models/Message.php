<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'party_id',
        'owner_id',
        'date'
    ];

    public function users(){

        return $this->belongsTo('App\Models\User', 'owner_id');
    }

    public function parties(){

        return $this->belongsTo('App\Models\Party', 'party_id');
    }
}
