@props(['course'])

<div class="card bg-base-100 shadow">
    <div class="card-body flex flex-row">
        <div class="flex-1">
            <h2 class="card-title">{{ $course->title }}</h2>
            <p class="text-base-content/60">{{ $course->description }}</p>
        </div>
        <a href="/courses/{{ $course->id }}" class="btn btn-primary btn-sm">View</a>
    </div>
</div>
