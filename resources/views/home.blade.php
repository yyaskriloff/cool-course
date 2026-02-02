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

                    <div class="mt-8 flex flex-col gap-4">
                        @forelse ($courses as $course)
                            <x-course :course="$course" />
                        @empty
                            <p class="text-base-content/60">No courses found</p>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
