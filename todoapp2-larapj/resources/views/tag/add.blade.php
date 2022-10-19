@extends('layouts.default')
@section('title', 'tag.add.blade.php')

@section('content')
@if (count($errors) > 0)
<ul>
  @foreach ($errors->all() as $error)
  <li>
    {{$error}}
  </li>
  @endforeach
</ul>
@endif
<div class="card">
  <div class="card__header">
    <form action="/tag/add" method="post">
      <table>
        @csrf
        <tr>
          <th>todo_id:</th>
          <td><input type="number" name="tag_id"></td>
        </tr>
        <tr>
          <th>title:</th>
          <td><input type="text" name="title"></td>
        </tr>
      </table>
      <button class="btn btn-add">送信</button>
    </form>
  </div>
</div>
@endsection