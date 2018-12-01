@extends('layouts.app')

@section('title', 'All Sections')

@section('content')
    <p>All keys</p>

    <ul>
    @foreach($all as $type)
        <li>
            {{$type->name}}
            <ul>
                @foreach($type->sections as $section)
                    <li>
                        {{$section->name}} <br>
                        <ul>
                        @foreach($section->keys as $key)
                            <li>$key->name</li>
                        @endforeach
                        </ul>
                    </li>
                @endforeach
            </ul>
        </li>
    @endforeach
    <ul>
@endsection
