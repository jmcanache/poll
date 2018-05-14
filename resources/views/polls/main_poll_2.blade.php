@extends('layouts.poll_2')
@section('content')
	<input type="hidden" class="current_poll" id="{{ $current_poll }}">
	<div id="poll_description">
		{!! $poll_description !!}
	</div>
    <h3>
        <b id="indicator_title">
            {!! $indicator_title !!}
        </b>
    </h3>

    <br>

    <p id="indicator_text">
        {!! $indicator_text !!}
    </p>

    <br>

    <div id="indicator_body"></div>

    <button type="button" class="btn btn-md  btn-block center next" id="2">
        <b id="button-text">NEXT</b>
    </button>

    <br>
    
    <div id="previous"></div>
    
    <br>

    <button type="button" class="btn btn-block help" data-toggle="popover" data-content="If you need some help from us, please contact  info@bestarchitecturemasters.com">
        <b>HELP!</b>
    </button>
@stop