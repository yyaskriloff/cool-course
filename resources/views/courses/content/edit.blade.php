<x-layout>
    <x-slot:title>
        Edit {{ $content->title }}
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <h1 class="text-3xl font-bold">Editing {{ $content->title }}</h1>
                <p class="text-base-content/60">The video can't be changed.</p>
                <x-forms.content :course="$course" :content="$content" />
            </div>
        </div>
    </div>
</x-layout>
