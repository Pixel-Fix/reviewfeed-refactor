<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function replies()
    {
        return $this->hasMany('App\Models\ReviewReply')->orderBy('created_at','asc');
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company');
    }

    public function setDescriptionAttribute($value)
    {
        $this->attributes["description"] = str_replace("\n","<br>",strip_tags($value));
    }

    public function setTitleAttribute($value)
    {
        $this->attributes["title"] = strip_tags($value);
    }

    public function setLocationAttribute($value)
    {
        $this->attributes["location"] = strip_tags($value);
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
