@extends('layouts.default')
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
  <div class="todo">
    <form action="{{ route('todo.search') }}" method="get" class="flex between mb-30">
      @csrf
      <input type="text" name="searchWord" value="{{ $searchWord }}" class="input-add">
      <select name="tagId" class="select-tag" value="{{ $tagId }}">
        <option disabled selected value></option>
        @foreach($taglist as $id => $title)
        <option value="{{ $id }}">
          {{ $title }}
        </option>
        @endforeach
      </select>
      <input class="btn btn-add" type="submit" value="検索">
    </form>
    @if (!empty($todos))
    <table>
      <tr>
        <th>作成日</th>
        <th>タスク名</th>
        <th>タグ</th>
        <th>更新</th>
        <th>削除</th>
      </tr>

      @foreach ($todos as $todo)
      <tr>
        <td>
          {{ $todo->created_at }}
        </td>
        <form action="{{ route('todo.update', ['id' => $todo->id]) }}" method="post" class="flex between mb-30">
          @csrf
          <td>
            <input type="text" class="input-update" value="{{$todo->task}}" name="task" />
          </td>
          <td>
            <select name="tag_id" class="select-tag">
              @foreach ($tags as $tag)
              @if($tag->id === $todo->tag_id)
              <option value="{{ $tag->id }}" selected>{{ $tag->title }}</option>
              @else
              <option value="{{ $tag->id }}">{{ $tag->title }}</option>
              @endif
              @endforeach
            </select>
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
      @endforeach
    </table>
    <div class="d-flex justify-content-center">
      {{ $todos->appends(request()->input())->links() }}
    </div>
    @endif
  </div>
  <a href="/" class="btn btn-back">戻る</a>
</div>
@endsection