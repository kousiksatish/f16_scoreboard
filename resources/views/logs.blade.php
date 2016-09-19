@extends('base')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div >
				<h2><center>Logs</center></h2>
				<br>
				<div id="new">
					
				</div>
			</div>
		</div>
	</div>
</div>
<script>

var dataSet = [];


@foreach($scores as $score)
	var temp = [];
	temp.push("{{$score->college_id}}");
	temp.push("{{$score->event}}");
	temp.push("{{$score->points}}");
	temp.push("{{$score->position}}");
	temp.push("{{$score->created_at}}");
	dataSet.push(temp);
@endforeach

$(document).ready(function(){
	$('#new').html('<table id="new1" class="table table-striped table-bordered table-hover"></table>');
	$('#new1').dataTable( {
        "data": dataSet,
        "dom": 'C<"clear">lfrtip',
        "columns": [
        	{ "title": "College ID" },
        	{ "title": "Event" },
        	{ "title": "Points" },
        	{ "title": "Position" },
        	{ "title": "Updated at"}
        ]
    });
});
</script>
@endsection

