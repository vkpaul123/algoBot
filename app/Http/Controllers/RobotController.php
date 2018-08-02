<?php

namespace App\Http\Controllers;

use App\Robot;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RobotController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showNewRobotTraversalForm()
    {
    	return view('robotTraversal');
    }

    public function saveNewRobotTraversalForm(Request $request) {
    	$this->validate($request, [
    		'sourceX' => 'required',
    		'sourceY' => 'required',
    		'destinationX' => 'required',
    		'destinationY' => 'required',
    		'currLocX' => 'required',
    		'currLocY' => 'required',
    		'orientation' => 'required'
    	]);

    	$robot = new Robot;
    	$robot->sourceX = $request->sourceX;
    	$robot->sourceY = $request->sourceY;
    	$robot->destinationX = $request->destinationX;
    	$robot->destinationY = $request->destinationY;
    	$robot->currLocX = $request->currLocX;
    	$robot->currLocY = $request->currLocY;
    	$robot->orientation = $request->orientation;

    	$robot->save();

    	return redirect()->back();
    }
}
