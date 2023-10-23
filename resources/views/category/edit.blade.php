

<form action="{{ "/category/update/$data->id" }}" method="post">
    @method('patch')
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="{{ $data->name }}" placeholder="Name">
        @if($errors->has('name'))
            <div style="color: red">{{ $errors->first('name') }}</div>
        @endif
    </div>
    <div>
        <button type="submit">Edit Category</button>
    </div>
</form>
