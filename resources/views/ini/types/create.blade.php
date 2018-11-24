@extends('layouts.app')

@section('title', 'Create')

@section('content')
    @php
        $formParams = [
            'formTitle'   => 'New INI Type',
            'actionRoute' => route('ini.types.store'),
            'cancelRoute' => route('ini.types.index'),
            'editing' => false,
        ];
    @endphp
    @include('ini.types.partials.form', $formParams)
@endsection
