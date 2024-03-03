<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\_Model;
use App\Models\Group;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $group = Group::where('user1_id', Auth::id())
            // ->whereNot('status', '2')
            ->orWhere('user2_id', Auth::id())
            ->orWhere('user3_id', Auth::id())
            ->get()->first();
        
        return view('pages.student.pages.group.index', compact('group'));
    }

    public function show($id)
    {
        $subject = Subject::where("id", $id)->get()->first();
        try {
            $models = _Model::orderBy('name', 'Desc')->get();
            if ($subject)
                return view('pages.teacher.pages.subjects.show', compact('subject', 'models'));
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => __('pages/admin/messages.error')]);
        }
    }
    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::orderBy('id', 'Desc')->where('status', '2')->get();
        $ids = [];
        foreach ($groups as $group) {
            $ids[] = $group->user1_id;
            if ($group->user2_id)
                $ids[] = $group->user2_id;
        }
        $users = User::orderBy('nom', 'Desc')->whereNotIn('id', $ids)->where('user_type', 'student')->whereNot('id', Auth::id())->get();
        $subjects = Subject::orderBy('title', 'Desc')->whereNot('status','0')->get();
        return view('pages.student.pages.group.create', compact('users', 'subjects'));
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
            // $users_ids = $request->users_ids;
            $group = new Group();
            $group->motivation = $request->motivation;
            $group->subject1_id = $request->subject1_id;
            $group->subject2_id = $request->subject2_id;
            $group->subject3_id = $request->subject3_id;
            $group->user1_id = Auth::id();
            $group->user2_id = $request->user_id;
            // if (isset($users_ids[1])) {
            //     $group->user2_id = $users_ids[1];
            // }
            // if (isset($users_ids[2])) {
            //     $group->user3_id = $users_ids[2];
            // }
            $group->save();
            return redirect()->route('group.my_groupe')->with(['success' => __('pages/admin/messages.saved')]);
        } catch (\Exception $ex) {
            return redirect()->route('group.my_groupe')->with(['error' => 'Je pense que le nomber de persone est superieur']);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Post $group
     * @return \Illuminate\Http\Response
     */
    // public function show(Post $group)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        try {
            $users = User::orderBy('nom', 'Desc')->where('id', Auth::id())->where('user_type', 'student')->get();
            $subjects = Subject::orderBy('title', 'Desc')->get();
            if ($group)
                return view('pages.student.pages.group.edit', compact('group', 'users', 'subjects'));
        } catch (\Exception $ex) {
            return redirect()->route('group.my_groupe')->with(['error' => __('pages/admin/messages.error')]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Post $group
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        // try {
        $group = group::find($id);
        $group->motivation = $request->motivation;
        $group->subject1_id = $request->subject1_id;
        $group->subject2_id = $request->subject2_id;
        $group->subject3_id = $request->subject3_id;
        $group->update();

        return redirect()->route('group.my_groupe')->with(['success' => __('pages/admin/messages.updated')]);
        // } catch (\Exception $ex) {
        //     return redirect()->route('group.my_groupe')->with(['error' => __('pages/admin/messages.error')]);
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        try {
            // if ($group) {
            //     if (file_exists($group->thumbnail())) unlink($group->thumbnail);
            //     $group->delete();
            if ($group) {
                $group->delete();
                return redirect()->route('group.my_groupe')->with(['success' => __('pages/admin/messages.deleted')]);
            }
        } catch (\Exception $ex) {
            return redirect()->route('group.my_groupe')->with(['error' => __('pages/admin/messages.error')]);
        }
    }

    public function approve($id)
    {
        // try {
        $group = Group::where('id', $id)->get()->first();
        if (!$group) return redirect()->route('group.my_groupe')->with(['error' => __('pages/admin/messages.not_found')]);

        // $status =  $group->status  == '0' ? '1' : '0';
        $group->status = '2';
        $group->update();

        return redirect()->route('student.dashboard')->with(['success' => __('pages/admin/messages.status_changed')]);
        // } catch (\Exception $ex) {
        //     return redirect()->route('group.my_groupe')->with(['error' => __('pages/admin/messages.error')]);
        // }
    }
}
