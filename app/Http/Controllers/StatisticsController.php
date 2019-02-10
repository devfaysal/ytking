<?php

namespace App\Http\Controllers;

use App\Statistics;
use Illuminate\Http\Request;
use App\Channel;

class StatisticsController extends Controller
{
    public function store()
    {
        $channels = Channel::where('status', 1)->get();
        $api_key = config('services.youtube.api_key');

        foreach($channels as $channel){
            $url = 'https://www.googleapis.com/youtube/v3/channels?part=statistics&id=' . $channel->channel_id . '&key=' . $api_key;

            $data = json_decode(file_get_contents($url));
            $viewCount = $data->items[0]->statistics->viewCount;
            $subscriberCount = $data->items[0]->statistics->subscriberCount;
            $videoCount = $data->items[0]->statistics->videoCount;

            $statistics = new Statistics;
            $statistics->channel_id = $channel->id;

            $statistics->viewCount = $viewCount;
            $statistics->subscriberCount = $subscriberCount;
            $statistics->videoCount = $videoCount;


            $stat = Statistics::where('channel_id', $channel->id)->orderBy('created_at', 'desc')->first();

            if($stat != NULL){
                $statistics->todaysView = $viewCount - $stat->viewCount;
                $statistics->todaysSubscriber = $subscriberCount - $stat->subscriberCount;
                $statistics->todaysVideo = $videoCount - $stat->videoCount;
            }

            if ($statistics->save()) {
                echo $channel->id . ': Successfull' . '<br/>';
            } else {
                echo $channel->id . ': Failed' . '<br/>';
            }
        }
    }
}
