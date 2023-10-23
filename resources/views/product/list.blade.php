@if (\Session::has('message'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('message') !!}</li>
        </ul>
    </div>
@endif


<h1>Product List </h1>
<?php

foreach ($data as $item) {
    echo "ID: " . $item->id;
    echo "<br />";
    echo "Title: " . $item->title;
    echo " <a href='/product/edit/" . $item->id . "'>Edit</a> | ";
    ?>


<form method="post" action="{{ route('product.delete', ['id' => $item->id]) }}">
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
<h1>Create new Product </h1>
<form action="{{ route('product.create') }}" method="post">
    @method('post')
    @csrf
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" placeholder="title">
        @if($errors->has('title'))
            <div style="color: red">{{ $errors->first('title') }}</div>
        @endif
    </div>
    <div>
        <label for="description">Description</label>
        <textarea id="description" name="description" rows="4" cols="50">{{ old('description') }}</textarea>
        @if($errors->has('title'))
            <div style="color: red">{{ $errors->first('description') }}</div>
        @endif
    </div>

    <div>
        <label for="price">Price</label>
        <input type="text" name="price" id="price" value="{{ old('price') }}" placeholder="Price">
        @if($errors->has('price'))
            <div style="color: red">{{ $errors->first('price') }}</div>
        @endif
    </div>
    <div>
        <label for="category_id">Category</label>
        {!! Form::select('category_id', $categoryList) !!}

        @if($errors->has('category_id'))
            <div style="color: red">{{ $errors->first('category_id') }}</div>
        @endif
    </div>
    <div>
        <br />
        <button type="submit">Add Product</button>
    </div>
</form>
