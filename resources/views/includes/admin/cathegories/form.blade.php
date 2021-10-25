@if ($cathegory->exists)
    <form method="POST" action="{{ route('admin.cathegories.update', $cathegory->id) }}">
        @method('PATCH')
    @else
        <form method="POST" action="{{ route('admin.cathegories.store') }}">
@endif
@csrf
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
        value="{{ old('name', $cathegory->name) }}">
</div>
<div class="form-group">
    <label for="color">Color</label>
    <select class="form-control" id="color" name="color">
        <option>No color selected</option>
        <option @if (old('color', $cathegory->color) == $cathegory->color) selected @endif  value="danger">Red</option>
        <option @if (old('color', $cathegory->color) == $cathegory->color) selected @endif  value="primary">Blue</option>
        <option @if (old('color', $cathegory->color) == $cathegory->color) selected @endif  value="success">Green</option>
        <option @if (old('color', $cathegory->color) == $cathegory->color) selected @endif  value="warning">Yellow</option>
        <option @if (old('color', $cathegory->color) == $cathegory->color) selected @endif  value="secondary">Gray</option>
    </select>
</div>
<button type="submit" class="justify-content-flex-end btn btn-success">Save</button>
</form>
