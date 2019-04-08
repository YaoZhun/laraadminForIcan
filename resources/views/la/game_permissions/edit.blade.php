@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/game_permissions') }}">Game permission</a> :
@endsection
@section("contentheader_description", $game_permission->$view_col)
@section("section", "Game permissions")
@section("section_url", url(config('laraadmin.adminRoute') . '/game_permissions'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Game permissions Edit : ".$game_permission->$view_col)

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($game_permission, ['route' => [config('laraadmin.adminRoute') . '.game_permissions.update', $game_permission->id ], 'method'=>'PUT', 'id' => 'game_permission-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'name')
					@la_input($module, 'LoginTime')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/game_permissions') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#game_permission-edit-form").validate({
		
	});
});
</script>
@endpush
