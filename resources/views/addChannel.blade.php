@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="card">
                <div class="card-header">Add Channel</div>
                 @include('layouts.errors')
                <div class="card-body">
                    <form action="{{route('channels.store')}}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="channel_name">Channel Name</label>
                            <input type="text" class="form-control" id="channel_name" name="channel_name" placeholder="Channel Name" >
                        </div>
                        <div class="form-group">
                            <label for="channel_id">Channel ID</label>
                            <input type="text" class="form-control" id="channel_id" name="channel_id" placeholder="Channel ID" >
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <input type="submit" name="add_channel" class="btn btn-info" value="Add Channel" /> <a class="btn btn-warning" href="{{ URL::previous() }}">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
