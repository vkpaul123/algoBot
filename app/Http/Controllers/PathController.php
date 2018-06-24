<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PathController extends Controller
{
    public function showPathInputForm()
    {
    	return view('pathInputForm');
    }

    public function storePath(Request $request)
    {
    	$this->validate($request, [
    		'robotId' => 'required',
    		'pathStream' => 'required',
    	]);
    }

    public function getPath($robot_id)
    {
    	$path = Path::where('robot_id', $robot_id);
    	return $path->pathStream;
    }
}
