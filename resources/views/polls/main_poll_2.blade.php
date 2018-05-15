@extends('layouts.poll_2')
@section('content')
	<input type="hidden" class="current_poll" id="{{ $current_poll }}">
    <div>
        @if($edit_active) 
            <div class="text-right">
                    <button type="button" class="btn btn-warning" id="btn_edit" indicator="1">Edit</button>
                    <button type="button" class="btn btn-success" id="btn_save" indicator="1">Save</button>
                    <button type="button" class="btn btn-danger"  id="btn_cancel" indicator="1" disabled="true">Cancel</button>
            </div>
            <br>
        @endif
    </div>
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

    <button type="button" class="btn btn-md  btn-block center next black-button" id="2">
        <b id="button-text">NEXT</b>
    </button>

    <br>
    
    <div id="previous"></div>
    
    <br>

    <button type="button" class="btn btn-block help" data-toggle="popover" data-content="If you need some help from us, please contact  info@bestarchitecturemasters.com">
        <b>HELP!</b>
    </button>
@stop