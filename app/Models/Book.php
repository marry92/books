<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {

    public static $validation_rules = [
        'name' => 'required|min:2',
        'release_date' => 'required|date',
        'author_id' => 'required|integer',
    ];
    protected $fillable = [
        'name',
        'release_date',
        'author_id',
    ];
    protected $dates = [
        'release_date',
    ];

    public function author() {
        return $this->belongsTo('App\Models\Author', 'author_id');
    }

}
