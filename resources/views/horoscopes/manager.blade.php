@extends('layouts.manage')
@section('content')
<div class="column" id="app">
        <Add :openmodal='addActive' @close-request='close' @open-regular-request='openregular' @open-chinese-request='openchinese' @open-mayan-request='openmayan'></Add>
        <Regular :openregular='regularActive' @close-request='closeregular' @open-add-request='openAdd'></Regular>
        <Chinese :openchinese='chineseActive' @close-request='closechinese' @open-add-request='openAdd'></Chinese>
        <Mayan :openmayan='mayanActive' @close-request='closemayan' @open-add-request='openAdd'></Mayan>
        <List :openlist='listActive' @close-request='closelist' @open-edit-request='openedit($event)' @open-add-request='openAdd'></List>
        {{-- <Edit :openedit='editActive' :item='selectedItem' @close-request='closeedit' @open-list-request='openlist'></Edit> --}}
    <a class="button is-primary is-outlined is-block is-alt is-centered is-medium" @click="openAdd">Create New Horoscope</a><br>
    <a class="button is-primary is-outlined is-block is-alt is-centered is-medium" @click="openList" @close-request='closelist'>Horoscopes List</a>
</div>
@endsection
{{-- @section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote,#summernote1,#summernote2').summernote();
        });
    </script>
@endsection --}}
