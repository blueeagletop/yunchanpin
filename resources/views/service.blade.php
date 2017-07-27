@extends('master')

@section('title', '云产品——顶级的云服务提供商')

<link href="public/css/templatemo_style.css" rel="stylesheet" type="text/css" />

@section('content')

<div id="templatemo_header_wrapper">
<!-- Free Web Templates from TemplateMo.com -->
    <div id="templatemo_header">
    	<div id="logo"></div>
        <div id="templatemo_menu">
            <ul>
                @foreach($homeNav as $nav)
                <li><a href="{{$nav->url}}" 
                       @if($nav->id == 2)
                       class="current"
                       @else
                       @endif
                       ><span></span>{{$nav->title}}</a></li>
                @endforeach
            </ul>   
            <div class="cleaner"></div> 	
        </div> <!-- end of menu -->
        <div class="cleaner"></div>
    </div> <!-- end of header -->
</div> <!-- end of header wrapper -->


      
@endsection

@section('my-js')

@endsection