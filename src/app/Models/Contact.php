<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'tel',
        'address',
        'building',
        'detail',
    ];

    public function category(){
        return $this->hasOne('App\Models\Category','id', 'category_id');
    }

    // 検索処理用メソッド
    public function scopeKeywordSearch($query, $keyword)
    {
        if (!empty($keyword)) {
            $query->where('first_name', 'like', '%' . $keyword . '%')
                ->orwhere('last_name', 'like', '%' . $keyword . '%')
                ->orwhere('email', 'like', '%' . $keyword . '%')
                ->orwhere('email', '=', $keyword);
        }
    }

    public function scopeGenderSearch($query, $gender){
        if(!empty($gender)){
            $query->where('gender', $gender);
        }
    }

    public function scopeCategory_idSearch($query, $category_id){
        if(!empty($category_id)){
            $query->where('category_id', '=', $category_id);
        }
    }

    public function scopeUpdated_atSearch($query, $date){
        if(!empty($date)){
            $query->where('updated_at', '=', $date);
        }
    }
}
