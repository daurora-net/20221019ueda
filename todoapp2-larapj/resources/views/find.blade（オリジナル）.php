@extends('layouts.default')
@section('title', 'find.blade.php')
@section('content')
<div class="card">
  <div class="card__header">
    <p class="title mb-15">タスク検索</p>
    @if (Auth::check())
    <div class="auth mb-15">
      <p class="detail">「{{$user->name}}」でログイン中</p>
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="btn btn btn-logout">ログアウト</button>
      </form>
      @else
      <p>ログインしてください。（<a href="/login">ログイン</a>｜
        <a href="/register">登録</a>）
      </p>
      @endif
    </div>
  </div>
  <form action="{{ route('todo.find') }}" method="POST">
    @csrf
    <input type="text" name="input" value="{{$input}}" class="input-add">
    <select name="tag_id" class="select-tag">
      @foreach($tags as $tag)
      <option value="{{ $tag->id }}">{{ $tag->title }}</option>
      @endforeach
    </select>
    <input type="submit" value="見つける">
  </form>
  @if (@isset($todos))
  <div class="todo">
    <table>
      <tr>
        <th>作成日</th>
        <th>タスク名</th>
        <th>タグ</th>
        <th>更新</th>
        <th>削除</th>
      </tr>

      <tr>
        <td>
          {{ $todo->created_at }}
        </td>
        <form action="{{ route('todo.update', ['id' => $tag->id]) }}" method="post" class="flex between mb-30">
          @csrf
          <td>
            <input type="text" class="input-update" value="{{$todo->task}}" name="task" />
          </td>
          <td>
            @if ($todo->tag != null)
            <select name="id" class="select-tag">
              @foreach($tags as $tag)
              <option value="{{ $tag->id }}">{{ $todo->tag->title }}</option>
              @endforeach
            </select>
            @endif
          </td>
          <td>
            <button class="btn btn-update">更新</button>
          </td>
        </form>
        <td>
          <form action="{{ route('todo.delete', ['id' => $todo->id]) }}" method="post">
            @csrf
            <button class="btn btn-delete">削除</button>
          </form>
        </td>
      </tr>
    </table>
  </div>
</div>
@endif
@endsection