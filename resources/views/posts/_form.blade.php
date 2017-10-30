@if($post->exists)

    <form action="{{ route('update_post_path', ['post' => $post->id]) }}" method="POST">

    {{ method_field('PUT') }}

@else

    <form action="{{ route('store_post_path') }}" method="POST">

@endif

{{ csrf_field() }}

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" value="{{ $post->title or old('title') }}">
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" class="form-control" rows="5">{{ $post->description or old('description') }}</textarea>
    </div>

    <div class="form-group">
        <label for="url">URL</label>
        <input type="text" name="url" class="form-control" value="{{ $post->url or old('url') }}">
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save Post</button>
    </div>

</form>