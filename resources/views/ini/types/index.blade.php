@extends('layouts.app')

@section('title', 'Ini File Types')

@section('content')
    <p>Ini File Types</p>
    <table class="table" border="1">
        <thead>
            <tr>
                <th>File Type</th>
                <th>Description</th>
                <th>Section Count</th>
                <th></th>
            </tr>
        </thead>
        @foreach($iniTypes as $iniType)
            <tr>
                <td>{{$iniType->name}}</td>
                <td>{{$iniType->description}}</td>
                <th>{{$iniType->sections->count()}}</th>
                <td><a href="{{route('ini.types.edit', ['iniType' => $iniType])}}"><button>Edit</button></a></td>
            </tr>
        @endforeach
    </table>

    <a href="{{route('ini.types.create')}}"><button>Add New File Type</button></a>
@endsection
