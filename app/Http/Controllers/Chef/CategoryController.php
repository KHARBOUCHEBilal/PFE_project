<?php

namespace App\Http\Controllers\Chef;

use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\_Model;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories =  Category::get();
        return view('pages.chef.pages.categories.index',compact('categories'));
    }
  

    public function create()
    {
        $models = _Model::get();
        return view('pages.chef.pages.categories.create',compact('models'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        // try {
            $category = new Category();
            $category->name = $request->name;
            $category->description = $request->description;
            $category->save();
            
            // $category->models()->sync($request->model_id, false);
            return redirect()->route('categories.index')->with(['success' => __('pages/admin/messages.saved')]);
            
        // } catch (\Exception $ex) {
        //     return redirect()->route('categories.index')->with(['error' => __('pages/admin/messages.error')]);
        // }
    }

  
    public function edit(Category $category)
    {
        $models = _Model::get();
        return view('pages.chef.pages.categories.edit', compact('category','models'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Category $Category
     * @return \Illuminate\Http\Response
     */

    public function update(CategoryRequest $request, Category $category)
    {
        try {
            $category->name = $request->name;
            $category->description = $request->description;
            $category->update();
            $category->models()->sync($request->model_id, false);
            return redirect()->route('categories.index')->with(['success' => __('pages/admin/messages.updated')]);
        } catch (\Exception $ex) {

            return redirect()->route('categories.index')->with(['error' => __('pages/admin/messages.error')]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category $Category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {
            if ($category) {
                $category->delete();
                return redirect()->route('categories.index')->with(['success' => __('pages/admin/messages.status_changed')]);
            }
        } catch (\Exception $ex) {
            return redirect()->route('categories.index')->with(['error' => __('pages/admin/messages.error')]);
        }
    }
}
