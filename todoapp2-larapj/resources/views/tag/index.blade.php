@extends('layouts.default')
@section('title', 'tag.index.blade.php')

@section('content')
<div class="card">
  <div class="card__header">
    <table>
      <tr>
        <th>tags</th>
      </tr>
      @foreach ($tags as $tag)
      <tr>
        <td>
          {{$tag->id}}:{{$tag->title}}
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</div>
@endsection