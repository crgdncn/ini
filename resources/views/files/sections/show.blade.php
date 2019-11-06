@extends('layouts.app')

@section('title', 'File Section')

@section('content')
     <p class="breadcrumb">
        <a href="{{relativeRoute('files.file.index')}}"> Files </a>
        / <a href="{{relativeRoute('files.file.show', $file)}}">{{$file->name}}</a>
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
                <th class="td-value d-none d-md-table-cell">Value</th>
                <th class="td-buttons">Actions</th>
            </tr>
        </thead>
        <tbody id="tbody">
        @foreach($section->keys as $key)
            @include('files.keys.partials.keyTableRow')
        @endforeach
        </tbody>
    </table>
    <button class="btn btn-primary" onClick="getFormModal('{{relativeRoute('files.file.sections.keys.create', [$file, $section])}}', 'Add Key')">Add Key</button>
@endsection
