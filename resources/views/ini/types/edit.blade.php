@extends('layouts.app')

@section('title', 'Edit')

@section('content')
    @php
        $formParams = [
            'formTitle'   => 'Edit INI Type',
            'actionRoute' => route('ini.types.update', ['iniType' => $iniType]),
            'cancelRoute' => route('ini.types.index'),
            'editing' => true,
        ];
    @endphp
    @include('ini.types.partials.form', $formParams)
@endsection
