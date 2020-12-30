<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','family','type','brand','price','description', 'image','color','stock'
    ];

    public function getPriceAttribute($value){
        return $value."€";
    }
    public function getImageAttribute($value){
        return asset('storage/'.$value);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public function assignTag($tag){
        if(is_string($tag)){
            $tag = Tag::whereName($tag)->firstOrFail();
        }
        $this->tags()->syncWithoutDetaching($tag);
    }

    public function deleteTag($tag){
        if(is_string($tag)){
            $tag = Tag::whereName($tag)->firstOrFail();
        }
        $this->tags()->detach($tag);
    }

    public function hasTag($tagName){
        $tags=$this->tags;
        foreach ($tags as $tag) {
            if (strcmp($tag->name, $tagName)==0){
                return true;
            }
        }
        return false;
    }
}
