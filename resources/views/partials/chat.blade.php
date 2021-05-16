@extends('layouts.chat-layout')
@section('content')

	{{-- <livewire:chat-form :receiver_id="$receiver_id"> --}}
    @livewire("chat-form", array("receiver_id" => $receiver_id))
    @livewire("chat-list", array("receiver_id" => $receiver_id))
@endsection
