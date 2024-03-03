<?php

namespace App\Http\Controllers\Chef;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SettingsController extends Controller
{

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function teachers_dashboard_update(Request $request)
    {
        $setting = Setting::where('id', 1)->get()->first();
        $status = true;
        $starts_at=null;
        $ends_at=null;
        if ($request->status == "inactivated") {
            $status = false;
        } else if ($request->status == "programmed") {
            $starts_at = $request->starts_at_date . ' ' . $request->starts_at_time . ':00';
            $setting->starts_at_teachers = $starts_at;
            $ends_at = $request->ends_at_date . ' ' . $request->ends_at_time . ':00';
            $setting->ends_at_teachers = $ends_at;
        }
        $setting->is_teachers_active = $status;
        $setting->starts_at_teachers = $starts_at;
        $setting->ends_at_teachers = $ends_at;
        $setting->teacher_status = 0;
        $setting->update();
        return redirect()->route('chef.dashboard')->with(['success' => __('pages/admin/messages.updated')]);

    }

    public function students_dashboard_update(Request $request)
    {
        $setting = Setting::where('id', 1)->get()->first();
        $status = true;
        $starts_at=null;
        $ends_at=null;
        if ($request->status == "inactivated") {
            $status = false;
        } else if ($request->status == "programmed") {
            $starts_at = $request->starts_at_date . ' ' . $request->starts_at_time . ':00';
            $setting->starts_at_students = $starts_at;
            $ends_at = $request->ends_at_date . ' ' . $request->ends_at_time . ':00';
            $setting->ends_at_students = $ends_at;
        }
        $setting->is_students_active = $status;
        $setting->starts_at_students = $starts_at;
        $setting->ends_at_students = $ends_at;
        $setting->students_status = 0;

        $setting->update();
        return redirect()->route('chef.dashboard')->with(['success' => __('pages/admin/messages.updated')]);
    }
}
