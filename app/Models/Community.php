<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Community extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
      'name','user_id','description'
    ];

    public function topics(){
        return $this->belongsToMany(Topic::class);
    }

    protected static function booted()
    {
        static::addGlobalScope('user_topics', function (Builder $builder) {
            $builder->where('user_id', auth()->id());
        });
    }
}
