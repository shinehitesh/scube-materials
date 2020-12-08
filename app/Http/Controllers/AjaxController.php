<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
class AjaxController extends Controller
{
    public function getMaterialName($category_id)
    {
    	$materials = Material::where('category_id',$category_id)->get();

    	return $materials;
    }
}
