@extends('layouts.app')

@section('title', 'File')

@section('content')
    <p>
        <a href="{{route('files.files.index')}}"> Files </a>
        / {{$file->name}}
    </p>
    <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <th width="5%">ID</th>
                <td>{{$file->id}}</td>
            </tr>
            <tr>
                <th width="5%">File Name</th>
                <td>{{$file->name}}</td>
            </tr>
            <tr>
                <th width="20%">Type</th>
                <td>{{$type->name}}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{$type->description}}</td>
            </tr>
        </tbody>
    </table>
    <p>Sections</p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr class="text-left">
                <th width="5%">ID</th>
                <th width="20%">Name</th>
                <th width="10%" style="text-align:center"># Keys</th>
                <th width="10%"></th>
            </tr>
        </thead>
        <tbody id="tbody">
        @foreach($file->sections as $section)
            @include('files.sections.tableRow')
        @endforeach
        </tbody>
    </table>
    <button class="btn btn-primary" onClick="getFormModal('{{route('files.file.sections.create', $file)}}', 'Select All Sections')">Add Sections</button>
@endsection
