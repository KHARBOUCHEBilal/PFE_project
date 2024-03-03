<?php

namespace App\Http\Controllers\Chef;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModuleRequest;
use App\Imports\ImportNotes;
use App\Models\ModulesNote;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ModulesNotesController extends Controller
{

    public function importView()
    {
        return view('pages.chef.pages.modules_notes.import-file');
    }

    public function import(Request $request)
    {
        try {
            Excel::import(
                new ImportNotes,
                $request->file('file')->store('files')
            );
            $modules_notes = ModulesNote::orderBy('id', 'DESC')->get();
            return view('pages.chef.pages.modules_notes.index', compact('modules_notes'))->with(['success' => __('pages/admin/messages.imported')]);
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
        $modules_notes = ModulesNote::orderBy('id', 'DESC')->get();
        return view('pages.chef.pages.modules_notes.index', compact('modules_notes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = User::orderBy('id', 'DESC')->where('user_type', 'student')->get();
        return view('pages.chef.pages.modules_notes.create', compact('students'));
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
            $modules_note = new ModulesNote();
            $modules_note->student_id = $request->student;
            $modules_note->programation2 = $request->programation2;
            $modules_note->structure_de_donnees = $request->structure_de_donnees;
            $modules_note->systeme_dexploitation2 = $request->systeme_dexploitation2;
            $modules_note->analyse_numerique = $request->analyse_numerique;
            $modules_note->archetecture_des_ordinateurs = $request->archetecture_des_ordinateurs;
            $modules_note->electromagnetisme = $request->electromagnetisme;
            $modules_note->save();
            return redirect()->route('modules_notes.index')->with(['success' => __('pages/admin/messages.saved')]);
        } catch (\Exception $ex) {
            return redirect()->route('modules_notes.index')->with(['error' => __('pages/admin/messages.error')]);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Post $modules_note
     * @return \Illuminate\Http\Response
     */
    // public function show(Post $modules_note)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post $modules_note
     * @return \Illuminate\Http\Response
     */
    public function edit(ModulesNote $modules_note)
    {
        try {
            $students = User::orderBy('id', 'DESC')->where('user_type', 'student')->get();
            if ($modules_note)
                return view('pages.chef.pages.modules_notes.edit', compact('students', 'modules_note'));
        } catch (\Exception $ex) {
            return redirect()->route('modules_notes.index')->with(['error' => __('pages/admin/messages.error')]);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Post $modules_note
     * @return \Illuminate\Http\Response
     */

    public function update(ModuleRequest $request, ModulesNote $modules_note)
    {
        try {
            $modules_note->student_id = $request->student;
            $modules_note->programation2 = $request->programation2;
            $modules_note->structure_de_donnees = $request->structure_de_donnees;
            $modules_note->systeme_dexploitation2 = $request->systeme_dexploitation2;
            $modules_note->M4 = $request->M4;
            $modules_note->archetecture_des_ordinateurs = $request->archetecture_des_ordinateurs;
            $modules_note->electromagnetisme = $request->electromagnetisme;
            $modules_note->update();
            return redirect()->route('modules_notes.index')->with(['success' => __('pages/admin/messages.updated')]);
        } catch (\Exception $ex) {
            return redirect()->route('modules_notes.index')->with(['error' => __('pages/admin/messages.error')]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post $modules_note
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModulesNote $modules_note)
    {
        try {
            // if ($modules_note) {
            //     if (file_exists($modules_note->thumbnail())) unlink($modules_note->thumbnail);
            //     $modules_note->delete();
            if ($modules_note) {
                $modules_note->delete();

                return redirect()->route('modules_notes.index')->with(['success' => __('pages/admin/messages.deleted')]);
            }
        } catch (\Exception $ex) {
            return redirect()->route('modules_notes.index')->with(['error' => __('pages/admin/messages.error')]);
        }
    }
}
