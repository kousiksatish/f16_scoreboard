<html>
	<head>
		<!-- <link rel="stylesheet" type="text/css" href="{{asset("bootstrap.min.css")}}" /> -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<style>
		.leaderboard-row
		{
			box-sizing: border-box;
			min-height: 9%;
			background-color:#F1F1F1 ;
			margin-bottom:0.5%;
			margin-right:0.25%;
			margin-left:0.25%;
			font-size:18px;
			font-weight:normal;
			float : left;
			display: flex;
			justify-content: center;
			align-items: center; 
			opacity:0.8;
		}
		.leaderboard-header
		{
			background-color:#F97F06;
			color:#FFFFFF;
		}
		.leaderboard-leader1
		{
			color:#ff9900;
			font-weight: bolder;
		}
		.leaderboard-leader2
		{
			color:	 #6b6b47;
			font-weight: bolder;
		}
		.leaderboard-leader3
		{
			color:#800000;
			font-weight: bolder;
		}
		
		.rank-grid
		{
			width:20%;
		}
		.score-grid
		{
			width:20%;
		}
		.name-grid
		{

			width:54%;
		}

		</style>
	</head>
	<body>
	
		<br><br>
		<div class="container">
			<center><h1 style="color:#F97F06">FESTEMBER'16 SCOREBOARD</h1></center>
			<br><br>
			<div class="row">
				@yield('content')
			</div>
		</div>
		<footer class="navbar navbar-default navbar-fixed-bottom">
		<div class="container-fluid">
			<div class="navbar-header" style="text-align: center;width:100%;float: left;">
				<a class="navbar-brand" style="float:none" href="#">Made with &hearts; by Delta Force</a>
			</div>
		</div>
	</footer>
</body>
</html>

