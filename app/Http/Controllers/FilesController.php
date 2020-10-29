<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\templates;
use App\Models\categories;
use App\Models\countries;
class FilesController extends Controller
{
    public function index() {
        $templates = templates::get();
        $countries = countries::get();
        return response()->json(['templates' => $templates,'countries' => $countries]);
    }

    public function indexWithProps(Request $request) {
        $template =
        templates::where('categories_id',$request->categories_id)->where('countries_id',$request->countries_id)->first();
    
        return response()->json($template);
    }
}
