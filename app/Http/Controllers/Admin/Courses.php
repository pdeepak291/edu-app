<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\CoursesDataTable;
use App\Http\Requests\CourseSaveRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Models\Course;
use App\Models\University;
use Illuminate\Http\Request;

class Courses extends Controller
{
    public function index(CoursesDataTable $dataTable)
    {
        return $dataTable->render('admin.course.report');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {
            $universities = University::orderBy('university_name')->get();
            return view('admin.course.add',compact('universities'));
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to create University.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseSaveRequest $request)
    {
        try {
            $course = Course::create([
                'university_id' => $request->university,
                'course_code' => $request->course_code,
                'course_name' => $request->course_name
            ]);

            if($course){
                return redirect()->route('course.add')->with('success', 'Course created successfully.');
            }else{
                return redirect()->back()->withInput()->with('error', 'Failed to create Course.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to create Course.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($cid)
    {
        $course = Course::find(decrypt($cid));
        return view('admin.course.view',compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($cid)
    {
        $course = Course::find(decrypt($cid));
        $universities = University::orderBy('university_name')->get();

        return view('admin.course.edit',compact('course','universities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseUpdateRequest $request)
    {
        try {
            $course = Course::find(decrypt($request->course_id));
            if($course && $course->update(['university_id' => $request->university,'course_code' => $request->course_code,'course_name' => $request->course_name])){
                return redirect()->route('courses')->with('success', 'Course updated successfully.');
            }else{
                return redirect()->back()->withInput()->with('error', 'Failed to updated Course.');
            }

        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to updated Course.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($cid)
    {
        try {
            $course = Course::findOrFail(decrypt($cid));
            if($course){
                $course->delete();
                return redirect()->route('courses')->with('success', 'Course deleted successfully.');
            }else{
                return redirect()->back()->withInput()->with('error', 'Failed to delete Course.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to retrieve Course.');
        }
    }
}
