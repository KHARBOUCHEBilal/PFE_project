<?php $home = "home" ?>
@extends('layouts._master')
@section('title', 'PFE Distributor')
@section('content')

@include('pages.client.sections._hero')
@if($finale_list_status=='1')
@include('pages.client.sections._finale-list')
@endif
@include('pages.client.sections._teachers')
@include('pages.client.sections._footer')
@stop