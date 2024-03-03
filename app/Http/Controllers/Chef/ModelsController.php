<?php

namespace App\Http\Controllers\Chef;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModelRequest;
use App\Models\_Model;
use App\Models\Department;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class ModelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $models = _Model::orderBy('id', 'DESC')->get();
        return view('pages.chef.pages.models.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $departments = Department::orderBy('id', 'ASC')->get();
        return view('pages.chef.pages.models.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ModelRequest $request)
    {
        // try {
        $model = new _Model();
        $model->name = $request->name;
        // $model->semester = $request->semester;
        $model->chef_id = Auth::id();
        $model->description = $request->description;
        $model->save();

        return redirect()->route('models.index')->with(['success' => __('pages/admin/messages.saved')]);
        // } catch (\Exception $ex) {
        //     return redirect()->route('models.index')->with(['error' => __('pages/admin/messages.error')]);
        // }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Post $model
     * @return \Illuminate\Http\Response
     */
    // public function show(Post $model)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post $model
     * @return \Illuminate\Http\Response
     */
    public function edit(_Model $model)
    {
        try {
            if ($model)
                return view('pages.chef.pages.models.edit', compact('model'));
        } catch (\Exception $ex) {
            return redirect()->route('models.index')->with(['error' => __('pages/admin/messages.error')]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Post $model
     * @return \Illuminate\Http\Response
     */

    public function update(ModelRequest $request, $id)
    {

        try {
            $model = _Model::find($id);
            $model->name = $request->name;
            // $model->semester = $request->semester;
            $model->description = $request->description;
            $model->chef_id = Auth::id();
            $model->update();

            $model->tags()->sync($request->tag_id);

            return redirect()->route('models.index')->with(['success' => __('pages/admin/messages.updated')]);
        } catch (\Exception $ex) {
            return redirect()->route('models.index')->with(['error' => __('pages/admin/messages.error')]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post $model
     * @return \Illuminate\Http\Response
     */
    public function destroy(_Model $model)
    {
        try {
            // if ($model) {
            //     if (file_exists($model->thumbnail())) unlink($model->thumbnail);
            //     $model->delete();
            if ($model) {
                $model->delete();

                return redirect()->route('models.index')->with(['success' => __('pages/admin/messages.deleted')]);
            }
        } catch (\Exception $ex) {
            return redirect()->route('models.index')->with(['error' => __('pages/admin/messages.error')]);
        }
    }

    // public function changeStatus(Subject $model)
    // {
    //     try {
    //         if (!$model) return redirect()->route('models.index')->with(['error' => __('pages/admin/messages.not_found')]);

    //         $status =  $model->status  == '0' ? '1' : '0';

    //         $model->status = $status;
    //         $model->update();

    //         return redirect()->route('models.index')->with(['success' => __('pages/admin/messages.status_changed')]);
    //     } catch (\Exception $ex) {
    //         return redirect()->route('models.index')->with(['error' => __('pages/admin/messages.error')]);
    //     }
    // }
}
