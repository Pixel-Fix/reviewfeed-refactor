<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'active',
    ];


    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function get_review_stats()
    {
        $results = DB::table('reviews')
                    ->select('rating_id')
                    ->selectRaw('count(*) as count')
                    ->where('company_id',$this->id)
                    ->groupBy('rating_id')
                    ->orderBy('rating_id','desc')
                    ->get();

        $stats["total"] = 0;
        $stats["ave"] = 0;
        $stats["1"] = 0;
        $stats["2"] = 0;
        $stats["3"] = 0;
        $stats["4"] = 0;
        $stats["5"] = 0;

        foreach($results as $result)
        {
            $stats[$result->rating_id] = $result->count;
            $stats["total"] = $stats["total"] + $result->count;
            $stats["ave"] = number_format((($stats["1"]*1) + ($stats["2"]*2) + ($stats["3"]*3) + ($stats["4"]*4) + ($stats["5"]*5))/$stats["total"],2);
        }
        $stats["floor"] = floor($stats["ave"]);
        return $stats;
    }

    public function setNameAttribute($value)
    {
        $this->attributes["name"] = strip_tags($value);
    }

    // public function setDescriptionAttribute($value)
    // {
    //     $this->attributes["description"] = str_replace("\n","<br>",strip_tags($value));
    // }

    // public function getDescriptionAttribute($value)
    // {
    //     // $this->attributes["description"] = str_replace("\n","<br>",$value);
    //     // return str_replace("\n","<br>",$value);
    // }

    public function setLocationAttribute($value)
    {
        $this->attributes["location"] = strip_tags($value);
    }

    public function setContactNumberAttribute($value)
    {
        $this->attributes["contact_number"] = strip_tags($value);
    }

    public function state()
    {
        return $this->belongsTo('App\Models\State');
    }

    public function getActiveAttribute($value)
    {
        return filter_var($value,FILTER_VALIDATE_BOOLEAN);
    }

    public function getImageAttribute($value)
    {
        if($value === null)
        {
            return asset('img/company.png');
        }

        return $value;
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
