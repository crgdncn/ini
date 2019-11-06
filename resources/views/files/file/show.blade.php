@extends('layouts.app')

@section('title', 'File')

@section('content')
    <p class="breadcrumb">
        <a href="{{relativeRoute('files.file.index')}}"> Files </a>
        / {{$file->name}}
    </p>
    <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <th class="td-name th-color">ID</th>
                <td>{{$file->id}}</td>
            </tr>
            <tr>
                <th class="td-name th-color">File Name</th>
                <td>{{$file->name}}</td>
            </tr>
            <tr>
                <th class="td-name th-color">Type</th>
                <td>{{$type->name}}</td>
            </tr>
            <tr>
                <th class="td-name th-color">Description</th>
                <td>{{$type->description}}</td>
            </tr>
        </tbody>
    </table>
    <p>Sections</p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr class="th-color">
                <th class="td-id">ID</th>
                <th class="td-name">Name</th>
                <th class="td-count""># Keys</th>
                <th class="td-buttons">Actions</th>
            </tr>
        </thead>
        <tbody id="tbody">
        @foreach($file->sections as $section)
            @include('files.sections.partials.tableRow')
        @endforeach
        </tbody>
    </table>
    <button class="btn btn-primary" onClick="getFormModal('{{relativeRoute('files.file.sections.create', $file)}}', 'Select All Sections')">Add Sections</button>
@endsection
