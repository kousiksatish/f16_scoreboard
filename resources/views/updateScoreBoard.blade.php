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
		  	<option disabled selected value >Select an event</option>
		  	<option value="A-Capella">A-Capella</option>
			<option value="Acoustics">Acoustics</option>
			<option value="V Quiz">AV Quiz</option>
			<option value="Bluff Master">Bluff Master</option>
			<option value="uzzer Quiz">Buzzer Quiz</option>
			<option value="Carnatic Instrumental Non Percussion">Carnatic Instrumental Non Percussion</option>
			<option value="Carnatic Instrumental Percussion">Carnatic Instrumental Percussion</option>
			<option value="Carnatic Vocals Solo">Carnatic Vocals Solo</option>
			<option value="Choreo Nite (Eastern)">Choreo Nite (Eastern)</option>
			<option value="Choreo Nite (Western)">Choreo Nite (Western)</option>
			<option value="Cricket Quiz">Cricket Quiz</option>
			<option value="Crossword">Crossword</option>
			<option value="ebate">Debate</option>
			<option value="Duet Freestyle">Duet Freestyle</option>
			<option value="umb Charades">Dumb Charades</option>
			<option value="Eastern Solo">Eastern Solo</option>
			<option value="Eastern Solo Instrumentals">Eastern Solo Instrumentals</option>
			<option value="Eastern Solo Vocals">Eastern Solo Vocals</option>
			<option value="xtempore">Extempore</option>
			<option value="Face Painting">Face Painting</option>
			<option value="ashionitas">Fashionitas</option>
			<option value="Fashionitas">Fashionitas</option>
			<option value="Giga-Hertz">Giga-Hertz</option>
			<option value="Halka Phulka (Grammar Quiz)">Halka Phulka (Grammar Quiz)</option>
			<option value="Improvathon">Improvathon</option>
			<option value="ndia Quiz">India Quiz</option>
			<option value="AM">JAM</option>
			<option value="Jasn-e-Mousiki (Bollywood Quiz)">Jasn-e-Mousiki (Bollywood Quiz)</option>
			<option value="Kaatrodu Kadhai Pesava">Kaatrodu Kadhai Pesava</option>
			<option value="Kalakkal Kalatta">Kalakkal Kalatta</option>
			<option value="Kavithidal">Kavithidal</option>
			<option value="Kodambakkam">Kodambakkam</option>
			<option value="Kolam">Kolam</option>
			<option value="Koothambalam (Street Play)">Koothambalam (Street Play)</option>
			<option value="Kuch Na Kaho (Dumb C)">Kuch Na Kaho (Dumb C)</option>
			<option value="Kuraloviyam">Kuraloviyam</option>
			<option value="Literature Quiz">Literature Quiz</option>
			<option value="Live Photography">Live Photography</option>
			<option value="one Wolf Quiz">Lone Wolf Quiz</option>
			<option value="Mask Making">Mask Making</option>
			<option value="Mr and Miss Festember">Mr and Miss Festember</option>
			<option value="Paper Dressing">Paper Dressing</option>
			<option value="Pot Pourri">Pot Pourri</option>
			<option value="Puzzlechamp">Puzzlechamp</option>
			<option value="Rochak Mantrana">Rochak Mantrana</option>
			<option value="Sakalakala Vallavan">Sakalakala Vallavan</option>
			<option value="Scrabble">Scrabble</option>
			<option value="Shadow Art">Shadow Art</option>
			<option value="plit Ent Quiz">Split Ent Quiz</option>
			<option value="Tarangini">Tarangini</option>
			<option value="Tatkaleen Bhashan (Extempore)">Tatkaleen Bhashan (Extempore)</option>
			<option value="Tattoo Making">Tattoo Making</option>
			<option value="Telugu Cine Quiz">Telugu Cine Quiz</option>
			<option value="Telugu Dumb Charades">Telugu Dumb Charades</option>
			<option value="Theatrix">Theatrix</option>
			<option value="Uyarthani Semmozhi">Uyarthani Semmozhi</option>
			<option value="Vaad vivadh(debate)">Vaad vivadh(debate)</option>
			<option value="Varthai Vilayattu">Varthai Vilayattu</option>
			<option value="Villupaatu">Villupaatu</option>
			<option value="Wall Painting">Wall Painting</option>
			<option value="Western Freestyle Solo">Western Freestyle Solo</option>
			<option value="Whats The Good Word">Whats The Good Word</option>
			<option value="Others">Others</option>
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
