@extends('layouts.layout')
@section('content')

<div class="edit-quali">
  <form method="post" action="{{ route('edit.qualification', ['id' => $quali->id]) }}">
  @csrf
    <input class="edit_fill" type="text" name="name" value="{{ old('name', $quali->name) }}"><br>

    取得月<input type="month" name="get_date" value="{{ old('get_date', $quali->get_date) }}"><br>

    失効月<input type="month" name="lost_date" value="{{ old('lost_date', $quali->lost_date) }}"><br>

    <input type="submit" name="create" value="編集">
  </form>
</div>

@endsection