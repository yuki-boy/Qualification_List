@extends('layouts.layout')
@section('content')

<div class="title_wrapper">
  <h1>{{ Auth::user()->name }}の資格リスト</h1>
  <div id="open"><button type="button" class="btn btn-primary">追加</button></div>
</div>

<main>
  <div class="contents_wrapper">
  <table>
    <thead>
      <tr>
        <td>資格名</td>
        <td>取得した年月</td>
        <td>操作</td>
      </tr>
    </thead>

    <tbody>
      @foreach ($qualis as $quali)
        <tr>
          <td>{{ $quali->name }}</td>
          <td>{{ $quali->get_date }}</td>
          <td><a href="{{ route('delete.qualification', ['id' => $quali->id]) }}">削除</a></td>
        </tr>
      @endforeach
    </tbody>
  </table>
  </div>
</main>



<section id="modal" class="hidden">
<form method="post" action="{{ route('save.qualification') }}">
@csrf
  <input type="text" name="name" placeholder="資格名を入力して下さい"><br>

  <!-- 資格取得の年月を入力 -->
  <input type="month" name="get_date" placeholder="取得した年月">

  <input type="submit" name="create" value="追加">
</form>
<div id="close"><button type="button" class="btn btn-primary">閉じる</button></div>
</section>

<div id="covor" class="hidden"></div>
@endsection