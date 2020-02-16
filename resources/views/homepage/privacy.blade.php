@extends('homepage-layout.base')
@section('title', trans('privacy.title'))
@section('content')
<style>
.row {
	margin-bottom: 40px;
}
.anchor {
    padding-top: 85px; margin-top: -85px;
}
</style>
<div class="page">
	<div class="page-content padding-30 container-fluid">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel">
				<div class="panel-heading">
					<h3 class="panel-title">
						{{trans('privacy.title')}}
					</h3>
				</div>
				<div class="panel-body">
					{!! trans('privacy.body') !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection