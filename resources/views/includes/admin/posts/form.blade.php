@if ($post->exists)
    <form method="POST" action="{{ route('admin.posts.update', $post->id) }}">
        @method('PATCH')
    @else
        <form method="POST" action="{{ route('admin.posts.store') }}">
@endif
@csrf
<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
        value="{{ old('title', $post->title) }}">
</div>
<div class="form-group">
    <label for="content">Content</label>
    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content"
        rows="5">{{ old('content', $post->content) }}</textarea>
</div>
<div class="form-group">
    <label for="image">Image url</label>
    <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image"
        value="{{ old('image', $post->image) }}">
</div>
<div class="form-group">
    <label for="cathegory_id">Cathegories</label>
    <select class="form-control" id="cathegory_id" name="cathegory_id">
        <option selected>No cathegory selected</option>
        @foreach ($cathegories as $cathegory)
            <option @if (old('cathegory_id', $post->cathegory_id) == $cathegory_id) selected @endif value="{{ $cathegory->id }}">{{ $cathegory->name }}</option>
        @endforeach
    </select>
</div>

<fieldset class="mb-3">
    <legend class="h6">Tags</legend>
    @foreach ($tags as $tag)
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="tag-{{ $tag->id }}" value="{{ $tag->id }}" name="tags[]" @if(in_array($tag->id, old('tags', $tagIds ?? []))) checked @endif>
        <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
    </div>
    @endforeach
</fieldset>

<button type="submit" class="justify-content-flex-end btn btn-success">Save</button>
</form>
