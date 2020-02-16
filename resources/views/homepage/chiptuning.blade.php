@extends('homepage-layout.base')
@section('title', trans('messages.chiptuning-title'))
@section('content')
<link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-sweetalert/sweet-alert.css') }}">
<link href="{{ asset('css/select2.css') }}" rel="stylesheet" type="text/css"/>
<style>
@media (min-width: 992px) and (max-width: 1366px) {
    .col-md-offset-1 {
        margin-left: 2.33333333% !important;
    }

    .col-md-10 {
        width: 96.33333333% !important;
    }
}

td {
    width: 50%;
    background-color: rgba(33, 35, 40, .66);
    padding: 5px 10px;
    border: 1px solid rgba(99, 99, 99, .19)
}

table {
    width: 100%
}

#more_eco,
#more_power {
    height: 100%
}

.modal-content {
    border: 0 !important
}

@media only screen and (max-width:1200px) {
    .chiptuning-page {
        padding: 8px !important
    }

    .panel {
        background-color: transparent
    }

    #dyno_visual {
        padding: 15px 0 10px
    }
}

.navbar {
    margin-bottom: 0 !important
}
</style>
<div class="page">
	<div class="page-content chiptuning-page container-fluid">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel">
					<div class="panel-body">
						<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									{{ Form::label('type', trans('messages.type')) }}
									{{ Form::select('type', ['' => trans('messages.select')] + get_chained('type', 'position', 'ASC')->toArray(), $type, ['class' => 'type form-control']) }}
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									{{ Form::label('make', trans('messages.make')) }}
									{{ Form::select('make', ['' => ''], null, ['class' => 'make form-control']) }}
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									{{ Form::label('model', trans('messages.model')) }}
									{{ Form::select('model', ['' => ''], null, ['class' => 'model form-control']) }}
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									{{ Form::label('engine', trans('messages.engine')) }}
									{{ Form::select('engine', ['' => ''], null, ['class' => 'engine form-control']) }}
								</div>
							</div>
						</div>
						<div class="render">
							<div class="row">
								<div class="col-md-6 charts margin-bottom-10" data-mh="my-group">
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
								<div class="col-md-6 margin-bottom-10" data-mh="my-group">
									<table>
										<tr>
											<td>{{trans('messages.engine-type')}}:</td>
											<td><span class="engine_type"></span></td>
										</tr>
										<tr>
											<td>{{trans('messages.power')}}:</td>
											<td><span class="power"></span></td>
										</tr>
										<tr>
											<td>{{trans('messages.torque')}}:</td>
											<td><span class="torque"></span></td>
										</tr>
									</table>
									<br/>
									<h4>{{trans('messages.duomenys-po-chip-tuning')}}</h4>
									<table>
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
							</div>
							<div class="row">
								<div class="col-md-12">
									<div id="dyno_visual" style="min-width: 310px; margin: 0 auto;"></div>
                                    <a data-target="#contactSidebar" id="contact" data-toggle="modal" class="btn btn-block btn-danger margin-top-15">{{trans('messages.contact-for-chiptuning')}}</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <div class="modal fade" id="contactSidebar" aria-hidden="true" aria-labelledby="contactSidebar" role="dialog" tabindex="-1" style="display: none;">
      <div class="modal-dialog modal-sidebar modal-center">
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
	            	</div>
                    <div class="row">
                        <div class="col-xs-6 form-group{{ $errors->has('form_type') ? ' has-error' : '' }}">
                            {{ Form::label('form_type', trans('messages.type')) }} <span class="red-600">*</span>
                            {{ Form::select('form_type', ['747' => trans('messages.form-car'), '748' => trans('messages.form-truck'), '749' => trans('messages.form-agricultrure')], null, ['class' => 'formType form-control']) }}
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
</div>
</div>
<script src="{{ asset('js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/additional-methods.js') }}"></script>
@if (App::getLocale() === 'lt')
<script src="{{ asset('js/messages_lt.js') }}"></script>
@endif
<script src="{{ asset('assets/vendor/bootstrap-sweetalert/sweet-alert.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/select2.full.js') }}"></script>
<script src="{{asset('js/highcharts.js')}}"></script>
<script src="{{asset('js/exporting.js')}}"></script>
<script>
var images = [];
function preload() {
    for (var i = 0; i < arguments.length; i++) {
        images[i] = new Image();
        images[i].src = "/images/optlogos/" + preload.arguments[i] + ".png";
    }
}
$(document).ready(function() {
    preload("747", "748", "749", "751", "752", "753", "754", "755", "756", "757", "758", "759", "760", "761", "762", "763", "764", "765", "766", "767", "768", "769", "770", "771", "772", "773", "774", "775", "776", "777", "778", "779", "780", "781", "782", "783", "784", "785", "786", "787", "788", "789", "790", "791", "792", "793", "794", "795", "796", "797", "798", "799", "800", "801");

    function e(e) {
        var t = ["747", "748", "749", "751", "752", "753", "754", "755", "756", "757", "758", "759", "760", "761", "762", "763", "764", "765", "766", "767", "768", "769", "770", "771", "772", "773", "774", "775", "776", "777", "778", "779", "780", "781", "782", "783", "784", "785", "786", "787", "788", "789", "790", "791", "792", "793", "794", "795", "796", "797", "798", "799", "800", "801"];
        return e.id && t.includes(e.id) ? '<img class="option-logo" src="{{url("images/optlogos")}}/' + e.id + '.png" />' + e.text : e.text
    }

    function t(e, t, o, n) {
        $.ajax({
            type: "POST",
            data: {
                id: t,
                list: e
            },
            url: '{{ route("ajax.data") }}',
            beforeSend: function() {
                $("." + e).html('<option selected="selected" disabled="disabled" value="0">{{trans("messages.loading")}}</option>')
            },
            success: function(t) {
                $("." + e).html("<option></option>"), jQuery.each(t, function(t, n) {
                    if (o == n.id) {
                        if (void 0 !== n.name) a = "<option data-id='" + n.item_id + "' selected='selected' value=" + n.id + ">" + n.name + "</option>";
                        else if (void 0 !== n.name_en) a = "<option data-id='" + n.item_id + "' selected='selected' value=" + n.id + ">" + n.name_en + "</option>";
                        $(a).appendTo("." + e)
                    } else {
                        if (void 0 !== n.name) a = "<option data-id='" + n.item_id + "' value=" + n.id + ">" + n.name + "</option>";
                        else if (void 0 !== n.name_en) var a = "<option data-id='" + n.item_id + "' value=" + n.id + ">" + n.name_en + "</option>";
                        $(a).appendTo("." + e)
                    }
                }), n || $("." + e).select2("open")
            }
        })
    }

    function o(e, t, o) {
        $.ajax({
            type: "POST",
            data: {
                id: e,
                list: t,
                model: o
            },
            url: '{{ route("ajax.meta") }}',
            beforeSend: function() {},
            error: function(e, t) {
                alert('{{trans("messages.please-refresh-page")}}')
            },
            success: function(e) {
                jQuery.each(e, function(e, t) {

                    $(".engine-title").html($(".engine option:selected").text());
                    var o = t.power,
                        n = t.torque,
                        a = t.stage1_power,
                        r = t.stage1_torque,
                        i = t.hp_percentage,
                        s = t.nm_percentage,
                        l = t.rpm_values,
                        d = t.engine_type_id;
                    i = i.split(",");
                    var c = jQuery.map(i, function(e, t) {
                        return Math.ceil(a * e / 100)
                    }),
                        h = jQuery.map(i, function(e, t) {
                            return Math.ceil(o * e / 100)
                        });
                    s = s.split(",");
                    var m = jQuery.map(s, function(e, t) {
                            return Math.ceil(r * e / 100)
                        }),
                        p = jQuery.map(s, function(e, t) {
                            return Math.ceil(n * e / 100)
                        }),
                        g = l.split(","),
                        u = Math.round(a - 8);
                    $(".render").slideDown("slow"), 2 ==
						d || 4 == d || 5 == d || d > 5 ? ($(
							".powerbox").hide(), $(
							".charts").css("height",
							"324px")) : ($(".charts").css(
							"height", "356px"), $(
							".powerbox").show()), 1 == d ? (
							steko = 10, engine_type =
							"{{trans('messages.diesel')}}"
							) : 2 == d ? (steko = 10,
							engine_type =
							"{{trans('messages.petrol')}}"
							) : 3 == d ? (steko = 15,
							engine_type =
							"{{trans('messages.turbo-diesel')}}"
							) : 4 == d ? (steko = 13,
							engine_type =
							"{{trans('messages.turbo-petrol')}}"
							) : (steko = 15, engine_type =
							"---"), $(".engine_type").html(
							engine_type), $(".power").html(
							" " + o + "PS (" + Math.round(
								o / 1.36) + "kW)"), $(
							".torque").html(" " + n +
							"Nm (" + Math.round(.7375621 *
								n) + "ft-lb)"), $(
							".stage1_power").html(" " + a +
							"PS (" + Math.round(a / 1.36) +
							"kW)"), $(".stage1_torque")
						.html(" " + r + "Nm (" + Math.round(
							.7375621 * r) + "ft-lb)"), $(
							".more_power").html(" " + Math
							.round(a - o) + "PS (" + Math
							.round((a - o) / 1.36) + "kW)"),
						$(".more_torque").html(" " + Math
							.round(r - n) + "Nm (" + Math
							.round(.7375621 * (r - n)) +
							"ft-lb)"), $(".dyno_visual")
						.html(" " + u + "PS (" + Math.round(
							u / 1.36) + "kW)"), $(
							".more_eco").html(
							" {{trans('messages.up-to')}} " +
							steko + "%"), chartindex1hp =
						Math.round((a - o) / (o / 100)),
						chartbg1 = "#121212", chartbg2 =
						"#000000", chartmaxhp = 1.01 * a,
						chartmaxhpstep = Math.round(
							chartmaxhp / 8), chartmaxnm =
						1.01 * r,
						// console.log(g);
						// console.log(h);
						// console.log(c);
						// console.log(p);
						// console.log(m);
						// console.log(chartmaxhp);
						// console.log(chartmaxnm );
						chartmaxnmstep = Math
						.round(chartmaxnm / 8), $(
						function() {
                        Highcharts.chart("more_power", {
                            credits: {
                                enabled: !1
                            },
                            chart: {
                                spacingBottom: 5,
                                spacingTop: 5,
                                spacingLeft: 0,
                                spacingRight: 0,
                                height: 250,
                                backgroundColor: null,
                                plotBackgroundColor: null,
                                plotBorderWidth: 0,
                                plotShadow: !1
                            },
                            title: {
                                text: chartindex1hp + "%",
                                align: "center",
                                verticalAlign: "middle",
                                y: 10,
                                style: {
                                    fontWeight: "bold",
                                    fontSize: "28px",
                                    fontFamily: "Oswald",
                                    color: "#c30f0f"
                                }
                            },
                            tooltip: {
                                headerFormat: "",
                                borderRadius: 13,
                                borderColor: null,
                                borderWidth: 2,
                                pointFormat: "{point.name}: <b>{point.y}%</b>",
                                crosshairs: [{
                                    width: 1,
                                    color: "#666",
                                    dashStyle: "shortdot"
                                }, {
                                    width: 1,
                                    color: "#666",
                                    dashStyle: "shortdot"
                                }]
                            },
                            plotOptions: {
                                pie: {
                                    minSize: 120,
                                    dataLabels: {
                                        enabled: !1,
                                        distance: 5,
                                        connectorWidth: 0,
                                        style: {
                                            fontWeight: "bold",
                                            color: "#c30f0f",
                                            textShadow: "none"
                                        }
                                    },
                                    startAngle: 0,
                                    endAngle: 360,
                                    center: ["50%", "50%"],
                                    allowPointSelect: !0,
                                    slicedOffset: 3,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                type: "pie",
                                name: '{{trans("messages.more-power")}}',
                                innerSize: "60%",
                                data: [{
                                    name: '{{trans("messages.oem")}}',
                                    y: 100 - chartindex1hp,
                                    color: "#1b6ab4"
                                }, {
                                    name: '{{trans("messages.more-power")}}',
                                    y: chartindex1hp,
                                    color: "#c30f0f"
                                }]
                            }],
                            exporting: {
                                enabled: !1
                            }
                        })
                    }), $(function() {
                        Highcharts.chart("more_eco", {
                            credits: {
                                enabled: !1
                            },
                            chart: {
                                spacingBottom: 5,
                                spacingTop: 5,
                                spacingLeft: 0,
                                spacingRight: 0,
                                height: 250,
                                backgroundColor: null,
                                plotBackgroundColor: null,
                                plotBorderWidth: 0,
                                plotShadow: !1
                            },
                            title: {
                                text: steko + "%",
                                align: "center",
                                verticalAlign: "middle",
                                y: 10,
                                style: {
                                    fontWeight: "bold",
                                    fontSize: "28px",
                                    fontFamily: "Oswald",
                                    color: "#007622"
                                }
                            },
                            tooltip: {
                                headerFormat: "",
                                borderRadius: 13,
                                borderColor: null,
                                borderWidth: 2,
                                pointFormat: "{point.name}: <b>{point.y}%</b>",
                                crosshairs: [{
                                    width: 1,
                                    color: "#666",
                                    dashStyle: "shortdot"
                                }, {
                                    width: 1,
                                    color: "#666",
                                    dashStyle: "shortdot"
                                }]
                            },
                            plotOptions: {
                                pie: {
                                    minSize: 120,
                                    dataLabels: {
                                        enabled: !1,
                                        distance: 5,
                                        connectorWidth: 0,
                                        style: {
                                            fontWeight: "bold",
                                            color: "#007622",
                                            textShadow: "none"
                                        }
                                    },
                                    startAngle: 0,
                                    endAngle: 360,
                                    center: ["50%", "50%"],
                                    allowPointSelect: !0,
                                    slicedOffset: 3,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                type: "pie",
                                name: '{{trans("messages.savings")}}',
                                innerSize: "60%",
                                data: [{
                                    name: '{{trans("messages.oem")}}',
                                    y: 100 - steko,
                                    color: "#007622"
                                }, {
                                    name: '{{trans("messages.savings")}}',
                                    y: steko,
                                    color: "#0FC342"
                                }]
                            }],
                            exporting: {
                                enabled: !1
                            }
                        })
                    }), $(function() {
                        Highcharts.chart("dyno_visual", {
                            credits: {
                                enabled: !1
                            },
                            colors: ["#006fa3", "#b80606", "#006fa3", "#b80606", "#006fa3", "#b80606", "#949494", "#ffffff"],
                            chart: {
                                backgroundColor: "rgba(0,0,0,0)",
                                type: "areaspline",
                                style: {
                                    fontFamily: "'PT Sans', sans-serif"
                                }
                            },
                            title: {
                                text: "",
                                x: -20
                            },
                            subtitle: {
                                text: "",
                                x: -20
                            },
                            xAxis: {
                                allowDecimals: !1,
                                gridLineWidth: 1,
                                gridLineColor: "#003849",
                                gridLineDashStyle: "Dot",
                                endOnTick: !1,
                                maxPadding: 0,
                                lineColor: "#c30f0f",
                                lineWidth: 1,
                                tickWidth: 1,
                                tickColor: "#c30f0f",
                                tickLength: 5,
                                title: {
                                    text: "RPM"
                                },
                                backgroundColor: {
                                    linearGradient: [0, 0, 0, 100],
                                    stops: [
                                        [0, "#333"],
                                        [1, "#000"]
                                    ]
                                },
                                style: {
                                    color: "#fff",
                                    fontSize: "12px",
                                    padding: "8px",
                                    followPointer: !0
                                },
                                categories: g
                            },
                            plotOptions: {
                                series: {
                                    lineWidth: 3,
                                    fillOpacity: .3,
                                    marker: {
                                        symbol: "circle",
                                        lineWidth: 0,
                                        radius: 5,
                                        states: {
                                            hover: {
                                                radiusPlus: 2,
                                                lineWidth: 2
                                            }
                                        }
                                    },
                                    states: {
                                        hover: {
                                            lineWidthPlus: 2,
                                            color: "#949494"
                                        }
                                    }
                                }
                            },
                            yAxis: [{
                                min: 0,
                                max: chartmaxhp,
                                gridLineWidth: 0,
                                endOnTick: !1,
                                maxPadding: 0,
                                lineColor: "#c30f0f",
                                lineWidth: 1,
                                tickWidth: 1,
                                tickColor: "#c30f0f",
                                tickLength: 5,
                                gridLineColor: "#003849",
                                labels: {
                                    format: "{value}"
                                },
                                title: {
                                    text: '{{trans("messages.power-hp")}}'
                                }
                            }, {
                                min: 0,
                                max: chartmaxnm,
                                endOnTick: !1,
                                maxPadding: 0,
                                lineColor: "#0077bd",
                                lineWidth: 1,
                                tickWidth: 1,
                                tickColor: "#0077bd",
                                tickLength: 5,
                                gridLineColor: "#0077bd",
                                gridLineWidth: 0,
                                gridLineColor: "#0077bd",
                                labels: {
                                    format: "{value}"
                                },
                                title: {
                                    text: '{{trans("messages.torque-nm")}}'
                                },
                                opposite: !0
                            }],
                            tooltip: {
                                headerFormat: "",
                                borderRadius: 13,
                                borderColor: null,
                                borderWidth: 2,
                                pointFormat: "{series.name}:<br><b>{point.y} {series.lopas}</b>",
                                crosshairs: [{
                                    width: 1,
                                    color: "#666",
                                    dashStyle: "shortdot"
                                }, {
                                    width: 1,
                                    color: "#666",
                                    dashStyle: "shortdot"
                                }]
                            },
                            legend: {
                                itemStyle: {
                                    color: "#949494",
                                    fontWeight: "bold"
                                },
                                itemHoverStyle: {
                                    color: "#fff"
                                },
                                itemHiddenStyle: {
                                    color: "#333333"
                                }
                            },
                            legend: {
                                itemStyle: {
                                    color: "#949494",
                                    fontWeight: "bold"
                                },
                                itemHoverStyle: {
                                    color: "#fff"
                                },
                                itemHiddenStyle: {
                                    color: "#333333"
                                }
                            },
                            exporting: {
                                enabled: !1
                            },
                            series: [{
                                name: '{{trans("messages.default-hp")}}',
                                data: h,
                                color: "#a30000",
                                zIndex: 90
                            }, {
                                name: '{{trans("messages.modified-hp")}}',
                                data: c,
                                dashStyle: "shortdot",
                                color: "#ff0000",
                                zIndex: 80
                            }, {
                                name: '{{trans("messages.default-nm")}}',
                                data: p,
                                yAxis: 1,
                                color: "#0077bd"
                            }, {
                                name: '{{trans("messages.modified-nm")}}',
                                data: m,
                                dashStyle: "shortdot",
                                yAxis: 1,
                                color: "#00a0ff"
                            }]
                        })
                    })
                })
            }
        })
    }
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    }), $("#validateForm").validate({
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
    }), $(".type").select2({
        width: '100%',
        placeholder: "{{trans('messages.type')}}",
        templateResult: e,
        templateSelection: function(e) {
            return e.text
        },
        escapeMarkup: function(e) {
            return e
        }
    }), $(".make").select2({
        width: '100%',
        placeholder: "{{trans('messages.make')}}",
        templateResult: e,
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
        $(".model").html("<option></option>"), $(".engine").html("<option></option>"), t("make", $(this).val(), null, !1)
    }), $(".make").on("change", function() {
        $(".engine").html("<option></option>"), t("model", $(this).find(":selected").attr("data-id"), null, !1)
    }), $(".model").on("change", function() {
        t("engine", $(this).find(":selected").attr("data-id"), null, !1)
    }), $(".engine").change(function() {
        o($(this).find(":selected").attr("data-id"), $(".type").val(), $(".model").find(":selected").attr("data-id"))
    }), t("make", 747, "{{$make}}", !0), t("model", "{{fetch_id($make)}}", "{{$model}}", !0), t("engine", "{{fetch_id($model)}}", "{{$engine}}", !0);
    o("{{fetch_id($engine)}}", 747, "{{fetch_id($model)}}")
});
$(document).ready(function() {
    var type = '{{$type}}';
    var make = '{{$make}}';
    var model = '{{$model}}';
    var engine = '{{$engine}}';
    if (type && type !== 747 && !make && !model && !engine) {
        $('.type').val(type).trigger('change');
    }
});
$('#contact').click(function() {
    $(".formType").val($(".type").val()).trigger("change"), $(".formMake").val($(".make option:selected").text()), $(".formModel").val($(".model option:selected").text()), $(".formEngine").val($(".engine option:selected").text());
})
</script>
@endsection
