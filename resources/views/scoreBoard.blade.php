@extends('base')
@section('content')
<table class="table"> 
<div class="row">
	<div class="leaderboard-row leaderboard-header rank-grid"><b>POSITION<b></div>
	<div class="leaderboard-row leaderboard-header name-grid"><b>COLLEGE<b></div>
	<div class="leaderboard-row leaderboard-header score-grid"><b>SCORE<b></div>
	</div>
	@foreach($points as $point)
				<div class="row
				@if($point->rank == 1)
					leaderboard-leader1
				@endif
				@if($point->rank == 2)
					leaderboard-leader2
				@endif
				@if($point->rank == 3)
					leaderboard-leader3
				@endif">
				<div class="leaderboard-row rank-grid"><b>{{  $point->rank  }}</b></div>
				<div class="leaderboard-row name-grid "><b>{!!  strtoupper($point->college) !!}</b></div>
				<div class="leaderboard-row score-grid"><b>{{  $point->points }}</b></div>
				</div>
	@endforeach
</table>		
@endsection	
