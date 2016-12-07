@extends('layouts.portal')
@section('content')
<!-- Main content -->
<div class="content-wrapper">

	<!-- Registration form -->
	<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
		{{ csrf_field() }}
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
				<div class="panel registration-form">
					<div class="panel-body">
						<div class="text-center">
							<div class="icon-object border-success text-success"><i class="icon-plus3"></i></div>
							<h5 class="content-group-lg">Create account <small class="display-block">All fields are required</small></h5>
						</div>

						<div class="form-group has-feedback {{ $errors->has('username') ? ' has-error' : '' }}">
							<input type="text" class="form-control" placeholder="Choose username" name="username">
							<div class="form-control-feedback">
								<i class="icon-user-plus text-muted"></i>
							</div>
							@if ($errors->has('username'))
									<span class="help-block">
											<strong>{{ $errors->first('username') }}</strong>
									</span>
							@endif
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group has-feedback {{ $errors->has('first_name') ? ' has-error' : '' }}">
									<input type="text" class="form-control" placeholder="First name" name="first_name">
									<div class="form-control-feedback">
										<i class="icon-user-check text-muted"></i>
									</div>
									@if ($errors->has('first_name'))
											<span class="help-block">
													<strong>{{ $errors->first('first_name') }}</strong>
											</span>
									@endif
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group has-feedback {{ $errors->has('last_name') ? ' has-error' : '' }}">
									<input type="text" class="form-control" placeholder="Second name" name="last_name">
									<div class="form-control-feedback">
										<i class="icon-user-check text-muted"></i>
									</div>
									@if ($errors->has('last_name'))
											<span class="help-block">
													<strong>{{ $errors->first('last_name') }}</strong>
											</span>
									@endif
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
									<input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
									<div class="form-control-feedback">
										<i class="icon-mention text-muted"></i>
									</div>
									@if ($errors->has('email'))
											<span class="help-block">
													<strong>{{ $errors->first('email') }}</strong>
											</span>
									@endif
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group has-feedback {{ $errors->has('gender') ? ' has-error' : '' }}">
									<select name="gender" class="form-control">
											<option value="">Select</option>
											<option value="male">Male</option>
											<option value="female">Female</option>
									</select>
									<div class="form-control-feedback">
										<i class=" icon-man-woman text-muted"></i>
									</div>
									@if ($errors->has('gender'))
											<span class="help-block">
													<strong>{{ $errors->first('gender') }}</strong>
											</span>
									@endif
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
									<input type="password" class="form-control" name="password" placeholder="Create password">
									<div class="form-control-feedback">
										<i class="icon-user-lock text-muted"></i>
									</div>
									@if ($errors->has('password'))
											<span class="help-block">
													<strong>{{ $errors->first('password') }}</strong>
											</span>
									@endif
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
									<input type="password" class="form-control" name="password_confirmation" placeholder="Repeat password" name="password_confirmation">
									<div class="form-control-feedback">
										<i class="icon-user-lock text-muted"></i>
									</div>
									@if ($errors->has('password'))
											<span class="help-block">
													<strong>{{ $errors->first('password') }}</strong>
											</span>
									@endif
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="checkbox">
								<label>
									<input type="checkbox" class="styled" checked="checked">
									Send me <a href="#">test account settings</a>
								</label>
							</div>

							<div class="checkbox">
								<label>
									<input type="checkbox" class="styled" checked="checked">
									Subscribe to monthly newsletter
								</label>
							</div>

							<div class="checkbox">
								<label>
									<input type="checkbox" class="styled" checked="checked">
									Accept <a href="#">terms of service</a>
								</label>
							</div>
						</div>

						<div class="text-right">
							<button type="submit" class="btn btn-link"><i class="icon-arrow-left13 position-left"></i> Back to login form</button>
							<button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right ml-10"><b><i class="icon-plus3"></i></b> Create account</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!-- /registration form -->

</div>
<!-- /main content -->
@endsection
