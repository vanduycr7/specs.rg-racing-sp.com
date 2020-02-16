@extends('homepage-layout.base')
@section('title', trans('messages.service_chiptuning_title') . ' - ')
@section('content')
<link href="{{ asset('css/services.css') }}" rel="stylesheet" type="text/css"/>
<div class="page">
	<div class="page-content padding-30 container-fluid">
		<div class="row">
      <div class="col-lg-3 col-md-5 col-lg-offset-1">
        <div class="service-group">
          <a class="service-group-item active" href="{{ url(trans('routes.service_chiptuning'))}}">{{trans('messages.service_chiptuning_title')}}</a>
          <a class="service-group-item" href="{{ url(trans('routes.service_dpf'))}}">{{trans('messages.service_dpf_title')}}</a>
          <a class="service-group-item" href="{{ url(trans('routes.service_dpf_clean'))}}">{{trans('messages.service_dpf_clean_title')}}</a>
          <a class="service-group-item" href="{{ url(trans('routes.service_egr'))}}">{{trans('messages.service_egr_title')}}</a>
          <a class="service-group-item" href="{{ url(trans('routes.service_dyno'))}}">{{trans('messages.service_dyno_title')}}</a>
          <a class="service-group-item" href="{{ url(trans('routes.service_other'))}}">{{trans('messages.service_other_title')}}</a>
        </div>
        {!! trans('messages.service_duk') !!}
      </div>
			<div class="col-lg-8 col-md-7">
        <div class="row">
          <div class="col-lg-10 col-md-12 padding-bottom-0 margin-bottom-15">
            <div class="widget widget-article widget-shadow">
              <div class="widget-header cover overlay">
                <img class="cover-image" src="{{ asset('images/service_chiptuning.jpg')}}" alt="...">
                <div class="overlay-shade overlay-panel"></div>
              </div>
              <div class="widget-body">
                <h3 class="widget-title">{{trans('messages.service_chiptuning_title_old')}}</h3>
                {!!trans('messages.service_chiptuning_content')!!}
                  <div class="widget-body-footer">
                    <button type="button" data-target="#contactForm" data-toggle="modal" class="btn btn-lg btn-outline btn-danger"><i class="icon md-comments margin-right-5" aria-hidden="true"></i> {{trans('messages.suteikti-daugiau-informacijos')}}</button>
                  </div>
                </div>
              </div>
              {!!trans('messages.copyright_text')!!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade modal-fade-in-scale-up" id="contactForm" aria-hidden="true" aria-labelledby="contactForm"
role="dialog" tabindex="-1">
  <div class="modal-dialog modal-center">
    <div class="modal-content">
      {{ Form::open(array('method' => 'POST', 'id' => 'validateForm', 'route' => 'contact')) }}
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="white" aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">{{trans('messages.contact-form')}}</h4>
      </div>
      <div class="modal-body">
          <div class="margin-10">
            <div class="row">
              <div class="col-xs-12 form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                {{ Form::label('location', trans('messages.filijalas')) }} <span class="red-600">*</span>
                {{ Form::select('location', ['Marijampolė' => 'Marijampolė', 'Kaunas' => 'Kaunas'], null, ['class' => 'form-control']) }}
                <p class="help-block">{{ $errors->first('location', ':message') }}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-6 form-group{{ $errors->has('form_type') ? ' has-error' : '' }}">
                {{ Form::label('form_type', trans('messages.type')) }} <span class="red-600">*</span>
                {{ Form::select('form_type', ['747' => trans('messages.form-car'), '748' => trans('messages.form-truck'), '749' => trans('messages.form-agricultrure')], null, ['class' => 'form-control']) }}
                <p class="help-block">{{ $errors->first('form_type', ':message') }}</p>
              </div>
              <div class="col-xs-6 form-group{{ $errors->has('form_make') ? ' has-error' : '' }}">
                {{ Form::label('form_make', trans('messages.make')) }} <span class="red-600">*</span>
                {{ Form::text('form_make', null, ['class' => 'formMake form-control']) }}
                <p class="help-block">{{ $errors->first('form_make', ':message') }}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-6 form-group{{ $errors->has('form_model') ? ' has-error' : '' }}">
                {{ Form::label('form_model', trans('messages.model')) }} <span class="red-600">*</span>
                {{ Form::text('form_model', null, ['class' => 'formModel form-control']) }}
                <p class="help-block">{{ $errors->first('form_model', ':message') }}</p>
              </div>
              <div class="col-xs-6 form-group{{ $errors->has('form_engine') ? ' has-error' : '' }}">
                {{ Form::label('form_engine', trans('messages.engine')) }} <span class="red-600">*</span>
                {{ Form::text('form_engine', null, ['class' => 'formEngine form-control']) }}
                <p class="help-block">{{ $errors->first('form_engine', ':message') }}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-6 form-group{{ $errors->has('form_name') ? ' has-error' : '' }}">
                {{ Form::label('form_name', trans('messages.name')) }} <span class="red-600">*</span>
                {{ Form::text('form_name', null, ['class' => 'form-control']) }}
                <p class="help-block">{{ $errors->first('form_name', ':message') }}</p>
              </div>
              <div class="col-xs-6 form-group{{ $errors->has('form_email') ? ' has-error' : '' }}">
                {{ Form::label('form_email', trans('messages.email')) }} <span class="red-600">*</span>
                {{ Form::email('form_email', null, ['class' => 'form-control']) }}
                <p class="help-block">{{ $errors->first('form_email', ':message') }}</p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 form-group{{ $errors->has('form_text') ? ' has-error' : '' }}">
                {{ Form::label('form_text', trans('messages.text')) }} <span class="red-600">*</span>
                {{ Form::textarea('form_text', null, ['class' => 'form-control', 'size' => '30x3']) }}
                <p class="help-block">{{ $errors->first('form_text', ':message') }}</p>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <div class="row">
          <div class="col-md-6">
              <button type="button" id="cancelForm" class="btn-sm btn-block btn btn-danger margin-top-15" data-dismiss="modal"><i class="icon md-close margin-right-5"></i> {{trans('messages.cancel')}}</button>
          </div>
          <div class="col-md-6">
              <button id="submitForm" type="submit" class="btn-sm btn-block btn btn-success margin-top-15"><i class="icon md-check margin-right-5"></i> {{trans('messages.send')}}</button>
          </div>
      </div>
      </div>
      {{ Form::close() }}
    </div>
  </div>
</div>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/additional-methods.js') }}"></script>
@if (App::getLocale() === 'lt')
<script src="{{ asset('js/messages_lt.js') }}"></script>
@endif
<script src="{{ asset('js/services.js') }}"></script>
@endsection
