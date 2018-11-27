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
                <td><button class="btn btn-sm" onClick="openModal('/ini/types/{{$iniType->id}}/edit', 'Edit INI Type')">Edit</button></td>
            </tr>
        @endforeach
    </table>

    <button class="btn btn-primary" onClick="openModal('{{route('ini.types.create')}}', 'New INI Type')">Add New File Type</button>
@endsection
