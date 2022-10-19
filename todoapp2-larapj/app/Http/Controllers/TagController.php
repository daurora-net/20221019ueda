<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index(Request $request)
    {
        $tags = Tag::all();
        return view('tag.index', ['tags' => $tags]);
    }
    public function add(Request $request)
    {
        return view('tag.add');
    }
    public function create(Request $request)
    {
        $form = $request->all();
        Tag::create($form);
        return redirect('/tag');
    }
}