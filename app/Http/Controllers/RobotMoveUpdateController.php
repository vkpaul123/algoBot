<?php

namespace App\Http\Controllers;

use App\Robot;
use App\Traversal;
use Illuminate\Http\Request;

class RobotMoveUpdateController extends Controller
{
    public function addNewStep($robot_id, $currLocX, $currLocY, $orientation, $command, $nodeType)
    {   
        $robot = Robot::find($robot_id);

        if($robot->reached != 1) {
            $traversal = new Traversal;
            $traversal->robot_id = $robot_id;
            $traversal->currLocX = $currLocX;
            $traversal->currLocY = $currLocY;
            $traversal->orientation = $orientation;
            $traversal->command = $command;
            $traversal->nodeType = $nodeType;
            $traversal->save();

            $robot->currLocX = $currLocX;
            $robot->currLocY = $currLocY;
            $robot->orientation = $orientation;
            if($robot->destinationX==$currLocX && $robot->$currLocY==$currLocY)
                $robot->reached = 1;    

            if($currLocX!=$robot->destinationX || $currLocY!=$robot->destinationY) {
                $robot->started = 1;
            } else {
                $robot->reached = 1;
            }

            $robot->save();

            return 'OK';
        } else {
            return 'Error!';
        }
    }
}