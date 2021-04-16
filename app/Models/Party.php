<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Party extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'gameId',
        'ownerId',
        'memberId',
        'messageId'
    ];

    public function members(){

        return $this->hasMany('App\Models\User', 'memberId');
    }

    public function owner(){

        return $this->belongsTo('App\Models\User', 'ownerId');
    }

    public function messages(){

        return $this->hasMany('App\Models\Message', 'messageId');
    }

    public function games(){

        return $this->belongsTo('App\Models\Game', 'gameId');
    }
}
