<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\numbers;
use App\Models\categories;
use App\Models\countries;
class NumbersController extends Controller
{
    public function index() {
        $numbers = numbers::where('active',1)->get();



        // Static
        $categories = categories::get();
        $countries = countries::get();
        return response()->json([
            'numbers' => $numbers,
            'categories' => $categories,
            'countries' => $countries
        ]);
    }

    public function indexWithFilter(Request $request) {
        if($request->category && !$request->country) {
            $numbers = numbers::where('active',1)->where('categories_id',$request->category)->get();
        }
        if(!$request->category&& $request->country) {
            $numbers = numbers::where('active',1)->where('countries_id',$request->country)->get();
        }
        if($request->category && $request->country) {
            $numbers =
            numbers::where('active',1)->where('countries_id',$request->country)->where('categories_id',$request->category)->get();
        }

        return response()->json($numbers);
    }
}
