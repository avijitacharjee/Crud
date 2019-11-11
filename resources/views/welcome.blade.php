@extends('layouts.app')
@section('content')
    <div class="container">
        @if(session('successMessage'))
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert"></button>
                <strong>Well done</strong>
                {{ session('successMessage')}}
            </div>

        @endif
    </div>

@endsection()

