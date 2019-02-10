@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    <blockquote>
                        <p class="text-success">
                            Due to resource limitation, we allow limited channels currently.
                        </p>
                        <p class="text-success">
                            Contact us if you want to add more channels.
                        </p>
                    </blockquote>
                @endif
                <div class="card-header">
                    <h3>Dashboard</h3>
                    <a class="btn btn-info" href="{{route('channels.create')}}">Add Channel</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Channel Name</th>
                                <th>Channel Id</th>
                                <th>Status</th>
                                <th>Added</th>
                                <th>Updated</th>
                                <th>#</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($channels as $channel)
                                <tr>
                                    <td>{{$channel->channel_name}}</td>
                                    <td>{{$channel->channel_id}}</td>
                                    <td>{{$channel->status == 1 ? 'Active' : 'Inactive'}}</td>
                                    <td>{{$channel->created_at}}</td>
                                    <td>{{$channel->updated_at}}</td>
                                    <td><a class="btn btn-default" href="{{route('channels.edit', $channel->id)}}">Edit</a></td>
                                    <td><a class="btn btn-info" href="{{route('channels.show', $channel->id)}}">View Stat</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
