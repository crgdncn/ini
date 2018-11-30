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
                <th width="10%" style="text-align:center"># Sections</th>
                <th width="10%"></th>
            </tr>
        </thead>
        <tbody id="tbody">
        @foreach($types as $type)
            @include('ini.types.partials.iniTypeTableRow')
        @endforeach
        </tbody>
    </table>
    <button class="btn btn-primary" onClick="getFormModal('{{route('ini.types.create')}}', 'New INI Type')">Add New File Type</button>
@endsection
