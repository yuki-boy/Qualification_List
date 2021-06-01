<form method="post" action="{{ route('edit.qualification', ['id' => $quali->id]) }}">
@csrf
  <input type="text" name="name" value="{{ old('name', $quali->name) }}"><br>

  <input type="month" name="get_date" value="{{ old('get_date', $quali->get_date) }}">

  <input type="submit" name="create" value="編集">
</form>