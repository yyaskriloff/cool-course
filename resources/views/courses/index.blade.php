<x-layout>
    <x-slot:title>
        My Courses
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <div>
                    <h1 class="text-3xl font-bold">My Courses</h1>
                    <p class="mt-4 text-base-content/60">Here are the courses you have created</p>
                    <div class="mt-8">
                        @forelse ($courses as $course)
                            <x-course :course="$course" />
                        @empty
                            <div class="card bg-base-100 shadow mt-8">
                                <div class="card-body flex flex-col items-center justify-center">
                                    <p class="text-base-content/60">No courses found</p>
                                    <a href="/courses/create" class="btn btn-primary">Create Course</a>
                                </div>
                            </div>
                        @endforelse

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
