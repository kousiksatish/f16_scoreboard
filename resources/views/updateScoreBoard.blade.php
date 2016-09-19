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


<div style="padding:20px;"><form role="form" method="post" action=" {{ action('scoreBoardController@updateScore') }}">

  <input type="hidden" name="_token" value="{!! csrf_token() !!}">
	<div>
    	<div class="mainselection">
       	College:
    	   	<select name="college" style="padding-left:5%" required>
	    	<option disabled selected value>select a college</option>
	    	@foreach($colleges as $college)
					 <option value= {{  $college->id  }}>{{  $college->name  }}</option>
			@endforeach
			</select>
			</div>
		<br><br><br>
		<div class="mainselection">
		 Event:
		 <select name="event" style="padding-left:5%"required>
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
<br><br><br>
		<div style="margin-left:35px;">Points:
		<br>
    	<input type="number" id="points" name="points"style="width:250px;height:32px;"required>
    	</div>

    	
	</div>



<br><br>
 	<button style="margin-left:35px;"type="submit" class="btn btn-primary">Submit</button>

</form>
</div>
</html>

@endsection
