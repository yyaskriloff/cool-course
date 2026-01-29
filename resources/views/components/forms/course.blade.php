<div class="card bg-base-100 shadow mt-8">
    <div class="card-body">
        <form method="POST" action="/courses">
            @csrf
            <div class="form-control w-full">
                <input type="text" name="title" placeholder="Title" class="input input-bordered w-full" required>
            </div>

            <div class="form-control w-full my-4">
                <textarea name="description" placeholder="Description" class="textarea textarea-bordered w-full resize-none"
                    rows="4" maxlength="255" required></textarea>
            </div>



            <div class="flex items-center justify-end">
                <button type="submit" class="btn btn-primary btn-sm">
                    Create Course
                </button>
            </div>
        </form>
    </div>
</div>
