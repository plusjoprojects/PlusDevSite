<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\approves;
use App\Models\numbers;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;
class ApprovesController extends Controller
{
    public function store(Request $request) {
        if($request->get('image'))
        {
        $image = $request->get('image');
        $fileNameimage = Carbon::now()->timestamp . uniqid() . '.' . explode('/', explode(':', substr($image, 0,
        strpos($image, ';')))[1])[1];
        Image::make($request->get('image'))->save(public_path('images/approves/').$fileNameimage);

        $approves = approves::create([
            'user_id' => $request->user_id,
            'numbers_id' => $request->numbers_id,
            'image' => 'images/approves/'.$fileNameimage,
            'note' => $request->note
        ]);

        $numbers = numbers::where('id',$request->numbers_id)->update(['active' => 0]);
    }
}
}