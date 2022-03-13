<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewReply extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes["description"] = str_replace("\n","<br>",strip_tags($value));
    }
}
