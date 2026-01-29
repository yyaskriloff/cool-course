<x-layout>
    <x-slot:title>
        {{ $course->title }}
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body flex flex-row">
                <div class="flex-1">
                    <h1 class="text-3xl font-bold">{{ $course->title }}</h1>
                    <p class="text-base-content/60">{{ $course->description }}</p>
                </div>
                <button class="btn btn-primary btn-sm">

                    <a href="/courses/{{ $course->id }}/edit">Edit</a>
                    <form action="/courses/{{ $course->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-error btn-sm">Delete</button>
                    </form>
                </button>
            </div>
        </div>
    </div>
</x-layout>
