<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class MenuCategories extends Model{
   	protected $table = 'menu_categories';
    protected $fillable = [
        'id', 'name', 'parent','link', 'sort',
    ];
    public $timestamps = false;
}
