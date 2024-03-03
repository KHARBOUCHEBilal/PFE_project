<?php

namespace App\Http\Controllers\Chef;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModuleRequest;
use App\Imports\ImportModulesNotes;
use App\Imports\ImportStudents;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class StudentsController extends Controller
{

    public function delete_all()
    {
        try {
            User::where('user_type', 'student')->delete();
            return redirect()->route('students.index')->with(['success' => __('pages/admin/messages.deleted')]);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => __('pages/admin/messages.error')]);
        }
    }

    public function importView()
    {
        return view('pages.chef.pages.students.import-file');
    }

    public function import(Request $request)
    {
        try {
            Excel::import(
                new ImportStudents,
                $request->file('file')->store('files')
            );
            Excel::import(
                new ImportModulesNotes,
                $request->file('file')->store('files')
            );
            return redirect()->route('students.index')->with(['success' => __('pages/admin/messages.imported')]);
        } catch (\Exception $ex) {
            return $ex;
            return redirect()->back()->with(['error' => __('pages/admin/messages.error')]);
        }
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::orderBy('id', 'DESC')->where('user_type', 'student')->get();
        return view('pages.chef.pages.students.index', compact('students'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.chef.pages.students.create');
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
            $student = new User();
            $student->nom = $request->nom;
            $student->prenom = $request->prenom;
            $student->CNE = $request->CNE;
            $student->CNI = $request->CNI;
            $student->email = $request->email;
            $student->user_type = "student";
            $student->password = Hash::make($request->CNE);
            $student->save();
            return redirect()->route('students.index')->with(['success' => __('pages/admin/messages.saved')]);
        } catch (\Exception $ex) {
            return redirect()->route('students.index')->with(['error' => __('pages/admin/messages.error')]);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Post $student
     * @return \Illuminate\Http\Response
     */
    // public function show(Post $student)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post $student
     * @return \Illuminate\Http\Response
     */
    public function edit(User $student)
    {
        try {
            if ($student)
                return view('pages.chef.pages.students.edit', compact('student'));
        } catch (\Exception $ex) {
            return redirect()->route('students.index')->with(['error' => __('pages/admin/messages.error')]);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Post $student
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, User $student)
    {
        try {
            $student->nom = $request->nom;
            $student->prenom = $request->prenom;
            $student->CNE = $request->CNE;
            $student->CNI = $request->CNI;
            $student->email = $request->email;
            $student->user_type = "student";
            $student->password = Hash::make($request->CNE);
            $student->update();
            return redirect()->route('students.index')->with(['success' => __('pages/admin/messages.updated')]);
        } catch (\Exception $ex) {
            return redirect()->route('students.index')->with(['error' => __('pages/admin/messages.error')]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $student)
    {
        try {
            // if ($student) {
            //     if (file_exists($student->thumbnail())) unlink($student->thumbnail);
            //     $student->delete();
            if ($student) {
                $student->delete();

                return redirect()->route('students.index')->with(['success' => __('pages/admin/messages.deleted')]);
            }
        } catch (\Exception $ex) {
            return redirect()->route('students.index')->with(['error' => __('pages/admin/messages.error')]);
        }
    }
}
