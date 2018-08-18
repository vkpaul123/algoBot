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
        $robot = Robot::find($id);
        $isOnline = $robot->isOnline();

        $results = [
            'isOnline' => $isOnline,
            'traversal' => $traversal,
            'obstacles' => $obstacles,
            'robot' => $robot
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
    	$robot->orientation = $request->orientationOrigin;

    	$robot->save();

    	return redirect(route('home'));
    }

    public function startRobotMovement($id)
    {
        $robot = Robot::find($id);

        if($robot->allowMove == 0) {
            //  TODO
            // run path computing python script
            // get path and store it in paths table
            $robot->allowMove = 1;
            $robot->save();
            // use that path from the table to traverse
        } else if($robot->allowMove == 2) {
            $robot->allowMove = 1;
            $robot->save();
        }

        return redirect()->back();
    }

    public function stopRobotMovement($id)
    {
        $robot = Robot::find($id);

        if($robot->allowMove==1 || $robot->allowMove==2) {
            $robot->allowMove = 0;

            $robot->currLocX = $robot->sourceX;
            $robot->currLocY = $robot->sourceY;

            $robot->pathSet = 0;
            $robot->started = 0;
            $robot->reached = 0;

            $traversals = $robot->traversal()->get();

            foreach ($traversals as $traversal) {
                Traversal::find($traversal->id)->delete();
            }
            $robot->orientation = $robot->orientationOrigin;

            $robot->save();
        }

        return redirect()->back();
    }

    public function pauseRobotMovement($id)
    {
        $robot = Robot::find($id);

        if($robot->allowMove==1) {
            $robot->allowMove = 2;
            $robot->save();
        }

        return redirect()->back();
    }

    public function getRobotAllowMoveStatus($id)
    {
        $robot = Robot::find($id);

        return $robot->allowMove;
    }
}
