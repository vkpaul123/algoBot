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

    public function viewRobotTraversal($id)
    {
        $robot = Robot::find($id);
        return view('viewRobotTraversal')
            ->with(compact('robot'));
    }

    public function addNewStep($robot_id, $currLocX, $currLocY, $orientation)
    {   
        $robot = Robot::find($robot_id);

        $traversal = new Traversal;
        $traversal->robot_id = $robot_id;
        $traversal->currLocX = $currLocX;
        $traversal->currLocY = $currLocY;
        $traversal->orientation = $orientation;
        $traversal->save();

        $robot->currLocX = $currLocX;
        $robot->currLocY = $currLocY;
        $robot->orientation = $orientation;
        if($robot->destinationX==$currLocX && $robot->$currLocY==$currLocY)
            $robot->reached = 1;
        $robot->save();

        return 'OK';
    }

    public function refreshRobotTraversal($id)
    {
        // Ajax
        $traversal = Traversal::where('robot_id', $id)->get();
        return response()->json($traversal);
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

    	return redirect(route('home'));
    }
}
