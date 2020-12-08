<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Category;
use DB;
class MaterialController extends Controller
{
    public function index()
    {
    	$materials = Material::paginate(15);
    	return view('materials.index',compact('materials'));
    }
    public function create()
    {
    	try {
    		$categories = Category::all();
    		return view('materials.create',compact('categories'));
    	} catch (Exception $e) {
    		return redirect()->back()->with('error', $e);
    	}
    }
    public function store(Request $request)
    {
	    try {
	    	DB::beginTransaction();
	    	$request->validate([
		        'material_name' => 'required',
		        'category' => 'required',
		        'opening_balance' => 'required|between:0,99.99',
		    ]);
		    $material = new Material();
		    $material->material_name = $request->material_name;
            $material->category_id = $request->category;
            $material->opening_balance = $request->opening_balance;
		    $material->save();
		    DB::commit();
		    return redirect()->back()->with('success', 'Material Save successfully');
	    } catch (Exception $e) {
    		DB::rollback();
    		return redirect()->back()->with('error', $e);
    		
    	}
    }
    public function edit(Request $request,$id)
    {
    	try {
    		$material = Material::find($id);
    		$categories = Category::all();
    		return view('materials.edit',compact('material','categories'));
    	} catch (Exception $e) {
    		return redirect()->back()->with('error', $e);
    	}
    }
    public function update(Request $request,$id)
    {
    	try {
    		DB::beginTransaction();
            $request->validate([
            'material_name' => 'required',
            'category' => 'required',
            'opening_balance' => 'required|between:0,99.99',
            ]);
            $material = Material::find($id);
            $material->material_name = $request->material_name;
            $material->category_id = $request->category;
            $material->opening_balance = $request->opening_balance;
            $material->save();
    		DB::commit();
    		return redirect()->back()->with('success', 'Material Updated successfully');
    	} catch (Exception $e) {
    		DB::rollback();
    		return redirect()->back()->with('error', $e);
    	}
    }
    public function delete($id)
    {
    	try {
    		$material = Material::find($id)->delete();
    		if ($material) {
    			return redirect()->back()->with('success', 'Material deleted successfully');
    		}else{
    			return redirect()->back()->with('error', 'operation failed');
    		}
    		
    	} catch (Exception $e) {
    		return redirect()->back()->with('error', $e);
    	}
    }
}
