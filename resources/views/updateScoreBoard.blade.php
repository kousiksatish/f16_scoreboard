@extends('base')
@section('content')
<html>
<style>
.mainselection {
    overflow:hidden;
    width:250px;
    margin-left:35px;
    background: #fff 319px 2px;
    
}
select {
    border:0;
    background:transparent;
    height:32px;
    border:1px solid #d8d8d8;
    width:250px;
    -webkit-appearance: none;
}
</style>
 <h2><center> Update ScoreBoard</center></h2>

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif


<div style="padding:20px;">

<form class="form-horizontal" method="post" action=" {{ action('scoreBoardController@updateScore') }}" >



  <input type="hidden" name="_token" value="{!! csrf_token() !!}">
  <div class="form-group">
      <label for="college" class="col-sm-2 control-label" >College</label>
      <div class="col-sm-3">
      	<select name="college" class="form-control" required>
	    	<option disabled selected value>select a college</option>
	    	@foreach($colleges as $college)
					 <option value= {{  $college->id  }}>{{  $college->name  }}</option>
			@endforeach
        </select>
      </div>
  </div>

  <div class="form-group">
      <label for="events" class="col-sm-2 control-label">Event</label>
      <div class="col-sm-3">
        <select name="event" class="form-control" required>
		  <option disabled selected value >select an event</option>
		  <option value="English Lits"> English Lits</option>
		  <option value="Tamil Lits">Tamil Lits</option>
		  <option value="Hindi Lits">Hindi Lits</option>
		  <option value="Telugu Lits">Telugu Lits</option>
		  <option value="Culturals">Culturals</option>
		  <option value="Photography">Photography</option>
		  <option value="Arts">Arts</option>
		</select>
      </div>
  </div>

  <div class="form-group">
      <label for="points" class="col-sm-2 control-label">Position</label>
      <div class="col-sm-3">
        <input class="form-control" type="number" name="position" required>
      </div>
  </div>

  <div class="form-group">
      <label for="points" class="col-sm-2 control-label">Points</label>
      <div class="col-sm-3">
        <input class="form-control" type="number" name="points" required>
      </div>
  </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-3">
        <button type="submit" class="btn btn-primary">Send</button>
      </div>
    </div>
</form>

</div>
</html>

@endsection
