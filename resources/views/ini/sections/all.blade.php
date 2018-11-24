@extends('layouts.app')

@section('title', 'All Sections')

@section('content')
    <p>All Sections</p>

    @foreach($all as $iniType)
      <ul>
        <li>{{$iniType->name}}</li>
        <li>
            <ul>
                @foreach($iniType->sections as $section)
                <li>{{$section->name}}</li>
                @endforeach
            </ul>
        </li>
    @endforeach
@endsection
