@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Channel</div>

                <div class="panel-body">
                    <form action="{{route('channels.update', $channel->id)}}" method="POST">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label for="channel_name">Channel Name</label>
                            <input value="{{$channel->channel_name}}" type="text" class="form-control" id="channel_name" name="channel_name" placeholder="Channel Name" required>
                        </div>
                        <div class="form-group">
                            <label for="channel_id">Channel ID</label>
                            <input value="{{$channel->channel_id}}" type="text" class="form-control" id="channel_id" name="channel_id" placeholder="Channel ID" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="1" {{$channel->status == 1 ? 'selected' : ''}}>Active</option>
                                <option value="0" {{$channel->status == 0 ? 'selected' : ''}}>Inactive</option>
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
