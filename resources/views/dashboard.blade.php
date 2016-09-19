@extends('base')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div >
				<h2><center> Dashboard</center></h2>
				<br>
				<div>
					<li><a href="{{action('scoreBoardController@displayForm')}}">Update scores</a></li>
					<li><a href="{{action('scoreBoardController@logs')}}">Check logs</a></li>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

