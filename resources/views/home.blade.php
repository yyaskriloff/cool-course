<x-layout>
    <x-slot:title>
        Home
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <div>
                    <h1 class="text-3xl font-bold">Welcome to Cool Courses!</h1>
                    <p class="mt-4 text-base-content/60">This is your brand new Cool Courses application</p>

                    <div class="mt-8">
                        @forelse ($courses as $course)
                            <div class="card bg-base-100 shadow">
                                    <div class="card-body">
                                        <h2 class="card-title">{{ $course->title }}</h2>
                                        <p class="text-base-content/60">{{ $course->description }}</p>
                                    </div>
                            </div>
                        @empty
                            <p class="text-base-content/60">No courses found</p>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
