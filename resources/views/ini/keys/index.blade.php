@extends('layouts.app')

@section('title', 'Section Keys')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>

@endsection

@section('content')
    <p>{{$iniType->name}}/{{$iniSection->name}}</p>
    <table class="table" border="1">
        <thead>
            <tr>
                <th>Key Name</th>
                <th>Description</th>
            </tr>
        </thead>
    @foreach($iniKeys as $iniKey)
        <tr>
            <td>{{$iniKey->name}}</td>
            <th>{{$iniKey->description}}</th>
        </tr>
    @endforeach
    </table>

    <button>Add New Key</button>
@endsection
