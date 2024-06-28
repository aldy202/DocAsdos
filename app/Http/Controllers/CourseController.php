<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lecture;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CourseController extends Controller
{
    public function index()
    {
        // $lectures = Lecture::get();

        $search = request('search');
        if ($search) {
            $courses = Course::where(function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('semester',  'like', '%' . $search . '%');
            })
                ->orderBy('nama')
                ->where('id', '!=', '1')
                ->paginate(5);
                // ->withQueryString();
        } else {
            $courses = Course::where('id', '!=', '1')
                ->orderBy('nama')
                ->paginate(10);
        }


        // $courses = Course::with('lecture')
        //     ->orderBy('created_at', 'desc')
        //     ->get();

        return view('course.index', compact('courses'));
    }
    public function create()
    {
        $users = User::where('id', '!=', '1')->get();
        $lectures = Lecture::get();
        return view('course.create', compact('users', 'lectures'));
    }

    public function show(Course $course)
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
        ]);
        Course::create([
            'nama' => ucfirst($request->nama),
            'user_id' => $request->user_id,
            'semester' => ucfirst($request->semester),
            'lecture_id' => $request->lecture_id,
        ]);

        return redirect()->route('course.index')->with('success', 'Course Created succesfully!');
    }

    public function edit(Course $course)
    {
        $users = User::where('id', '!=', '1')->get();
        $lectures = Lecture::get();
        // $lectures = Lecture::where('user_id', auth()->user()->id->get());
        if ($course->id) {
            return view('course.edit', compact('course', 'users', 'lectures'));
            # code...
        } else {
            return redirect()->route('course.index')->with('danger', 'You are not authorized to edit this lecture!');
        }
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'semester' => 'required',
            // 'lecture_id' => [
            //     'nullable',
            //     Rule::exists('lecture','id')->where(function($query){
            //         $query->where('user_id', auth()->user()->id);
            //     })
            // ]
        ]);

        $course->update([
            'nama' => ucfirst($request->nama),
            'semester' => ucfirst($request->semester),
            // 'lecture_id' => $request->lecture_id
        ]);

        return redirect()->route('course.index')->with('success', 'Course updated successfully!');
    }

    public function destroy(Course $course)
    {
        if ($course->id) {
            $course->delete();
            return redirect()->route('course.index')->with('success', 'Course deleted succesfully!');
            # code...
        } else {
            return redirect()->route('course.index')->with('danger', 'You are not authorized to delete this course!');
        }
    }
}
