<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;

    protected $fillable = [
      'name','user_id','description'
    ];

    public function topics(){
        return $this->belongsToMany(Topic::class);
    }
}
