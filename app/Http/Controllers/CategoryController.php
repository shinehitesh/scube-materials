<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use DB;
class CategoryController extends Controller
{
    public function index()
    {
    	$categories = Category::paginate(15);
    	return view('categories.index',compact('categories'));
    }
    public function create()
    {
    	try {
    		return view('categories.create');
    	} catch (Exception $e) {
    		return redirect()->back()->with('error', $e);
    	}
    }
    public function store(Request $request)
    {
	    try {
	    	DB::beginTransaction();
	    	$request->validate([
		        'category_name' => 'required',
		    ]);
		    $category = new Category();
		    $category->category_name = $request->category_name;
		    $category->save();
		    DB::commit();
		    return redirect()->back()->with('success', 'Category Save successfully');
	    } catch (Exception $e) {
    		DB::rollback();
    		return redirect()->back()->with('error', $e);
    		
    	}
    }
    public function edit(Request $request,$id)
    {
    	try {
    		$category = Category::find($id);
    		return view('categories.edit',compact('category'));
    	} catch (Exception $e) {
    		return redirect()->back()->with('error', $e);
    	}
    }
    public function update(Request $request,$id)
    {
    	try {
    		DB::beginTransaction();
            $request->validate([
            'category_name' => 'required',
            ]);
            $category = Category::find($id);
            $category->category_name = $request->category_name;
            $category->save();
    		DB::commit();
    		return redirect()->back()->with('success', 'Category Updated successfully');
    	} catch (Exception $e) {
    		DB::rollback();
    		return redirect()->back()->with('error', $e);
    	}
    }
    public function delete($id)
    {
    	//dd($id);
    	try {
    		$category = Category::find($id)->delete();
    		if ($category) {
    			return redirect()->back()->with('success', 'Category deleted successfully');
    		}else{
    			return redirect()->back()->with('error', 'operation failed');
    		}
    		
    	} catch (Exception $e) {
    		return redirect()->back()->with('error', $e);
    	}
    }
}
