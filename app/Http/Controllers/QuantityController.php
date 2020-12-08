<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Material;
use App\Models\Quantity;
use DB;

class QuantityController extends Controller
{
    public function index()
    {
    	$quantities = Quantity::paginate(15);
    	return view('quantities.index',compact('quantities'));
    }
    public function create()
    {
    	try {
    		$categories = Category::all();
    		return view('quantities.create',compact('categories'));
    	} catch (Exception $e) {
    		return redirect()->back()->with('error', $e);
    	}
    }
    public function store(Request $request)
    {
	    try {
	    	dd($request->all());
	    	DB::beginTransaction();
	    	$request->validate([
		        'material_name' => 'required',
		        'category' => 'required',
		        'quantity' => 'required|between:0,99.99',
		    ]);
		    $material = new Quantity();
		    $material->material_id = $request->material_name;
            $material->material_category_id = $request->category;
            $material->material_date = $request->material_date;
            $material->quantity = $request->quantity;
		    $material->save();
		    DB::commit();
		    return redirect()->back()->with('success', 'Quantity Save successfully');
	    } catch (Exception $e) {
    		DB::rollback();
    		return redirect()->back()->with('error', $e);
    		
    	}
    }
    public function edit(Request $request,$id)
    {
    	try {
    		$material = Quantity::find($id);
    		$categories = Category::all();
    		return view('quantities.edit',compact('material','categories'));
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
