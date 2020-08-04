@extends('master.layout')

@section('title','Home')

@section('content')

    @includeIf('components.home.banner')

    @includeIf('components.home.service')

    @includeIf('components.home.course')

    @includeIf('components.home.project')

    @includeIf('components.home.contact')


@endsection


