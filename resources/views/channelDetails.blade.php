@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-warning" href="{{ URL::previous() }}">Back</a>
                    <h3>Channel Name: <a href="https://www.youtube.com/channel/{{$channel->channel_id}}" target="_blank">{{$channel->channel_name}}</a></h3>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>View Count</th>
                                <th>Today's View</th>
                                <th>Subscriber Count</th>
                                <th>Today's Subscriber</th>
                                <th>Video Count</th>
                                <th>Today's Video</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($channel->statistics as $statistics)
                            <tr>
                                <td>{{$statistics->viewCount}}</td>
                                <td>{{$statistics->todaysView}}</td>
                                <td>{{$statistics->subscriberCount}}</td>
                                <td>{{$statistics->todaysSubscriber}}</td>
                                <td>{{$statistics->videoCount}}</td>
                                <td>{{$statistics->todaysVideo}}</td>
                                <td>{{$statistics->created_at}}</td>
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
