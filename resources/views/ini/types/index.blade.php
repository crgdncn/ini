@extends('layouts.app')

@section('title', 'Ini File Types')

@section('content')
    <p>Ini File Types</p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr class="text-left">
                <th width="5%">ID</th>
                <th width="20%">File Type</th>
                <th class="text-center">Description</th>
                <th width="15%"># Sections</th>
                <th width="5%"></th>
            </tr>
        </thead>
        <tbody id="tbody">
        @foreach($iniTypes as $iniType)
            @include('ini.types.includes.iniTypeTableRow')
        @endforeach
        </tbody>
    </table>
    <button class="btn btn-primary" onClick="getFormModal('{{route('ini.types.create')}}', 'New INI Type')">Add New File Type</button>
@endsection
