<?php

namespace App\Http\Controllers\Chef;

use App\Http\Controllers\Controller;
use App\Http\Requests\groupRequest;
use App\Models\FiltredGroup;
use App\Models\Group;
use App\Models\Setting;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GroupsController extends Controller
{
    public function show_finale_list()
    {
        try {
            $settings = Setting::find(1);
            if ($settings->show_finale_list == '1')
                $settings->update(['show_finale_list' => '0']);
            else {
                $settings->update(['show_finale_list' => '1']);
            }
            return redirect()->back();
        } catch (\Exception $excep) {
            return redirect()->back()->with(['error' => __('pages/admin/messages.error')]);
        }
    }
    public function delete_all()
    {
        try {
            Group::whereNot('created_at', 'aa')->delete();
            return redirect()->route('groups.index')->with(['success' => __('pages/admin/messages.deleted')]);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => __('pages/admin/messages.error')]);
        }
    }

    public function delete_all_filtred_groups()
    {
        try {
            FiltredGroup::whereNot('created_at', 'aa')->delete();
            return redirect()->route('groups.filtred_groupes')->with(['success' => __('pages/admin/messages.deleted')]);
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
        $groups = Group::orderBy('id', 'DESC')->get();
        if (Auth::user()->user_type == "teacher") {
            $subjects = Subject::where('teacher_id', Auth::id());
            $ids = [];
            foreach ($subjects as $subject) {
                $ids[] = $subject->id;
            }
            $groups = Group::orderBy('id', 'DESC')->whereIn('subject1_id', $ids)->whereIn('subject2_id', $ids)->whereIn('subject3_id', $ids)->get();
        }
        return view('pages.chef.pages.groups.index', compact('groups'));
    }

    public function finale_list()
    {
        $groups = FiltredGroup::get();
        $status = Setting::where('id',1)->get()->first();
        return view('pages.chef.pages.groups.finale-list', compact('groups','status'));
    }
    public function filtred_groupes()
    {
        $groups = FiltredGroup::get();
        $ids = [];
        $subject_ids = [];
        foreach ($groups as $group) {
            $g = Group::where('id', $group->group_id)->get()->first();
            $ids[] = $g->user1->id;
            $subject_ids[] = $group->subject_id;
            if ($g->user2) $ids[] = $g->user2->id;
        }
        $students = Group::whereNotIn('user1_id', $ids)->whereNotIn('user2_id', $ids)->get();
        $sujets = Subject::whereNotIn('id', $subject_ids)->get();
        return view('pages.chef.pages.groups.filtred_groups', compact('groups', 'students', 'sujets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('nom', 'Desc')->where('user_type', 'student')->get();
        $subjects = Subject::orderBy('title', 'Desc')->get();
        return view('pages.chef.pages.groups.create', compact('users', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupRequest $request)
    {
        // try {
        if (sizeof($request->users_ids) > 3) {
            return redirect()->back()->with(['error' => "the max group members is 3"]);
        }
        // $users_ids = $request->users_ids ? implode(',', $request->users_ids) : $request->users_ids;
        $group = new Group();
        $group->motivation = $request->motivation;
        $group->subject1_id = $request->subject1_id;
        $group->subject2_id = $request->subject2_id;
        $group->subject3_id = $request->subject3_id;
        $group->user1_id =  $request->users_ids[0];
        if (isset($request->users_ids[1]))
            $group->user2_id =  $request->users_ids[1];
        // if ($request->users_ids[0]) {
        // $group->user2_id = $request->user_id;
        // }
        // if ($request->users_ids[1]) {
        //     $group->user3_id = $request->users_ids[1];
        // }
        $group->save();
        return redirect()->route('groups.index')->with(['success' => __('pages/admin/messages.saved')]);
        // } catch (\Exception $ex) {
        //     return redirect()->route('groups.index')->with(['error' => __('pages/admin/messages.error')]);
        // }
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
            $users = User::orderBy('nom', 'Desc')->where('user_type', 'student')->get();
            $subjects = Subject::orderBy('title', 'Desc')->get();
            if ($group)
                return view('pages.chef.pages.groups.edit', compact('group', 'users', 'subjects'));
        } catch (\Exception $ex) {
            return redirect()->route('groups.index')->with(['error' => __('pages/admin/messages.error')]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Post $group
     * @return \Illuminate\Http\Response
     */

    public function update(GroupRequest $request, $id)
    {
        try {
            // $users_ids = $request->users_ids ? implode(',', $request->users_ids) : $request->users_ids;
            // if (sizeof($request->users_ids) > 3) {
            //     return redirect()->back()->with(['error' => "the max group members is 3"]);
            // }
            // return $request->users_ids[0];
            $group = group::find($id);
            // $users_ids = $request->users_ids;
            $group->motivation = $request->motivation;
            $group->subject1_id = $request->subject1_id;
            $group->subject2_id = $request->subject2_id;
            $group->subject3_id = $request->subject3_id;
            $group->user1_id =  $request->users_ids[0];
            if (isset($request->users_ids[1]))
                $group->user2_id =  $request->users_ids[1];

            // if ($request->users_ids[0]) {
            //     $group->user2_id = $request->users_ids[0];
            // }
            // if ($request->users_ids[1]) {
            //     $group->user3_id = $request->users_ids[1];
            // }
            $group->update();

            return redirect()->route('groups.index')->with(['success' => __('pages/admin/messages.updated')]);
        } catch (\Exception $ex) {
            return redirect()->route('groups.index')->with(['error' => __('pages/admin/messages.error')]);
        }
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
                return redirect()->route('groups.index')->with(['success' => __('pages/admin/messages.deleted')]);
            }
        } catch (\Exception $ex) {
            return redirect()->route('groups.index')->with(['error' => __('pages/admin/messages.error')]);
        }
    }

    public function approve(group $group)
    {
        try {
            if (!$group) return redirect()->route('groups.index')->with(['error' => __('pages/admin/messages.not_found')]);

            $status =  $group->status  == '0' ? '1' : '0';

            $group->status = $status;
            $group->update();

            return redirect()->route('groups.index')->with(['success' => __('pages/admin/messages.status_changed')]);
        } catch (\Exception $ex) {
            return redirect()->route('groups.index')->with(['error' => __('pages/admin/messages.error')]);
        }
    }
}
