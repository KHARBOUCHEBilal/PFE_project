<?php

namespace App\Http\Controllers\Student;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\Group;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function index()
    {
        $group = Group::orWhere('user2_id', Auth::id())
            ->orWhere('user3_id', Auth::id())
            ->get()->first();
        return view('pages.student.dashboard', compact('group'));
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
