<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model {

    public static $validation_rules = [
        'first_name' => 'required|between:2,30',
        'last_name' => 'required|between:2,30',
        'date_of_birth' => 'required|date',
        'address' => 'required|between:5,191',
    ];
    
    
    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'address',
    ];
    
    protected $dates = [
        'date_of_birth',
    ];
    
    
    public function books()
    {
        return $this->hasMany('App\Models\Book', 'author_id');
    }
    
    
    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    
        public function getAgeAttribute()
    {
        return $this->date_of_birth ? $this->date_of_birth->diffInYears(now()) : null;
    }

}
