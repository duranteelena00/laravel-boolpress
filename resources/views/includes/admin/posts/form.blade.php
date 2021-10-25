@if ($post->exists)
<form method="POST" action="{{ route('admin.posts.update', $post->id) }}">
    @method('PATCH')
@else
    <form method="POST" action="{{ route('admin.posts.store') }}">
@endif
    @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}">
    </div>
    <div class="form-group">
      <label for="content">Content</label>
      <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5">{{ old('content', $post->content) }}</textarea>
    </div>
    <div class="form-group">
        <label for="image">Image url</label>
        <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image', $post->image) }}">
      </div>
    <button type="submit" class="btn btn-success">Save</button>
  </form>