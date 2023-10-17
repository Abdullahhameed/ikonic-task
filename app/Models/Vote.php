<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'feedback_id'];

    public function feedback()
    {
        return $this->belongsTo(Feedback::class);
    }
}
