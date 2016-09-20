<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use \stdClass;
use Illuminate\Support\Facades\Redirect;
use DB;
use View;

class scoreBoardController extends Controller {

    public function displayScore()
    {

        $points = DB::table('scoreBoard')
                    ->select('college_id', DB::raw('SUM(points) as points'))
                    ->groupBy('college_id')
                    ->havingRaw('sum(points) > 0')
                    ->orderBy('points', 'desc')
                    ->get();

       	$rank = 0;
        $prevpoints = -1;
        $idx = 0;
        foreach ($points as $point)
        {   
            $collegeName = DB::table('colleges')->where('id', $point->college_id)->value('name');
            $point->college = $collegeName;
        	if($prevpoints!=$point->points)
        	{
                $rank = $rank + $idx;
                $idx = 0;
        		$rank++;
        	}
            else
            {
                $idx++;
            }
        	$point->rank = $rank;
        	$prevpoints = $point->points;
        }
        foreach ($points as $key => $value)
        {
            if($value->rank > 10)
                unset($points[$key]);
        }
        return view('scoreBoard', compact('points'));
    }

    public function getScoreBoard()
    {
         $points = DB::table('scoreBoard')
                    ->select('college_id', DB::raw('SUM(points) as points'))
                    ->groupBy('college_id')
                    ->havingRaw('sum(points) > 0')
                    ->orderBy('points', 'desc')
                    ->get();

        $rank = 0;
        $prevpoints = -1;
        $idx = 0;
        foreach ($points as $point)
        {   
            $collegeName = DB::table('colleges')->where('id', $point->college_id)->value('name');
            $point->college = $collegeName;
            if($prevpoints!=$point->points)
            {
                $rank = $rank + $idx;
                $idx = 0;
                $rank++;
            }
            else
            {
                $idx++;
            }
            $point->rank = $rank;
            $prevpoints = $point->points;
        }
        foreach ($points as $key => $value)
        {
            if($value->rank > 10)
                unset($points[$key]);
        }
        $response = new stdClass(0);
        $response->status = 200;
        $response->data = $points;
        return response()->json($response);
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function logs()
    {
        $scores = DB::select('select * from scoreBoard, colleges where scoreBoard.college_id = colleges.id');
        return view('logs', compact('scores'));
    }

    public function displayForm()
    {
        $colleges = DB::select('select * from colleges');
        return view('updateScoreBoard', compact('colleges'));
    }


    public function updateScore(Request $request)
    {   
        
        $college_id = $request->get('college');
        $event = $request->get('event');
        $points = $request->get('points');
        $position = $request->get('position');
        // $rows = DB::select('select * from scoreBoard where college_id = ? and event = ?',[$college_id,$event]);
        $date = date('Y-m-d H:i:s');   
            // if(count($rows) < 1)
            // {

                DB::table('scoreBoard')->insert(array(

                                            'college_id'    => $college_id,
                                            'event'         => $event,
                                            'points'        => $points,
                                            'position'      => $position,
                                            'created_at'    => $date,
                                            'updated_at'    => $date
                                            ));
            // }

            // else
            // {
            //     DB::table('scoreBoard')->where('college_id' , $college_id)->update(array('points' => $points, 'updated_at' => $date));
             

            // }

            return redirect()->action('scoreBoardController@displayForm')->with('status', 'ScoreBoard updated!');
    }



}
