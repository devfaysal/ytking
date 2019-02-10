@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading text-center">Login</div>

                <div class="panel-body">
                    <p class="text-center"><a href="{{ url('/auth/facebook') }}" class="btn btn-info">Login With Facebook</a></p>
                    <p class="text-center"><a href="{{ url('/auth/github') }}" class="btn btn-info">Login With Github</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
