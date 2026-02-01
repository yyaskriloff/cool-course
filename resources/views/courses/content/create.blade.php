<x-layout>
    <x-slot:title>
        Create Content
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <h1 class="text-3xl font-bold">Create Content for {{ $course->title }}</h1>
                <x-forms.content :course="$course" />

            </div>
        </div>
    </div>
</x-layout>
