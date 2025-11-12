<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
class CategoryController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }
    public function index()
    {
        $data = Category::get();
        return view('admin.category.index',compact('data'));
    }
    public function create()
    {
       
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories',
            'image' => 'required',
        ]);
        $category = new Category();
        $category->name = $request->name;
       
        
        $category->slug = Str::slug($request->name);

        if ($category->save()) {
    		$notification = array(
    			'messege'=>'Category Saved',
    			'type'=>'success'
    		);

   			return Redirect()->back()->with($notification);
        }else{
        	$notification = array(
    			'messege'=>'Unsuccessful',
    			'type'=>'error'
    		);

    		return Redirect()->back()->with($notification);
        }
    }
    public function edit($id)
    {
        $data = Category::find($id);
        return view('admin.category.edit',compact('data'));
    }
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'image' => 'required',
        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        
        $category->slug = Str::slug($request->name);

        if ($category->save()) {
    		$notification = array(
    			'messege'=>'Category Updated',
    			'type'=>'success'
    		);

   			return Redirect()->back()->with($notification);
        }else{
        	$notification = array(
    			'messege'=>'Unsuccessful',
    			'type'=>'error'
    		);

    		return Redirect()->back()->with($notification);
        }
    }
    public function delete($id)
    {
        // $check = Product::where('categories_id',$id)->first();
        // if($check){
        //     $notification = array(
        //         'messege'=>'Cann;t delete category, because category has project',
        //         'type'=>'error'
        //     );
    
        //     return Redirect()->back()->with($notification);
        // }


        $category = Category::find($id);
            if ($category->delete()) {
                $notification = array(
                    'messege'=>'Category Deleted',
                    'type'=>'success'
                );
    
                   return Redirect()->back()->with($notification);
            }else{
                $notification = array(
                    'messege'=>'Unsuccessful',
                    'type'=>'error'
                );
    
                return Redirect()->back()->with($notification);
            }
        
    }
}
