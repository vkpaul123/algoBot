<?php

namespace App\Http\Controllers;

use App\Path;
use App\Robot;
use Illuminate\Http\Request;

class PathController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showPathInputForm($robot_id)
    {
        $robot = Robot::find($robot_id);

    	return view('pathInputForm')
        ->with(compact('robot'));
    }

    public function storePath(Request $request)
    {
    	$this->validate($request, [
    		'robotId' => 'required',
    		'pathStream' => 'required',
    	]);

        $path = new Path;
        $path->robot_id = $request->robotId;
        $path->pathStream = $request->pathStream;

        $path->save();
    }

    public function getPath($robot_id)
    {
    	$path = Path::where('robot_id', $robot_id);
    	return $path->pathStream;
    }
}
