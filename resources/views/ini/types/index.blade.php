@extends('layouts.app')

@section('title', 'Ini File Types')

@section('content')
    <p>Ini File Types</p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr class="text-left">
                <th width="20%">File Type</th>
                <th class="text-center">Description</th>
                <th width="15%"># Sections</th>
                <th width="5%"></th>
            </tr>
        </thead>
        @foreach($iniTypes as $iniType)
            <tr>
                <td>{{$iniType->name}}</td>
                <td>{{ str_limit($iniType->description, 200) }}</td>
                <th>{{$iniType->sections->count()}}</th>
                <td><a href="{{route('ini.types.edit', ['iniType' => $iniType])}}"><button>Edit</button></a></td>
            </tr>
        @endforeach
    </table>

    <a href="{{route('ini.types.create')}}"><button class="btn btn-primary">Add New File Type</button></a>
@endsection
