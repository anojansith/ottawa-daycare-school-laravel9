<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::latest()->paginate(2);
        return view('all_teachers.index', compact('teachers'))->with('i', (request()->input('page', 1) - 1) * 2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('all_teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
        'teacher_name' => 'required',
        'teacher_email'  =>  'required|email|unique:teachers',
        'teacher_image' =>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
       ]);

       $file_name = time() . '.' . request()->teacher_image->getClientOriginalExtension();

       request()->teacher_image->move(public_path('images'), $file_name);

       $teacher = new Teacher;
       $teacher->teacher_name = $request->teacher_name;
       $teacher->teacher_email = $request->teacher_email;
       $teacher->teacher_gender = $request->teacher_gender;
       $teacher->teacher_image = $file_name;

       $teacher->save();
       return redirect()->route('teachers.index')->with('success', 'Teacher added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return view('all_teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('all_teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'teacher_name'      =>  'required',
            'teacher_email'     =>  'required|email',
            'teacher_image'     =>  'image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);

        $teacher_image = $request->hidden_teacher_image;

        if($request->teacher_image != '')
        {
            $teacher_image = time() . '.' . request()->teacher_image->getClientOriginalExtension();

            request()->teacher_image->move(public_path('images'), $teacher_image);
        }

        $teacher = Teacher::find($request->hidden_id);

        $teacher->teacher_name = $request->teacher_name;

        $teacher->teacher_email = $request->teacher_email;

        $teacher->teacher_gender = $request->teacher_gender;

        $teacher->teacher_image = $teacher_image;

        $teacher->save();

        return redirect()->route('teachers.index')->with('success', 'Teacher Data has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('teachers.index')->with('success', 'Student Data deleted successfully');
    }
}
