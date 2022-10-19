<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Tag;
use App\Http\Requests\TodoRequest;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $todos = Todo::all();
        $tags = Tag::all();
        $param = [
            'user' => $user,
            'todos' => $todos,
            'tags' => $tags
        ];
        return view('index', $param);
    }
    public function create(TodoRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Todo::create($form + ['user_id' => Auth::id()], ['tag_id' => Tag::all()]);
        return redirect('/');
    }
    public function update(TodoRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Todo::find($request->id)->update($form);
        return back();
    }
    public function delete(Request $request)
    {
        Todo::find($request->id)->delete();
        return back();
    }
    public function find(Request $request)
    {
        $user = Auth::user();
        $tag = new tag;
        $taglist = $tag->getLists();
        $searchWord = $request->input('searchWord');
        $tagId = $request->input('tagId');
        $param = [
            'user' => $user,
            'taglist' => $taglist,
            'searchWord' => $searchWord,
            'tagId' => $tagId
        ];
        return view('find', $param);
    }
    public function search(Request $request)
    {
        $user = Auth::user();
        $tags = Tag::all();
        $searchWord = $request->input('searchWord');
        $tagId = $request->input('tagId');
        $query = Todo::query();
        if (isset($searchWord)) {
            $query->where('task', 'like', '%' . self::escapeLike($searchWord) . '%');
        }
        if (isset($tagId)) {
            $query->where('tag_id', $tagId);
        }
        $todos = $query->orderBy('tag_id', 'asc')->paginate(15);
        $tag = new Tag;
        $taglist = $tag->getLists();
        $param = [
            'user' => $user,
            'tags' => $tags,
            'todos' => $todos,
            'searchWord' => $searchWord,
            'tagId' => $tagId,
            'taglist' => $taglist
        ];
        return view('find', $param);
    }
    public static function escapeLike($str)
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }
}