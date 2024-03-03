<?php

namespace App\Http\Controllers\Chef;

use App\Exports\FiltredGroupsExport;
use App\Http\Controllers\Controller;
use App\Models\FiltredGroup;
use App\Models\Group;
use App\Models\ModulesNote;
use App\Models\Setting;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class ChefController extends Controller
{


    public function store_password(Request $request)
    {
        User::where('id', Auth::id())->update([
            'password' => Hash::make($request->password),
        ]);
        // if ($request->password == $request->password_confirmation) {
        // } else {
        //     return redirect()->back()->with(['error' => 'the passwords is not the same']);
        // }
        // $user->update();

        return redirect()->route('chef.dashboard');
    }
    public function reset_password()
    {
        return view('pages.chef.pages.reset-password');
    }
    public function index()
    {
        $subjects = Subject::where('status', '0')->get();
        $groups = Group::get();
        $teachers_status = Setting::where('id', 1)->get()->first()->is_teachers_active;
        $students_status = Setting::where('id', 1)->get()->first()->is_students_active;

        $t_starts_at = Setting::where('id', 1)->get()->first()->starts_at_teachers;
        $s_starts_at = Setting::where('id', 1)->get()->first()->starts_at_students;
        $t_ends_at = Setting::where('id', 1)->get()->first()->ends_at_teachers;
        $s_ends_at = Setting::where('id', 1)->get()->first()->ends_at_students;

        $isTeacherActive = false;
        $isStudentActive = false;

        if ($teachers_status != 0) {
            if ($t_starts_at < now() & $t_ends_at > now()) {
                $isTeacherActive = true;
            }
            if ($s_starts_at < now() & $s_ends_at > now()) {
                $isStudentActive = true;
            }
        }
        // if($isStudentActive == true || $isTeacherActive == true){
        return view('pages.chef.dashboard', compact('subjects', 'groups', 'students_status', 'teachers_status', 't_starts_at', 's_starts_at', 't_ends_at', 's_ends_at'));
        // }else{
        return view('pages.chef.dashboard', compact('subjects', 'groups', 'students_status', 'teachers_status'));
        // }
    }

    public function filter_groups()
    {
        // try {
        // $users = User::where('user_type', 'students')->get();

        $modules_notes = ModulesNote::orderBy('ro', 'DESC')
            ->orderBy('moyenne', 'DESC')
            // ->orderBy('reseaux', 'DESC')
            // ->orderBy('poo', 'DESC')
            // ->orderBy('coo', 'DESC')
            // ->orderBy('db', 'DESC')
            // ->orderBy('moyenne', 'DESC')
            ->get();

        $filltred_users = [];

        foreach ($modules_notes as $note) {
            $filltred_users[] = User::where('id', $note->student_id)->get()->first();
        }

        foreach ($filltred_users as $user) {
            $group = Group::where('user1_id', $user->id)
                ->orWhere('user2_id', $user->id)
                ->orWhere('user3_id', $user->id)->get()->first();

            if ($group) {
                // check the the available subjebct for each group
                $isNotAvailable1 = FiltredGroup::where('group_id', $group->id)->orWhere('subject_id', $group->subject1_id)->get()->first();
                if ($isNotAvailable1) {
                    $isNotAvailable2 = FiltredGroup::where('group_id', $group->id)->orWhere('subject_id', $group->subject2_id)->get()->first();
                    if ($isNotAvailable2) {
                        $isNotAvailable3 = FiltredGroup::where('group_id', $group->id)->orWhere('subject_id', $group->subject3_id)->get()->first();
                        if ($isNotAvailable3) {
                            // not filtred group
                        } else {
                            $filtred_group = new FiltredGroup();
                            $filtred_group->group_id = $group->id;
                            $filtred_group->subject_id = $group->subject3_id;
                            $filtred_group->subject = Subject::where('id', $group->subject3_id)->get()->first()->title;
                            // $filtred_group->prof = Subject::where('id',$group->subject3_id)->teacher()->nome .' '. Subject::where('id',$group->subject3_id)->teacher()->prenom;
                            $filtred_group->student1 = User::where('id', $group->user1_id)->where('user_type', 'student')->get()->first()->nom . ' ' . User::where('id', $group->user1_id)->where('user_type', 'student')->get()->first()->prenom;
                            if ($group->user2_id != null) {
                                $filtred_group->student2 = User::where('id', $group->user2_id)->where('user_type', 'student')->get()->first()->nom . ' ' . User::where('id', $group->user2_id)->where('user_type', 'student')->get()->first()->prenom;
                            }
                            if ($group->user3_id != null) {
                                $filtred_group->student3 = User::where('id', $group->user3_id)->where('user_type', 'student')->get()->first()->nom . ' ' . User::where('id', $group->user3_id)->where('user_type', 'student')->get()->first()->prenom;
                            }
                            $filtred_group->save();
                        }
                    } else {
                        $filtred_group = new FiltredGroup();
                        $filtred_group->group_id = $group->id;
                        $filtred_group->subject_id = $group->subject2_id;
                        $filtred_group->subject = Subject::where('id', $group->subject2_id)->get()->first()->title;
                        // $filtred_group->prof = Subject::where('id',$group->subject2_id)->teacher()->nome .' '. Subject::where('id',$group->subject2_id)->teacher()->prenom;
                        $filtred_group->student1 = User::where('id', $group->user1_id)->where('user_type', 'student')->get()->first()->nom . ' ' . User::where('id', $group->user1_id)->where('user_type', 'student')->get()->first()->prenom;
                        if ($group->user2_id != null) {
                            $filtred_group->student2 = User::where('id', $group->user2_id)->where('user_type', 'student')->get()->first()->nom . ' ' . User::where('id', $group->user2_id)->where('user_type', 'student')->get()->first()->prenom;
                        }
                        if ($group->user3_id != null) {
                            $filtred_group->student3 = User::where('id', $group->user3_id)->where('user_type', 'student')->get()->first()->nom . ' ' . User::where('id', $group->user3_id)->where('user_type', 'student')->get()->first()->prenom;
                        }
                        $filtred_group->save();
                    }
                } else {
                    $filtred_group = new FiltredGroup();
                    $filtred_group->group_id = $group->id;
                    $filtred_group->subject_id = $group->subject1_id;
                    $filtred_group->subject = Subject::where('id', $group->subject1_id)->get()->first()->title;
                    // $filtred_group->prof = Subject::where('id',$group->subject1_id)->teacher()->nome .' '. Subject::where('id',$group->subject1_id)->teacher()->prenom;
                    $filtred_group->student1 = User::where('id', $group->user1_id)->where('user_type', 'student')->get()->first()->nom . ' ' . User::where('id', $group->user1_id)->where('user_type', 'student')->get()->first()->prenom;
                    if ($group->user2_id != null) {
                        $filtred_group->student2 = User::where('id', $group->user2_id)->where('user_type', 'student')->get()->first()->nom . ' ' . User::where('id', $group->user2_id)->where('user_type', 'student')->get()->first()->prenom;
                    }
                    if ($group->user3_id != null) {
                        $filtred_group->student3 = User::where('id', $group->user3_id)->where('user_type', 'student')->get()->first()->nom . ' ' . User::where('id', $group->user3_id)->where('user_type', 'student')->get()->first()->prenom;
                    }
                    $filtred_group->save();
                }
            }
        }

        // return FiltredGroup::get()->first()->subject;
        return Excel::download(new FiltredGroupsExport, 'filtred_groups.xlsx');
        // } catch (\Exception $ex) {
        //     return redirect()->back()->with(['error' => __('pages/admin/messages.error')]);
        // }
    }
}
