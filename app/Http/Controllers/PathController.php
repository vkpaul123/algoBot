<?php

namespace App\Http\Controllers;

use App\Obstacle;
use App\Path;
use App\Robot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PathController extends Controller
{
    public function testConnection()
    {
        return 'OK';
    }

    public function showPathInputForm($robot_id)
    {
        $robot = Robot::find($robot_id);

        if($robot->pathSet == 0) {
    	    return view('pathInputForm')
            ->with(compact('robot'));
        } else {
            Session::flash('messageFail', 'Robot with <strong>ID: '.$robot_id.'</strong> already has a path Set!');
            return redirect()->back();
        }
    }

    public function storePath(Request $request)
    {
    	$this->validate($request, [
    		'robot_id' => 'required',
    		'pathStreamSend' => 'required'
    	]);

        $path = new Path;
        $path->robot_id = $request->robot_id;
        $path->pathStream = $request->pathStreamSend;

        $path->save();

        $robot = Robot::find($request->robot_id);
        $robot->pathSet = 1;
        $robot->save();

        return redirect(route('home'));
    }

    public function storePathReroute(Request $request)
    {
        $this->validate($request, [
            'robot_id' => 'required',
            'pathStreamSend' => 'required'
        ]);

        $path = new Path;
        $path->robot_id = $request->robot_id;
        $path->pathStream = $request->pathStreamSend;

        $path->save();

        $robot = Robot::find($request->robot_id);
        $robot->pathSet = 1;
        $robot->save();

        $obstacle = Obstacle::where('robot_id', $request->robot_id)->where('xLocation', $request->newObstacleX)->where('yLocation', $request->newObstacleY)->get()->first();
        $obstacle->evaporationValue = 2;
        $obstacle->save();

        $robot = Robot::find($request->robot_id);
        $robot->allowMove = 1;
        $robot->save();

        return redirect()->back();
    }

    public function getPath($robot_id)
    {
    	$path = Path::where('robot_id', $robot_id)->get()->first();
        if(!isset($path))
            return -1;
    	return $path->pathStream;
    }

    public function getLatestPath($robot_id)
    {
        $path = Path::where('robot_id', $robot_id)->get()->last();
        if(!isset($path))
            return -1;
        return $path->pathStream;
    }
}
