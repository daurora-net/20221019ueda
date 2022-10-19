<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Teaaching Materials</title>
  <link rel="stylesheet" href="{{ url('css/style.css') }}">
</head>

<body>

  //* 検索機能ここから *//
  <div class="search">
    <form action="{{ route('index') }}" method="GET">
      @csrf

      <div class="form-group">
        <div>
          <label for="">キーワード
            <div>
              <input type="text" name="keyword" value="{{ $keyword }}">
            </div>
          </label>
        </div>

        <div>
          <label for="">媒体
            <div>
              <select name="medium" data-toggle="select">
                <option value="">全て</option>
                @foreach ($media_list as $media_item)
                <option value="{{ $media_item->getMedium() }}" @if($medium=='{{ $media_item->getMedium() }}' ) selected
                  @endif>{{ $media_item->getMedium() }}</option>
                @endforeach
              </select>
            </div>
          </label>
        </div>

        <div>
          <label for="">カテゴリー
            <div>
              <select name="category" data-toggle="select">
                <option value="">全て</option>
                @foreach ($categories_list as $categories_item)
                <option value="{{ $categories_item->getCategory() }}"
                  @if($category=='{{ $categories_item->getCategory() }}' ) selected @endif>
                  {{ $categories_item->getCategory() }}
                </option>
                @endforeach
              </select>
            </div>
          </label>
        </div>

        <div>
          <input type="submit" class="btn" value="検索">
        </div>
      </div>
    </form>
  </div>
  //* 検索機能ここまで *//

  <table>
    <tr>
      <th>教材名</th>
      <th>媒体</th>
      <th>コンテンツ</th>
    </tr>

    @foreach ($items as $item)
    <tr>
      <td>{{ $item->name }}</td>
      <td>{{ $item->medium }}</td>
      <td>{{ $item->category }}</td>
      //mediaテーブルとcategoriesテーブルを結合しているので、この記述でアクセスできる
    </tr>
    @endforeach
  </table>

</body>

</html>