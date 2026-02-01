@props(['course', 'content'])

<form method="POST" action="/courses/{{ $course->id }}/content{{ isset($content) ? '/' . $content->id : '' }}"
    @if (!isset($content)) enctype="multipart/form-data" @endif class="flex flex-col gap-4">
    @csrf
    @if (isset($content))
        @method('PATCH')
    @endif
    <div class="form-control w-full">
        <input type="text" name="title" placeholder="Title" class="input input-bordered w-full" required
            value="{{ $content->title ?? '' }}">
    </div>
    <div class="form-control w-full">
        <textarea name="description" placeholder="Description" class="textarea textarea-bordered w-full resize-none"
            rows="4" maxlength="255" required> {{ $content->description ?? '' }}</textarea>
    </div>
    @if (!isset($content))
        <div class="form-control w-full">
            <input type="file" name="file" placeholder="File" class="input input-bordered w-full" required
                value="{{ $content->file ?? '' }}">
        </div>
    @endif
    <div class="form-control w-full">
        <label for="published">Publish</label>
        <input type="checkbox" name="published" placeholder="Published" class="checkbox checkbox-bordered"
            @if (isset($content) && $content->published) checked @endif>
    </div>
    <div class="form-control w-full">
        <button type="submit" class="btn btn-primary btn-sm">
            {{ isset($content) ? 'Update Content' : 'Create Content' }}</button>
    </div>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const publishedCheckbox = document.querySelector('input[name="published"]');
        publishedCheckbox.addEventListener('change', function(e) {
            console.log(e.target.value);
        })

    });
</script>
