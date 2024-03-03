<?php

namespace App\Http\Controllers\Chef;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModuleRequest;
use App\Imports\ImportTeachers;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class TeachersController extends Controller
{
    public function importView()
    {
        return view('pages.chef.pages.teachers.import-file');
    }


    public function delete_all()
    {
        try {
            User::where('user_type', 'teacher')->delete();
            return redirect()->route('teachers.index')->with(['success' => __('pages/admin/messages.deleted')]);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => __('pages/admin/messages.error')]);
        }
    }
    public function import(Request $request)
    {
        try {
            Excel::import(
                new ImportTeachers,
                $request->file('file')
            );
            return redirect()->route('teachers.index')->with(['success' => __('pages/admin/messages.imported')]);
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
        $teachers = User::orderBy('id', 'DESC')->where('user_type', 'teacher')->get();
        return view('pages.chef.pages.teachers.index', compact('teachers'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.chef.pages.teachers.create');
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
            $password = $request->password ? Hash::make($request->password) : Hash::make($request->mobile);
            $teacher = new User();
            $teacher->nom = $request->nom;
            $teacher->prenom = $request->prenom;
            $teacher->mobile = $request->mobile;
            $teacher->email = $request->email;
            $teacher->user_type = "teacher";
            $teacher->password = $password;
            $teacher->save();
            return redirect()->route('teachers.index')->with(['success' => __('pages/admin/messages.saved')]);
        } catch (\Exception $ex) {
            return redirect()->route('teachers.index')->with(['error' => __('pages/admin/messages.error')]);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Post $teacher
     * @return \Illuminate\Http\Response
     */
    // public function show(Post $teacher)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(User $teacher)
    {
        try {
            if ($teacher)
                return view('pages.chef.pages.teachers.edit', compact('teacher'));
        } catch (\Exception $ex) {
            return redirect()->route('teachers.index')->with(['error' => __('pages/admin/messages.error')]);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Post $teacher
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, User $teacher)
    {
        try {
            $password = $request->password ? Hash::make($request->password) : Hash::make($request->mobile);
            $teacher->nom = $request->nom;
            $teacher->prenom = $request->prenom;
            $teacher->mobile = $request->mobile;
            $teacher->email = $request->email;
            $teacher->user_type = "teacher";
            $teacher->password = $password;
            $teacher->update();
            return redirect()->route('teachers.index')->with(['success' => __('pages/admin/messages.updated')]);
        } catch (\Exception $ex) {
            return redirect()->route('teachers.index')->with(['error' => __('pages/admin/messages.error')]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $teacher)
    {
        try {
            // if ($teacher) {
            //     if (file_exists($teacher->thumbnail())) unlink($teacher->thumbnail);
            //     $teacher->delete();
            if ($teacher) {
                $teacher->delete();

                return redirect()->route('teachers.index')->with(['success' => __('pages/admin/messages.deleted')]);
            }
        } catch (\Exception $ex) {
            return redirect()->route('teachers.index')->with(['error' => __('pages/admin/messages.error')]);
        }
    }
}
