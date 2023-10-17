<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RyanChandler\Comments\Concerns\HasComments;

class Feedback extends Model
{
    use HasFactory, HasComments;

    protected $fillable = ['user_id', 'title', 'description', 'category'];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Not Found',
        ]);
    }

    public function votes()
    {
        return $this->hasMany(Vote::class);
    }

}
