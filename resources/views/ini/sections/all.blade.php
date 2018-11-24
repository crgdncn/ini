@extends('layouts.app')

@section('title', 'All Sections')

@section('content')
    <p>All Ini Type Sections</p>

    <ul>
    @foreach($all as $iniType)
        <li>
            {{$iniType->name}}
            <ul>
                @foreach($iniType->sections as $section)
                    <li>
                        {{$section->name}}
                    </li>
                @endforeach
            </ul>
        </li>
    @endforeach
    <ul>
@endsection
