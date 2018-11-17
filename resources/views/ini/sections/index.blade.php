@extends('layouts.app')

@section('title', 'Ini Sections')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>

@endsection

@section('content')
    <p>{{$iniType->name}}</p>
    <table class="table" border="1">
        <thead>
            <tr>
                <th>Section Name</th>
                <th>Description</th>
                <th>Key Count</th>
            </tr>
        </thead>
    @foreach($iniSections as $iniSection)
        <tr>
            <td>{{$iniSection->name}}</td>
            <td>{{$iniSection->description}}</td>
            <td>{{$iniSection->keys->count()}}</td>
        </tr>
    @endforeach
    </table>

    <button>Add New Section</button>
@endsection
