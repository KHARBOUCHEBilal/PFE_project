<?php

namespace App\Http\Controllers;

use App\Models\FiltredGroup;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function index()
    {
        $groups = FiltredGroup::get();
        $finale_list_status = Setting::where('id', 1)->get()->first()->show_finale_list;

        $teachers = User::where("user_type", "teacher")->get();
        return view('pages.client.pages.welcome', compact('teachers', 'finale_list_status', 'groups'));
    }
}
