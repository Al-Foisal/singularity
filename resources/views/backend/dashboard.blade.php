@extends('backend.layouts.master')
@section('title', 'Dashboard')
@section('cssLink')
@endsection
@section('cssStyle')
@endsection

@section('backend')
    <h1>{{ auth()->user()->email }}</h1>
@endsection

@section('jsSource')
@endsection
@section('jsScript')
@endsection
