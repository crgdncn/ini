@extends('layouts.app')

@section('title', 'Ini File Types')

@section('content')
    <p class="breadcrumb">Ini File Types</p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr class="th-color">
                <th class="td-id">ID</th>
                <th class="td-name">File Type</th>
                <th class="text-description d-none d-md-block">Description</th>
                <th class="td-count">#Sections</th>
                <th class="td-buttons">Actions</th>
            </tr>
        </thead>
        <tbody id="tbody">
        @foreach($types as $type)
            @include('ini.types.partials.iniTypeTableRow')
        @endforeach
        </tbody>
    </table>
    <button id="btn-add-new-file-type" class="btn btn-primary" onClick="getFormModal('{{route('ini.types.create')}}', 'New INI Type')">Add New File Type</button>
@endsection
