
<div class="mb-3">
  <label for="description" class="form-label">Post content:</label>
  <input type="text" class="form-control" id="description" name="description" required value="{{ old('description', $post->description) }}">
</div>
<div class="mb-3">
  @forelse ($tags as $tag)
    <div class="form-check form-switch">
        <input type="checkbox" class="form-check-input" name="tags[]"
        id="input-tags" value="{{ $tag->id }}" {{ $post->tags->contains($tag) ? 'checked' : '' }}>
        <label for="input-tags" class="form-check-label">{{ $tag->name }}</label>
    </div>
  @empty
    
  @endforelse

</div>
<div class="mb-3">
  <label class="form-label" for="img_post">Link image for post:</label>
  <input type="file" class="form-control" id="img_post" name="img_post" required value="{{ old('img_post', $post->img_post) }}">
</div>
<div class="mb-3">
    <label class="form-label" for="post_date">Date post:</label>
    <input type="text" class="form-control" id="post_date" name="post_date" required value="{{ date("Y-m-d H:i:s") }}" readonly>
</div>