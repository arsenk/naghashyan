@if (\Session::has('message'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('message') !!}</li>
        </ul>
    </div>
@endif


<h1>Categories List </h1>
<?php

foreach ($data as $item) {
    echo "ID: " . $item->id;
    echo "<br />";
    echo "Name: " . $item->name;
    echo " <a href='/category/edit/" . $item->id . "'>Edit</a> | ";
    ?>


<form method="post" action="{{ route('category.delete', ['id' => $item->id]) }}">
    @method('DELETE')
    @csrf
    <button type="submit">delete</button>
</form>
<?php

    echo "<br />";
    echo "<hr />";
    echo "<br />";
}
?>
<h1>Create new category </h1>
<form action="{{ route('category.create') }}" method="post">
    @method('post')
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" placeholder="Name">
        @if($errors->has('name'))
            <div style="color: red">{{ $errors->first('name') }}</div>
        @endif
    </div>
    <div>
        <br />
        <button type="submit">Add Category</button>
    </div>
</form>
