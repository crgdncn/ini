@extends('layouts.app')

@section('title', 'File Type')

@section('content')
    <p>
        <a href="{{route('ini.types.index')}}"> INI File Types </a>
        / {{$type->name}}
    </p>
    <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <th width="5%">ID</th>
                <td>{{$type->id}}</td>
            </tr>
            <tr>
                <th width="20%">Name</th>
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
                <th class="text-center">Description</th>
                <th width="10%" style="text-align:center"># Keys</th>
                <th width="10%"></th>
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
