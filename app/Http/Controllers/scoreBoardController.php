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
                    ->orderBy('points', 'desc')
                    ->get();
        $colleges = DB::table('colleges')
        		    ->where('id', '>', '1')
        		    ->where('id', '<', '10')
        		    ->lists('name');
       	$colleges = array_fill_keys($colleges, 0);
       	$rank = 0;
        $prevpoints = -1;
        $idx = 1;
        foreach ($points as $point)
        {   
            $collegeName = DB::table('colleges')->where('id', $point->college_id)->value('name');
            $point->college = $collegeName;
        	if($prevpoints!=$point->points)
        	{
        		$rank++;
        	}
        	$point->rank = $rank;
        	$colleges[$collegeName] = 1;
        	$prevpoints = $point->points;
        }
       
        foreach($colleges as $key=>$value)
        {
        	if($value==0)
        	{
        		$score = new stdClass(); 
        		$score->rank = $rank+$idx;
        		$score->college = $key;
        		$score->points = number_format(0,2);
        		array_push($points, $score);

        	}
        }
        
        return view('scoreBoard', compact('points'));
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function logs()
    {
        return view('logs');
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
