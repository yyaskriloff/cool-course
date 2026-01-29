<x-layout>
    <x-slot:title>
        Edit {{ $course->title }}
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <h1 class="text-3xl font-bold">Editing {{ $course->title }}</h1>
                <x-forms.course :course="$course" />
            </div>
        </div>
    </div>
</x-layout>
