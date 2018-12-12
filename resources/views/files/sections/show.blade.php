@extends('layouts.app')

@section('title', 'File Section')

@section('content')
     <p>
        <a href="{{route('files.files.index')}}"> Files </a>
        / <a href="{{route('files.files.show', $file)}}">{{$file->name}}</a>
        / {{$section->name}}
    </p>
    <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <th width="5%">ID</th>
                <td>{{$section->id}}</td>
            </tr>
            <tr>
                <th width="20%">Name</th>
                <td>{{$section->name}}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{$section->description}}</td>
            </tr>
        </tbody>
    </table>

    <p>Keys</p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr class="text-left">
                <th width="5%">ID</th>
                <th width="20%">Name</th>
                <th class="text-center">Description</th>
                <th width="10%"></th>
            </tr>
        </thead>
        <tbody id="tbody">
        @foreach($section->keys as $key)
            @include('files.file.keys.partials.keyTableRow')
        @endforeach
        </tbody>
    </table>
    <button class="btn btn-primary" onClick="getFormModal('{ {route('ini.types.sections.keys.create', [$type, $section])} }', 'New Key')">Add Keys</button>
@endsection
