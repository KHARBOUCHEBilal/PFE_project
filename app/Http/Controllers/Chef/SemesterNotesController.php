<?php

namespace App\Http\Controllers\Chef;

use App\Http\Controllers\Controller;
use App\Http\Requests\SemesterRequest;
use App\Imports\ImportSemestersNotes;
use App\Models\_Model;
use App\Models\ModulesNote;
use App\Models\SemesterNote;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class SemesterNotesController extends Controller
{

    public function importView()
    {
        return view('pages.chef.pages.semester_notes.import-file');
    }

    public function import(Request $request)
    {
        try {
            Excel::import(
                new ImportSemestersNotes,
                $request->file('file')->store('files')
            );
            $semester_notes = SemesterNote::orderBy('id', 'DESC')->get();
            return view('pages.chef.pages.semester_notes.index', compact('semester_notes'))->with(['success' => __('pages/admin/messages.imported')]);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => __('pages/admin/messages.error')]);
        }
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semester_notes = SemesterNote::orderBy('id', 'DESC')->get();
        return view('pages.chef.pages.semester_notes.index', compact('semester_notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = User::orderBy('id', 'DESC')->where('user_type', 'student')->get();
        return view('pages.chef.pages.semester_notes.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $semester_note = new SemesterNote();
            $semester_note->student_id = $request->student;
            $semester_note->S1 = $request->S1;
            $semester_note->S2 = $request->S2;
            $semester_note->S3 = $request->S3;
            $semester_note->S4 = $request->S4;
            $semester_note->S5 = $request->S5;
            $semester_note->S6 = $request->S6;
            $semester_note->save();

            return redirect()->route('semester_notes.index')->with(['success' => __('pages/admin/messages.saved')]);
        } catch (\Exception $ex) {
            return redirect()->route('semester_notes.index')->with(['error' => __('pages/admin/messages.error')]);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Post $semester_note
     * @return \Illuminate\Http\Response
     */
    // public function show(Post $semester_note)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post $semester_note
     * @return \Illuminate\Http\Response
     */
    public function edit(SemesterNote $semester_note)
    {
        try {
            $students = User::orderBy('id', 'DESC')->where('user_type', 'student')->get();
            if ($semester_note)
                return view('pages.chef.pages.semester_notes.edit', compact('students', 'semester_note'));
        } catch (\Exception $ex) {
            return redirect()->route('semester_notes.index')->with(['error' => __('pages/admin/messages.error')]);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Post $semester_note
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, SemesterNote $semester_note)
    {
        try {
            $semester_note->student_id = $request->student;
            $semester_note->S1 = $request->S1;
            $semester_note->S2 = $request->S2;
            $semester_note->S3 = $request->S3;
            $semester_note->S4 = $request->S4;
            $semester_note->S5 = $request->S5;
            $semester_note->S6 = $request->S6;
            $semester_note->update();
            return redirect()->route('semester_notes.index')->with(['success' => __('pages/admin/messages.updated')]);
        } catch (\Exception $ex) {
            return redirect()->route('semester_notes.index')->with(['error' => __('pages/admin/messages.error')]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post $semester_note
     * @return \Illuminate\Http\Response
     */
    public function destroy(SemesterNote $semester_note)
    {
        try {
            // if ($semester_note) {
            // if (file_exists($semester_note->thumbnail())) unlink($semester_note->thumbnail);
            // $semester_note->delete();
            if ($semester_note) {
                $semester_note = SemesterNote::find($semester_note->id);
                $semester_note->delete();

                return redirect()->route('semester_notes.index')->with(['success' => __('pages/admin/messages.deleted')]);
            } else {
                return "hello world";
            }
        } catch (\Exception $ex) {
            return redirect()->route('semester_notes.index')->with(['error' => __('pages/admin/messages.error')]);
        }
    }
}
