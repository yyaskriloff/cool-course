<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Content;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $courses = Course::get();


        return view('home', ['courses' => $courses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {


      
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $user = User::findOrFail(1);

        $course = $user->courses()->create([...$validated,'status' => 'published', 'image' => '']);

        return redirect()->route('courses.show',[ $course->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        $contents = Content::where('course_id', $course->id)->orderBy('created_at', 'desc')->get();

        var_dump($contents[0]->published);
        return view('courses.show', compact('course', 'contents'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
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
        $course->delete();
        return redirect('/');
    }
}
