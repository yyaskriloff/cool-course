@props(['content'])


<div class="card-body w-full">
    <div class="flex flex-row">
        <div class="flex-1">
            <h2 class="text-2xl font-bold">{{ $content->title }}</h2>
            <p class="text-base-content/60">{{ $content->description }}</p>
        </div>
        <div class="flex flex-row gap-2">
            <form action="/courses/{{ $content->course->id }}/content/{{ $content->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-error btn-sm">Delete</button>
            </form>
            <a href="{{ $content->course->id }}/content/{{ $content->id }}/edit"
                class="btn btn-primary btn-sm">Edit</a>
            <a href="{{ $content->course->id }}/content/{{ $content->id }}" class="btn btn-primary btn-sm">Watch</a>
        </div>

    </div>
</div>
