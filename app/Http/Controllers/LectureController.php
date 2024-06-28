<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request('search');
        if ($search) {
            $lectures = Lecture::where(function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%')
                    ->orWhere('email',  'like', '%' . $search . '%');
            })
                ->orderBy('nama')
                ->where('id', '!=', '0')
                ->paginate(20)
                ->withQueryString();
        } else {
            $lectures = Lecture::where('id', '!=', '0')
                ->orderBy('nama')
                ->paginate(10);
        }
        return view('lecture.index', compact('lectures'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lecture.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|max:30',
        ]);

        Lecture::create([
            'nama' => ucfirst($request->nama),
            'email' => $request->email,
        ]);

        return redirect()->route('lecture.index')->with('success', 'Lecture created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lecture $lecture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lecture $lecture)
    {
        if ($lecture->id) {
            return view('lecture.edit', compact('lecture'));
        } else {
            return redirect()->route('lecture.index')->with('danger', 'You are not authorized to edit this lecture!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lecture $lecture)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|max:30',
        ]);

        $lecture->update([
            'nama' => ucfirst($request->nama),
            'email' => ucfirst($request->email),
        ]);

        return redirect()->route('lecture.index')->with('success', 'Lecture updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lecture $lecture)
    {
        if ($lecture->id) {
            $lecture->delete();
            return redirect()->route('lecture.index')->with('success', 'Lecture deleted succesfully!');
        } else {
            return redirect()->route('lecture.index')->with('danger', 'You are not authorized to delete this Lecture!');
        }
    }
}
