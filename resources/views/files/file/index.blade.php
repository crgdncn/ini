@extends('layouts.app')

@section('title', 'Ini File Management')

@section('content')
    <p class="breadcrumb">Files</p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr class="th-color">
                <th class="td-id">ID</th>
                <th class="td-name">File Name</th>
                <th class="td-value">File Type</th>
                <th class="td-buttons"></th>
            </tr>
        </thead>
        <tbody id="tbody">
        @foreach($files as $file)
            @include('files.file.partials.fileTableRow')
        @endforeach
        </tbody>
    </table>
    <button class="btn btn-primary" onClick="getFormModal('{{route('files.file.create')}}', 'New File')">Create New File</button>
@endsection
