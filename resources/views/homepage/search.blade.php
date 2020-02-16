@extends('homepage-layout.base_2')
@section('title', trans('messages.home-title'))
@section('content')
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-sweetalert/sweet-alert.css') }}">
<style>
	body {
    	background-color: transparent !important;
	}
	td{width:50%;background-color:rgba(33,35,40,.75);padding:5px 10px;border:1px solid rgba(99,99,99,.19)}table{width:100%;font-size:14px;color:#fff}a{color:#fff!important}.page{position: relative;min-height: -webkit-calc(100% - 350px);min-height: calc(100% - 350px);background: none!important;}textarea{overflow: hidden;}.ig{width:100%;-webkit-filter:grayscale(80%);filter:grayscale(80%);transition:0.3s;}.ig:hover{-webkit-filter: grayscale(0%);filter: grayscale(0%);}.padding-bottom-3vw{padding-bottom:8vw!important;}

	.select2-results__options {
		max-height: 91px !important;
	}
</style>

<div class="page-content padding-30-no-top padding-bottom-3vw container-fluid">
	<div class="row dr-section-1">
		<div class="col-xs-12">
			<div class="row">
				<div class="col-xs-4">
					<div class="form-group">
						<select class="make form-control" name="make">
							<option></option>
							<option data-id="1026" value="751">Alfa Romeo</option>
							<option data-id="7647" value="752">Alpina</option>
							<option data-id="7376" value="753">Aston Martin</option>
							<option data-id="1262" value="754">BMW</option>
							<option data-id="1088" value="755">Audi</option>
							<option data-id="7364" value="756">Bentley</option>
							<option data-id="7645" value="757">Bugatti</option>
							<option data-id="7654" value="758">Buick</option>
							<option data-id="1451" value="759">Cadillac</option>
							<option data-id="1458" value="760">Chevrolet</option>
							<option data-id="1468" value="761">Chrysler</option>
							<option data-id="1489" value="762">Citroen</option>
							<option data-id="1584" value="763">Dacia</option>
							<option data-id="1588" value="764">Dodge</option>
							<option data-id="1601" value="765">Ferrari</option>
							<option data-id="1623" value="766">Fiat</option>
							<option data-id="1717" value="767">Ford</option>
							<option data-id="1805" value="768">Honda</option>
							<option data-id="1816" value="769">Hyundai</option>
							<option data-id="7643" value="770">Infiniti</option>
							<option data-id="1863" value="771">Isuzu</option>
							<option data-id="1869" value="772">Jaguar</option>
							<option data-id="1878" value="773">Jeep</option>
							<option data-id="1895" value="774">Kia</option>
							<option data-id="7646" value="775">KTM</option>
							<option data-id="7642" value="776">Lamborghini</option>
							<option data-id="1931" value="777">Lancia</option>
							<option data-id="1976" value="778">Land Rover</option>
							<option data-id="7644" value="779">Lexus</option>
							<option data-id="1998" value="780">Maserati</option>
							<option data-id="2013" value="781">Mazda</option>
							<option data-id="7652" value="782">McLaren</option>
							<option data-id="2026" value="783">Mercedes-Benz</option>
							<option data-id="2217" value="784">Mini</option>
							<option data-id="2234" value="785">Mitsubishi</option>
							<option data-id="2263" value="786">Nissan</option>
							<option data-id="2322" value="787">Opel</option>
							<option data-id="2450" value="788">Peugeot</option>
							<option data-id="2547" value="789">Porsche</option>
							<option data-id="2582" value="790">Renault</option>
							<option data-id="2729" value="791">Rover</option>
							<option data-id="2902" value="792">Saab</option>
							<option data-id="2739" value="793">Seat</option>
							<option data-id="2814" value="794">Skoda</option>
							<option data-id="2853" value="795">Smart</option>
							<option data-id="2864" value="796">SsangYong</option>
							<option data-id="6788" value="797">Subaru</option>
							<option data-id="2878" value="798">Suzuki</option>
							<option data-id="2944" value="799">Toyota</option>
							<option data-id="3087" value="800">Volkswagen</option>
							<option data-id="2997" value="801">Volvo</option>
						</select>
					</div>
				</div>
				<div class="col-xs-4">
					<div class="form-group">
						{{ Form::select('model', ['' => trans('messages.model')], null, ['class' => 'model form-control']) }}
					</div>
				</div>
				<div class="col-xs-4">
					<div class="form-group">
						{{ Form::select('engine', ['' => trans('messages.engine')], null, ['class' => 'engine form-control']) }}
					</div>
				</div>
			</div>
			<div class="row carousel-render hidden-xs">
				<div class="col-md-12">
					<div class="crousel-wrapper">
						<img data-id="751" class="brand-logo" src="{{asset('images/blogos/alfa_romeo.png')}}">
						<img data-id="756" class="brand-logo" src="{{asset('images/blogos/bentley.png')}}">
						<img data-id="755" class="brand-logo" src="{{asset('images/blogos/audi.png')}}">
						<img data-id="754" class="brand-logo" src="{{asset('images/blogos/bmw.png')}}">
						<img data-id="752" class="brand-logo" src="{{asset('images/blogos/alpina.png')}}">
						<img data-id="757" class="brand-logo" src="{{asset('images/blogos/bugatti.png')}}">
						<img data-id="753" class="brand-logo" src="{{asset('images/blogos/aston_martin.png')}}">
						<img data-id="758" class="brand-logo" src="{{asset('images/blogos/buick.png')}}">
						<img data-id="759" class="brand-logo" src="{{asset('images/blogos/cadillac.png')}}">
						<img data-id="760" class="brand-logo" src="{{asset('images/blogos/chevrolet.png')}}">
						<img data-id="761" class="brand-logo" src="{{asset('images/blogos/chrysler.png')}}">
						<img data-id="762" class="brand-logo" src="{{asset('images/blogos/citroen.png')}}">
						<img data-id="763" class="brand-logo" src="{{asset('images/blogos/dacia.png')}}">
						<img data-id="764" class="brand-logo" src="{{asset('images/blogos/dodge.png')}}">
						<img data-id="765" class="brand-logo" src="{{asset('images/blogos/ferrari.png')}}">
						<img data-id="766" class="brand-logo" src="{{asset('images/blogos/fiat.png')}}">
						<img data-id="767" class="brand-logo" src="{{asset('images/blogos/ford_b26fq95fpvk0.png')}}">
						<img data-id="768" class="brand-logo" src="{{asset('images/blogos/honda.png')}}">
						<img data-id="769" class="brand-logo" src="{{asset('images/blogos/hyundai.png')}}">
						<img data-id="770" class="brand-logo" src="{{asset('images/blogos/infinity.png')}}">
						<img data-id="771" class="brand-logo" src="{{asset('images/blogos/isuzu.png')}}">
						<img data-id="772" class="brand-logo" src="{{asset('images/blogos/jaguar.png')}}">
						<img data-id="773" class="brand-logo" src="{{asset('images/blogos/jeep.png')}}">
						<img data-id="774" class="brand-logo" src="{{asset('images/blogos/kia.png')}}">
						<img data-id="775" class="brand-logo" src="{{asset('images/blogos/ktm.png')}}">
						<img data-id="776" class="brand-logo" src="{{asset('images/blogos/lamborghini.png')}}">
						<img data-id="777" class="brand-logo" src="{{asset('images/blogos/lancia.png')}}">
						<img data-id="778" class="brand-logo" src="{{asset('images/blogos/land_rover.png')}}">
						<img data-id="779" class="brand-logo" src="{{asset('images/blogos/lexus.png')}}">
						<img data-id="780" class="brand-logo" src="{{asset('images/blogos/maserati_b26grlvzc14o.png')}}">
						<img data-id="782" class="brand-logo" src="{{asset('images/blogos/mclaren_357daqndfwg0g.png')}}">
						<img data-id="781" class="brand-logo" src="{{asset('images/blogos/mazda.png')}}">
						<img data-id="783" class="brand-logo" src="{{asset('images/blogos/mb_b26gbqakuhsk.png')}}">
						<img data-id="784" class="brand-logo" src="{{asset('images/blogos/mini.png')}}">
						<img data-id="785" class="brand-logo" src="{{asset('images/blogos/mitsubishi.png')}}">
						<img data-id="786" class="brand-logo" src="{{asset('images/blogos/nissan.png')}}">
						<img data-id="787" class="brand-logo" src="{{asset('images/blogos/opel.png')}}">
						<img data-id="788" class="brand-logo" src="{{asset('images/blogos/peugeot_b26he140yeww.png')}}">
						<img data-id="789" class="brand-logo" src="{{asset('images/blogos/porsche.png')}}">
						<img data-id="790" class="brand-logo" src="{{asset('images/blogos/renault.png')}}">
						<img data-id="791" class="brand-logo" src="{{asset('images/blogos/rover.png')}}">
						<img data-id="792" class="brand-logo" src="{{asset('images/blogos/saab.png')}}">
						<img data-id="793" class="brand-logo" src="{{asset('images/blogos/seat.png')}}">
						<img data-id="794" class="brand-logo" src="{{asset('images/blogos/skoda.png')}}">
						<img data-id="795" class="brand-logo" src="{{asset('images/blogos/smart.png')}}">
						<img data-id="796" class="brand-logo" src="{{asset('images/blogos/ssangyong.png')}}">
						<img data-id="797" class="brand-logo" src="{{asset('images/blogos/subaru.png')}}">
						<img data-id="798" class="brand-logo" src="{{asset('images/blogos/suzuki.png')}}">
						<img data-id="799" class="brand-logo" src="{{asset('images/blogos/toyota.png')}}">
						<img data-id="800" class="brand-logo" src="{{asset('images/blogos/vw.png')}}">
						<img data-id="801" class="brand-logo" src="{{asset('images/blogos/volvo_b26genq0vcgs.png')}}">
					</div>
				</div>
			</div>
			<div class="row render">
				<div class="col-md-6">
						<p class="cartitle main" style="padding-left: 74px;background-image: url()"><span class="make-model-title"></span><br><span class="engine-title"></span></p>
						<table style="height: 113px;">
							<tr>
								<td class="text-center padding-15">
									<img class="dr-icon" src="{{ asset('images/power.svg') }}">
									<div class="dr-icon-text"><span class="power_up"></span>% Mehr Leistung</div>
								</td>
								<td class="text-center padding-15">
									<img class="dr-icon" src="{{ asset('images/eco.svg') }}">
									<div class="dr-icon-text"><span class="eco_up"></span>% Weniger Verbrauc</div>
								</td>
							</tr>
						</table>
				</div>
				<div class="col-md-6">
					<table style="height: 193px;">
						<tr>
							<td>{{trans('messages.power-after-chip')}}:</td>
							<td><span class="stage1_power"></span></td>
						</tr>
						<tr>
							<td>{{trans('messages.torque-after-chip')}}:</td>
							<td><span class="stage1_torque"></span></td>
						</tr>
						<tr>
							<td>{{trans('messages.power-up')}}:</td>
							<td><span class="more_power"></span></td>
						</tr>
						<tr>
							<td>{{trans('messages.torque-up')}}:</td>
							<td><span class="more_torque"></span></td>
						</tr>
						<tr>
							<td>{{trans('messages.eco')}}</td>
							<td><span class="more_eco"></span></td>
						</tr>
						
					</table>
				</div>
				<div class="col-md-6">
					<button class="btn btn-block btn-danger margin-top-15" data-target="#contactForm" data-toggle="modal"
					type="button">{{trans('messages.contact')}}</button>
				</div>
				<div class="col-md-6">
					<a class="more-par btn btn-block btn-warning margin-top-15">{{trans('messages.more-parameters')}}</a>
				</div>
			</div>
			<div class="row" style="display: none;">
				<div class="col-md-6 more-power-eco-sec margin-bottom-10" data-mh="my-group">
					<div class="border">
						<div class="col-xs-6 border-right" style="height: 100%;">
							<p class="margin-0 chart-title">{{trans('messages.more-power')}}</p>
							<div id="more_power"></div>
						</div>
						<div class="col-xs-6" style="height: 100%;">
							<p class="margin-0 chart-title">{{trans('messages.more-economy')}}</p>
							<div id="more_eco"></div>
						</div>
					</div>
				</div>
			</div>
			<!--  Video is muted & autoplays, placed after major DOM elements for performance & has an image fallback  -->
			<video autoplay loop id="video-background" class="hidden-xs" muted plays-inline>
				<source src="{{asset('videos/bg_video.mp4')}}" type="video/mp4">
			</video>
			</div>
		</div>
	</div>
		<div class="row margin-0" id="instagram">
			@foreach ($feed as $image)
			<a target="_blank" href="{{ $image->link }}"><img class="ig" src="{{ $image->thumbnailSrc }}"/></a>
			@endforeach
		</div>
    <!-- Modal -->
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
	            			{{ Form::select('location', ['Stage 1' => 'Stage 1', 'Stage 2' => 'Stage 2'], null, ['class' => 'form-control']) }}
	            			<p class="help-block">{{ $errors->first('location', ':message') }}</p>
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
					<button type="button" id="cancelForm" class="btn-sm btn-block btn btn-danger margin-top-15" data-dismiss="modal">{{trans('messages.cancel')}}</button>
            	</div>
            	<div class="col-md-6">
					<button id="submitForm" type="submit" class="btn-sm btn-block btn btn-success margin-top-15">{{trans('messages.send')}}</button>
            	</div>
        	</div>
          </div>
          {{ Form::close() }}
        </div>
      </div>
    </div>
    <!-- End Modal -->
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/additional-methods.js') }}"></script>
@if (App::getLocale() === 'lt')
<script src="{{ asset('js/messages_lt.js') }}"></script>
@endif
<script type="text/javascript" src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/select2.full.js') }}"></script>
<script src="{{ asset('assets/vendor/bootstrap-sweetalert/sweet-alert.js') }}"></script>
<script src="{{asset('js/slick.min.js')}}"></script>
<script type="text/javascript">
$('#instagram').slick({
  dots: false,
  width: 300,
	arrows: false,
  infinite: true,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
var images = [];
function preload() {
    for (var i = 0; i < arguments.length; i++) {
        images[i] = new Image();
        images[i].src = "/images/optlogos/" + preload.arguments[i] + ".png";
    }
}
$( window ).load(function() {
$(".crousel-wrapper").slick({lazyLoad: 'progressive',accessibility:!1,slidesToShow:6,slidesToScroll:1,autoplay:!0,autoplaySpeed:2e3,arrows:!1,infinite:!0});
});
$(document).ready(function() {
    preload("747", "748", "749", "751", "752", "753", "754", "755", "756", "757", "758", "759", "760", "761", "762", "763", "764", "765", "766", "767", "768", "769", "770", "771", "772", "773", "774", "775", "776", "777", "778", "779", "780", "781", "782", "783", "784", "785", "786", "787", "788", "789", "790", "791", "792", "793", "794", "795", "796", "797", "798", "799", "800", "801");

	// $(".row").on("click", function() {
  //       window.open('/');
  //   });

    function e(e, t, o) {
        $.ajax({
            type: "POST",
            data: {
                id: t,
                list: e
            },
            url: '{{ route("ajax.data") }}',
            beforeSend: function() {
                $("." + e).html('<option selected="selected" disabled="disabled">{{trans("messages.loading")}}</option>')
            },
            success: function(t) {
                null === o && $("." + e).html("<option></option>"), jQuery.each(t, function(t, n) {
                    if (o == n.id) {
                        if (void 0 !== n.name) a = "<option data-id='" + n.item_id + "' selected='selected' value=" + n.id + ">" + n.name + "</option>";
                        else if (void 0 !== n.name_en) a = "<option data-id='" + n.item_id + "' selected='selected' value=" + n.id + ">" + n.name_en + "</option>";
                        $(a).appendTo("." + e)
                    } else {
                        if (void 0 !== n.name) a = "<option data-id='" + n.item_id + "' value=" + n.id + ">" + n.name + "</option>";
                        else if (void 0 !== n.name_en) var a = "<option data-id='" + n.item_id + "' value=" + n.id + ">" + n.name_en + "</option>";
                        $(a).appendTo("." + e)
                    }
                }), $("." + e).select2("open")
            }
        })
    }
    $("#validateForm").validate({
        rules: {
            form_type: {
                required: !0
            },
            form_make: {
                required: !0
            },
            form_model: {
                required: !0
            },
            form_engine: {
                required: !0
            },
            form_name: {
                required: !0
            },
            form_email: {
                required: !0
            },
            form_text: {
                required: !0
            }
        },
        highlight: function(e) {
            $(e).closest(".form-group").addClass("has-error")
        },
        unhighlight: function(e) {
            $(e).closest(".form-group").removeClass("has-error"), $(e).closest(".form-group").addClass("has-success")
        },
        errorElement: "span",
        errorClass: "help-block",
        errorPlacement: function(e, t) {
            t.parent(".input-group").length ? e.insertAfter(t.parent()) : e.insertAfter(t)
        },
        submitHandler: function(e) {
            $.ajax({
                type: "POST",
                url: '{{route("contact")}}',
                data: $("#validateForm").serialize(),
                success: function(e) {
                    gtag('event', 'conversion', {
                        'send_to': 'AW-869656606/znl0CO_r75kBEJ7Q154D'
                    }), $("#cancelForm").trigger("click"), swal("Success!", e.success, "success")
                },
                error: function(e) {
                    var t = JSON.parse(e.responseText);
                    swal("Error!", t.error, "error")
                }
            })
        }
    }), $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    }), $(".make").select2({
        width: '100%',
        placeholder: "{{trans('messages.make')}}",
        templateResult: function(e) {
            var t = ["747", "748", "749", "751", "752", "753", "754", "755", "756", "757", "758", "759", "760", "761", "762", "763", "764", "765", "766", "767", "768", "769", "770", "771", "772", "773", "774", "775", "776", "777", "778", "779", "780", "781", "782", "783", "784", "785", "786", "787", "788", "789", "790", "791", "792", "793", "794", "795", "796", "797", "798", "799", "800", "801"];
            return e.id && t.includes(e.id) ? '<img class="option-logo" src="{{url("images/optlogos")}}/' + e.id + '.png" />' + e.text : e.text
        },
        templateSelection: function(e) {
            return e.text
        },
        escapeMarkup: function(e) {
            return e
        }
    }), $(".model").select2({
        width: '100%',
        placeholder: "{{trans('messages.model')}}"
    }), $(".engine").select2({
        width: '100%',
        placeholder: "{{trans('messages.engine')}}"
    }), $(".type").on("change", function() {
        $(".model").html("<option></option>"), $(".engine").html("<option></option>"), e("make", $(this).val(), null)
    }), $(".make").on("change", function() {
        $(".engine").html("<option></option>"), e("model", $(this).find(":selected").attr("data-id"), null)
    }), $(".model").on("change", function() {
        e("engine", $(this).find(":selected").attr("data-id"), null)
    }), $(".brand-logo").on("click", function() {
        $(".make").val($(this).attr("data-id")).trigger("change")
    }), $(".engine").change(function() {
        var e = $(this).find(":selected").attr("data-id"),
            t = $(".model").find(":selected").attr("data-id");
        $.ajax({
            type: "POST",
            data: {
                id: e,
                list: "747",
                model: t
            },
            url: '{{ route("ajax.meta") }}',
            beforeSend: function() {},
            error: function(e, t) {
                alert('{{trans("messages.please-refresh-page")}}')
            },
            success: function(e) {
				make = $('.make').find(":selected").attr("data-id");
				model = $('.model').find(":selected").attr("data-id");
				engine = $('.engine').find(":selected").attr("data-id");
				window.open('/search-detail?make='+make+'&model='+model+'&engine='+engine+'', '_blank');
            }
        })
    })
});
</script>
@endsection
