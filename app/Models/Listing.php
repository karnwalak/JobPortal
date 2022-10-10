<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'title',
        'logo', 
        'tags', 
        'company', 
        'location', 
        'email', 
        'website', 
        'description'
];
    public function scopeFilter($query , array $filter){
      if($filter['tag'] ?? false){
        $query->where('tags','LIKE','%'.request('tag').'%')->get();
      }
      if($filter['search'] ?? false){
        $query->where('title','LIKE','%'.request('search').'%')
                       ->orWhere('tags','LIKE','%'.request('search').'%')
                       ->orWhere('description','LIKE','%'.request('search').'%')
                       ->orWhere('location','LIKE','%'.request('search').'%')
                       ->get();
      }
    }
}