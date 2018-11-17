@extends('layouts.app')

@section('title', 'Ini File Types')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>

@endsection

@section('content')
    <p>Ini File Types</p>
    <table class="table" border="1">
        <thead>
            <tr>
                <th>File Type</th>
                <th>Description</th>
                <th>Section Count</th>
            </tr>
        </thead>
    @foreach($iniTypes as $iniType)
        <tr>
            <td>{{$iniType->name}}</td>
            <td>{{$iiType->description}}</td>
            <th>{{$iniType->sections->count()}}</th>
        </tr>
    @endforeach
    </table>

    <button>Add New File Type</button>
@endsection
