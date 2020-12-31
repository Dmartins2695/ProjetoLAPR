<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index()
    {
        $tags=Tag::all();
       return view('dashboard.products.tags.createTag',['tags'=> $tags]);
    }

    public function store(Request $request)
    {
       $request->validate([
           'name' => 'required|alpha'
       ]);
       $tag=Tag::create([
           'name' => $request['name']
       ]);
       $tag->save();
       return back()->with('message','Tag "'.$tag->name.'" created with success!');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'tag' => 'required|alpha'
        ]);
        $tagcol=Tag::where('name','=',$request['tag'])->get();
        $tag=$tagcol[0];
        $name=$tag['name'];
        $tag->delete();
        return back()->with('messageDanger','Tag "'.$name.'" was removed!');

    }
}
