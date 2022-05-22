@extends('layouts.app')

@section('content')
    <notification-list user="{{ Auth::user()->id }}"></notification-list>
@endsection
