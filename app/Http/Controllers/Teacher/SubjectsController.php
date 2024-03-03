<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use App\Models\_Model;
use App\Models\Category;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class SubjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        if (Auth::user()->user_type == "teacher") {
            $subjects = Subject::orderBy('id', 'DESC')->where('teacher_id', Auth::id())->get();
            return view('pages.teacher.pages.subjects.index', compact('subjects'));
        } else {
            $subjects = Subject::orderBy('id', 'DESC')->get();
            return view('pages.teacher.pages.subjects.index', compact('subjects'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $models = _Model::orderBy('name', 'Desc')->get();
        return view('pages.teacher.pages.subjects.create', compact('models', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectRequest $request)
    {

        try {
            // $depend_on_s4 = 1 ? $request->depend_on_s4 == 'on' : 0;
            // $required_models = $request->required_models ? implode(',', $request->required_models) : $request->required_models;
            $subject = new Subject();
            $subject->title = $request->title;
            $subject->teacher_id = Auth::id();
            $subject->description = $request->description;
            $subject->category_id = $request->category_id;

            // $subject->max_groups = $request->max_groups;
            // $subject->depend_on_s4 = $depend_on_s4;
            // $subject->required_models = $required_models;
            $subject->status = '0';
            $subject->save();

            return redirect()->route('subjects.index')->with(['success' => __('pages/admin/messages.saved')]);
        } catch (\Exception $ex) {
            return redirect()->route('subjects.index')->with(['error' => __('pages/admin/messages.error')]);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Post $subject
     * @return \Illuminate\Http\Response
     */
    // public function show(Post $subject)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        try {
            $categories = Category::get();
            if ($subject)
                return view('pages.teacher.pages.subjects.edit', compact('subject', 'categories'));
        } catch (\Exception $ex) {
            return redirect()->route('subjects.index')->with(['error' => __('pages/admin/messages.error')]);
        }
    }

    public function show(Subject $subject)
    {
        try {
            $categories = Category::get();
            if ($subject)
                return view('pages.teacher.pages.subjects.show', compact('subject', 'categories'));
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => __('pages/admin/messages.error')]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Post $subject
     * @return \Illuminate\Http\Response
     */

    public function update(SubjectRequest $request)
    {
        try {
            $subject = Subject::find($request->id);
            $subject->title = $request->title;
            $subject->teacher_id = Auth::id();
            $subject->description = $request->description;
            $subject->category_id = $request->category_id;
            $subject->update();
            return redirect()->route('subjects.index')->with(['success' => __('pages/admin/messages.updated')]);
        } catch (\Exception $ex) {
            return redirect()->route('subjects.index')->with(['error' => __('pages/admin/messages.error')]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        try {
            // if ($subject) {
            //     if (file_exists($subject->thumbnail())) unlink($subject->thumbnail);
            //     $subject->delete();
            if ($subject) {
                $subject->delete();

                return redirect()->route('subjects.index')->with(['success' => __('pages/admin/messages.deleted')]);
            }
        } catch (\Exception $ex) {
            return redirect()->route('subjects.index')->with(['error' => __('pages/admin/messages.error')]);
        }
    }

    public function approve(Subject $subject)
    {
        try {
            if (!$subject)
                return redirect()->back()->with(['error' => __('pages/admin/messages.not_found')]);

            $status = $subject->status == '0' ? '1' : '0';
            $subject->status = $status;
            $subject->update();

            return redirect()->back()->with(['success' => __('pages/admin/messages.status_changed')]);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => __('pages/admin/messages.error')]);
        }
    }
}
