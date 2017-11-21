<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Statistics;
use Illuminate\Http\Request;
use Auth;

class ChannelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $channels = Channel::where('user_id', $user_id)->get();
        return view('channels', compact('channels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::user()->id;
        $channels = Channel::where('user_id', $user_id)->get();
        if($channels->count()<2){
            return view('addChannel');
        }
        return redirect()->back()->with('error', 'Only two channels are allowed');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation
        $this->validate(request(), [
            'channel_name'  => 'required',
            'channel_id'    => 'required',
            'status'        => 'required',
        ]);

        $channel = new Channel;

        $channel->user_id = Auth::user()->id;
        $channel->channel_name = $request->channel_name;
        $channel->channel_id = $request->channel_id;
        $channel->status = $request->status;

        $channel->save();

        return redirect()->route('channels.index')->with('success', 'Channel Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function show(Channel $channel)
    {
        return view('channelDetails', compact('channel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function edit(Channel $channel)
    {
        return view('editChannel', compact('channel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Channel $channel)
    {
        $channel->channel_name = $request->channel_name;
        $channel->channel_id = $request->channel_id;
        $channel->status = $request->status;

        $channel->save();

        return redirect()->route('channels.index')->with('success', 'Channel Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Channel  $channel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Channel $channel)
    {
        //
    }
}
