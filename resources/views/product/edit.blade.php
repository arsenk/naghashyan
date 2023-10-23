

<form action="{{ "/product/update/$data->id" }}" method="post">
    @method('patch')
    @csrf
    <div>
        <label for="title">Title</label>
        <input type="text" name="title" id="title" value="{{ $data->title }}" placeholder="title">
        @if($errors->has('title'))
            <div style="color: red">{{ $errors->first('title') }}</div>
        @endif
    </div>
    <div>
        <label for="description">Description</label>
        <textarea id="description" name="description" rows="4" cols="50">{{ $data->description }}</textarea>
        @if($errors->has('title'))
            <div style="color: red">{{ $errors->first('description') }}</div>
        @endif
    </div>

    <div>
        <label for="price">Price</label>
        <input type="text" name="price" id="price" value="{{ $data->price }}" placeholder="Price">
        @if($errors->has('price'))
            <div style="color: red">{{ $errors->first('price') }}</div>
        @endif
    </div>
    <div>
        <label for="category_id">Category</label>
        {!! Form::select('category_id', $categoryList, $data->category_id) !!}

        @if($errors->has('category_id'))
            <div style="color: red">{{ $errors->first('category_id') }}</div>
        @endif
    </div>

    <div>
        <button type="submit">Edit Product</button>
    </div>
</form>
