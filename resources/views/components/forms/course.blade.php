@props(['course'])

<div class="card bg-base-100 shadow mt-8">
    <div class="card-body">
        <form method="POST" action="{{ isset($course) ? '/courses/' . $course->id : '/courses' }}">
            @csrf
            @if (isset($course))
                @method('PATCH')
            @endif
            <div class="form-control w-full">
                <input type="text" name="title" placeholder="Title" class="input input-bordered w-full" required
                    value="{{ $course->title ?? '' }}">
            </div>

            <div class="form-control w-full my-4">
                <textarea name="description" placeholder="Description" class="textarea textarea-bordered w-full resize-none"
                    rows="4" maxlength="255" required> {{ $course->description ?? '' }}</textarea>
            </div>



            <div class="flex items-center justify-end gap-2">
                @if (isset($course))
                    <button type="button" class="btn btn-outline btn-sm">
                        cancel
                    </button>
                @endif
                <button type="submit" class="btn btn-primary btn-sm">
                    {{ isset($course) ? 'Update Course' : 'Create Course' }}
                </button>
            </div>
        </form>
    </div>
</div>
