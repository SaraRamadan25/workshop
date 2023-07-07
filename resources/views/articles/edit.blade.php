<form action="{{ route('articles.update', $article->id) }}" method="post" enctype="multipart/form-data">
    @method('PATCH')
    @csrf

    <br>
    Title: <input name="title" type="text" value="{{ $article->title }}">
    <br>
    <br>
    Description: <input name="description" type="text" value="{{ $article->description }}">
    <br>
    Select the category of your article post:
    <select name="category_id">
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    <br>
    Upload the blog image: <input type="file" name="image">
    <br>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

{{-- Delete Button --}}
<form action="{{ route('articles.destroy', $article->id) }}" method="post">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this blog?')">Delete</button>
</form>
