@extends('base')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div >
				<h2><center> Update ScoreBoard</center></h2>
				<br>
				<div>
					<form class="form-horizontal" role="form" method="POST" action="{{ action('adminLoginController@auth') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Email</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">Login</button>
							</div>
						</div>
					</form>
					@if (Session::has('message'))
						<div class="alert alert-info">
							<ul>
									<li>{{ Session::get('message') }}</li>
							</ul>
						</div>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

