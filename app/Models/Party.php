<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'game_id',
        'owner_id',
        'message_id'
    ];

    public function owner(){

        return $this->belongsTo('App\Models\User', 'owner_id');
    }

    public function messages(){

        return $this->hasMany('App\Models\Message', 'message_id');
    }

    public function games(){

        return $this->belongsTo('App\Models\Game', 'game_id');
    }
}
