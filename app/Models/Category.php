<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function total_reviews($id)
    {
        $result = DB::table('reviews')
                    ->selectRaw('count(*) as count')
                    ->where('category_id',$id)
                    ->first();

        return $result->count;
    }

    public function companies()
    {
        return $this->hasMany('App\Models\Company');
    }
}
