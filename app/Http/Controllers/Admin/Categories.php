<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class Categories extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        
        $categories = Categories::orderBy('name')->paginate(5);

        return view('settings.category.report',compact('categories'));
    }

    public function save(CategorySaveRequest $request){
        try {
            $category = Category::create([
                'name' => $request->category_name
            ]);

            if($category){
                foreach($request->menu_list as $menu_id){
                    $access = Access::create([
                        'category_id' => $category->id,
                        'menu_id' => $menu_id
                    ]);
                }
                return redirect()->route('category.add')->with('success', 'Category created successfully.');
            }else{
                return redirect()->back()->withInput()->with('error', 'Failed to create Category.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to create Category.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($cid){
        try {
            $menus = Menu::where('parent_id',0)->with('submenus')->get();
            $category = Category::findOrFail(decrypt($cid));
            $access = Access::where('category_id',decrypt($cid))->get();

            return view('admin.category.edit',compact('menus','category','access'));
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to retrieve category.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request){
        try {
            $category_id = decrypt($request->category_id);
            $category = Role::findOrFail($category_id);

            if($role->update(['name' => $request->name])){
                Access::where('id',$category_id)->delete();
                foreach($request->menu_list as $menu_id){
                    $access = Access::create([
                        'role_id' => $role->id,
                        'menu_id' => $menu_id
                    ]);
                }
                return redirect()->route('admin.category')->with('success', 'category updated successfully.');
            }else{
                return redirect()->back()->withInput()->with('error', 'Failed to update category.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to update category.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($cid){
        try {
            $category = Category::where('id',decrypt($cid))->get();
            if($category->count() > 0){
                return redirect()->back()->with('error', 'Failed to delete category.');
            }else{
                $category = Category::findOrFail(decrypt($cid));
                if($category){
                    $category->delete();
                    return redirect()->route('roles')->with('success', 'category deleted successfully.');
                }else{
                    return redirect()->back()->withInput()->with('error', 'Failed to delete category.');
                }
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Failed to retrieve category.');
        }
    }
}
