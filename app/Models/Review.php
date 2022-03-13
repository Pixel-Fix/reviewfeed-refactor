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

    public function scopeCategory($query, $filters_category)
    {
        if ($filters_category !== 'all' && $filters_category !== null) {
            $query->where('category_id',$filters_category);
        }
    }

    public function scopeRating($query, $filters_rating)
    {
        if ($filters_rating > 0) {
            $query->where('rating_id','>=',$filters_rating);
        }
    }

    public function scopeSearch($query, $search_criteria)
    {
        if ($search_criteria) {
            $query
                ->where('title','like','%'.str_replace(" ","%",$search_criteria).'%')
                ->orWhere('company_name','like','%'.str_replace(" ","%",$search_criteria).'%');
        };
    }
}
