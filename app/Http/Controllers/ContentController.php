<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Course;
use App\Models\Content;

class ContentController extends Controller
{


   
    public function create( Request $request, Course $course)
    {
        return view('courses.content.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,  Course $course)
    {
        Log::info('Hit ContentController@store route');

        Log::info('Request: ' . json_encode($request->all()));
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'file' => 'required|file|mimetypes:video/mp4,video/quicktime,video/x-matroska,video/webm',
            'published' => 'sometimes|accepted',
        ]);

        $validated['published'] = $request->boolean('published');


        Log::info('Passed validation');

        $file = $request->file('file');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->storeAs('uploads', $filename, 'public');
        Log::info('File stored');
        // Set the file path and handle published checkbox
        $validated['file'] = 'uploads/' . $filename;
        $validated['published'] = $request->has('published') ? true : false;

        Log::info('Content created');

        $course->contents()->create($validated);
        Log::info('Redirecting to course show');
        return redirect()->route('courses.show',[ $course->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course,  $content)
    {
        $content = $course->contents()->findOrFail($content);


        return view('courses.content.show', compact('course', 'content'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course,  $content)
    {
        $content = $course->contents()->findOrFail($content);


        return view('courses.content.edit', compact('course', 'content'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course, $content)
    {
        $content = $course->contents()->findOrFail($content);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'published' => 'sometimes|accepted',
        ]);

        $validated['published'] = $request->boolean('published');

        $content->update($validated);

        return redirect()->route('courses.show',[ $course->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course, $content)
    {

        $content = $course->contents()->findOrFail($content);
        $content->delete();
        return redirect()->route('courses.show',[ $course->id]);
    }
}
