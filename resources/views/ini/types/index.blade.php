@extends('layouts.app')

@section('title', 'Ini File Types')

@section('content')
    <p class="breadcrumb">Ini File Types</p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr class="th-color">
                <th class="td-id">ID</th>
                <th class="td-name">File Type</th>
                <th class="td-description d-none d-md-table-cell">Description</th>
                <th class="td-count d-none d-md-table-cell">#Sections</th>
                <th class="td-buttons">Actions</th>
            </tr>
        </thead>
        <tbody id="tbody">
        @foreach($types as $type)
            @include('ini.types.partials.iniTypeTableRow')
        @endforeach
        </tbody>
    </table>
    <button id="btn-add-new-file-type" class="btn btn-primary" onClick="getFormModal('{{relativeRoute('ini.types.create')}}', 'New INI Type')">Add New File Type</button>
@endsection
