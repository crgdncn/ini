@extends('layouts.app')

@section('title', 'File Type')

@section('content')
    <p class="breadcrumb">
        <a href="{{relativeRoute('ini.types.index')}}"> INI File Types </a>
        / {{$type->name}}
    </p>
    <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <td class="th-color td-name">ID</td>
                <td>{{$type->id}}</td>
            </tr>
            <tr>
                <td class="th-color td-name">Name</td>
                <td>{{$type->name}}</td>
            </tr>
            <tr>
                <td class="th-color td-name">Description</td>
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
                <th class="td-description d-none d-md-table-cell">Description</th>
                <th class="td-count">#Keys</th>
                <th class="td-buttons">Actions</th>
            </tr>
        </thead>
        <tbody id="tbody">
        @foreach($type->sections as $section)
            @include('ini.sections.partials.iniSectionTableRow')
        @endforeach
        </tbody>
    </table>
    <button id="btn-add-new-section" class="btn btn-primary" onClick="getFormModal('{{relativeRoute('ini.types.sections.create', $type)}}', 'New Section')">Add New Section</button>
@endsection
