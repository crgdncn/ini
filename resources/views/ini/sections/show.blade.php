@extends('layouts.app')

@section('title', 'File Type')

@section('content')
     <p class="breadcrumb">
        <a href="{{route('ini.types.index')}}"> INI File Types </a>
        / <a href="{{route('ini.types.show', $type)}}">{{$type->name}}</a>
        / {{$section->name}}
    </p>
    <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <th class="td-name th-color">ID</th>
                <td>{{$section->id}}</td>
            </tr>
            <tr>
                <th class="td-name th-color">Name</th>
                <td>{{$section->name}}</td>
            </tr>
            <tr>
                <th class="td-name th-color">Description</th>
                <td>{{$section->description}}</td>
            </tr>
        </tbody>
    </table>

    <p>Keys</p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr class="th-color">
                <th class="td-id">ID</th>
                <th class="td-name">Name</th>
                <th class="td-description">Description</th>
                <th class="td-buttons">Actions</th>
            </tr>
        </thead>
        <tbody id="tbody">
        @foreach($section->keys as $key)
            @include('ini.keys.partials.iniKeyTableRow')
        @endforeach
        </tbody>
    </table>
    <button id="btn-add-new-key" class="btn btn-primary" onClick="getFormModal('{{route('ini.types.sections.keys.create', [$type, $section])}}', 'New Key')">Add New Key</button>
@endsection
