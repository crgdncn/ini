@extends('layouts.app')

@section('title', 'File Type')

@section('content')
    <p class="breadcrumb">
        <a href="{{route('ini.types.index')}}"> INI File Types </a>
        / {{$type->name}}
    </p>
    <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <th class="th-color td-name">ID</th>
                <td>{{$type->id}}</td>
            </tr>
            <tr>
                <th class="th-color td-name">Name</th>
                <td>{{$type->name}}</td>
            </tr>
            <tr>
                <th class="th-color td-name">Description</th>
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
                <th class="td-description">Description</th>
                <th class="td-count">#Keys</th>
                <th class="td-buttons"></th>
            </tr>
        </thead>
        <tbody id="tbody">
        @foreach($type->sections as $section)
            @include('ini.sections.partials.iniSectionTableRow')
        @endforeach
        </tbody>
    </table>
    <button class="btn btn-primary" onClick="getFormModal('{{route('ini.types.sections.create', $type)}}', 'New Section')">Add New Section</button>
@endsection
