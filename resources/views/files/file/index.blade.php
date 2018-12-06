@extends('layouts.app')

@section('title', 'Ini File Management')

@section('content')
    <p>Files</p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr class="text-left">
                <th width="5%">ID</th>
                <th width="20%">File Name</th>
                <th width="10%" style="text-align:center">File Type</th>
                <th width="10%"></th>
            </tr>
        </thead>
        <tbody id="tbody">
        @foreach($files as $file)
            @include('files.file.partials.fileTableRow')
        @endforeach
        </tbody>
    </table>
    <button class="btn btn-primary" onClick="getFormModal('{{route('files.files.create')}}', 'New File')">Create New File</button>
@endsection
