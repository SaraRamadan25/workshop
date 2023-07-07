<form method="post" action="{{ route('articles.store') }}" enctype="multipart/form-data">
    @csrf
    title <input type="name" name="title">
    <br> <br>

    description <input type="name" name="description">
    <br> <br>

    select category of your article <select name="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{$category->name}}</option>
        @endforeach
    </select>
<br>
    <br>
    Upload Article Photo here<input type="file" name="image">
<button type="submit"> Submit
</button>
</form>
