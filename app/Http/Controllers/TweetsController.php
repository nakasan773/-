<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValiRequests;
use App\Http\Requests\TweetRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Tweet;
use App\Models\Comment;
use App\Models\Follower;
use App\Models\City;

class TweetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Tweet $tweet, Follower $follower)
    {
        $user = auth()->user();
        $allcities = City::get();

        $timelines = Tweet::with('city')
                            ->when($request->tweet_text, function ($query) use ($request) {
                                return $query->where('text', 'like', "%$request->tweet_text%");
                            })
                            ->when($request->tweet_city, function ($query) use ($request) {
                                return $query->where('city_id', 'like', "%$request->tweet_city%");
                            })
                            ->orderByRaw('created_at desc')
                            ->paginate(10);
                                
        return view('tweets.index', [
            'user' => $user,
            'timelines' => $timelines,
            'allcities' => $allcities,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();

        return view('tweets.create', [
            'cities' => City::all(),
            'user' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValiRequests $request, Tweet $tweet)
    {
        $tweet = new Tweet();
        $data = $request->all();
        $user = auth()->user();
        $tweet->tweetStore($user->id, $data);
        $tweet->city_id = $data['city_id'];

        if($request->file('image')->isValid()) {
            $file = $data['image'];
            $path = Storage::disk('s3')->put('/',$file, 'public');
            $tweet->image = $path;
        }

        $tweet->save();

        return redirect('/tweets');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tweet $tweet, Comment $comment)
    {
        $user = auth()->user();
        $tweet = $tweet->getTweet($tweet->id);

        $comments = $comment->getComments($tweet->id);
        $cityname = City::find($tweet->city_id);

        return view('tweets.show', [
            'user' => $user,
            'tweet' => $tweet,
            'comments' => $comments,
            'cityname' => $cityname,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tweet $tweet)
    {
        $user = auth()->user();
        $tweets = $tweet->getEditTweet($user->id, $tweet->id);

        if (!isset($tweets)) {
            return redirect('tweets');
        }

        return view('tweets.edit', [
            'user'   => $user,
            'tweets' => $tweets
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TweetRequest $request, Tweet $tweet)
    {
        $data = $request->all();
        $tweet->tweetUpdate($tweet->id, $data);

        return redirect('tweets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tweet $tweet)
    {
        $user = auth()->user();
        $tweet->tweetDestroy($user->id, $tweet->id);

        return back();
    }
}
