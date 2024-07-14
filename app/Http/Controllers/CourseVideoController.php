<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseVideo;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreCourseVideoRequest;

class CourseVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Add logic to list course videos if needed
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        return view('admin.course_videos.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseVideoRequest $request, Course $course)
    {
        DB::transaction(function () use ($request, $course){
            $validated = $request->validated();
            $validated['course_id'] = $course->id;
            $CourseVideo = CourseVideo::create($validated);
        });
        return redirect()->route('admin.courses.show', $course->id);
    }


    /**
     * Display the specified resource.
     */
    public function show(CourseVideo $courseVideo)
    {
        // Add logic to show a specific course video if needed
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseVideo $courseVideo)
    {
        return view('admin.course_videos.edit', compact('courseVideo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCourseVideoRequest $request, CourseVideo $courseVideo)
    {
        DB::transaction(function () use($request, $courseVideo){
            $validated = $request->validated();
            $courseVideo->update($validated);
        });
        return redirect()->route('admin.courses.show', $courseVideo->course_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseVideo $courseVideo)
    {
        DB::beginTransaction();

        try {
            $courseVideo->delete();
            DB::commit();
            return redirect()->route('admin.courses.show', $courseVideo->course_id)->with('success','Course deleted successfully');
        } catch (\Exception $e){
            DB::rollBack();
            return redirect()->route('admin.courses.show', $courseVideo->course_id)->with('error','Course deletion failed');
        }
    }
}
