<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Content;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use AuthorizesRequests;

    public function index()
    {
        $courses = Auth::user()?->courses ?? collect();

        return Inertia::render('Courses/Index', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        $course = $user->courses()->create([...$validated,'status' => 'published', 'image' => '']);

        return redirect()->route('courses.show',[ $course->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $contents = Content::where('course_id', $course->id)->orderBy('created_at', 'desc')->get();

        $canUpdate = Auth::user()->can('update', $course);
        $canDelete = Auth::user()->can('delete', $course);

        return Inertia::render('Courses/Show', [
            'course' => $course, 
            'contents' => $contents,
            'can'=> [
                'update' => $canUpdate,
                'delete' => $canDelete,
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {

        $this->authorize('update', $course);
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $this->authorize('update', $course);
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string|max:255',
            ]);

            $course->update($validated);

        return redirect()->route('courses.show',[ $course->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $this->authorize('delete', $course);
        $course->delete();
        return redirect('/');
    }
}
