<?php

namespace App\Http\Controllers;

use App\Obstacle;
use App\Robot;
use App\Traversal;
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

    public function refreshRobotTraversal($id)
    {
        // Ajax
        $traversal = Traversal::where('robot_id', $id)->get();
        $obstacles = Obstacle::where('robot_id', $id)->get();
        $isOnline = Robot::find($id)->isOnline();

        $results = [
            'isOnline' => $isOnline,
            'traversal' => $traversal,
            'obstacles' => $obstacles
        ];

        return response()->json($results);
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
