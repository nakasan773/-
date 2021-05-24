<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
    public function index(Tweet $tweet, Follower $follower)
    {
        $user = auth()->user();
        //$test2 = Tweet::all();
        //$test2 = Tweet::with('cities')->where('city_id', $tweet->id);
        //dd($test2);
        
        //dd($collection);
        
        //dd($city);
        
        //->with('cities', 'tweets.city_id', '=', 'cities.id')->get();
        
        $follow_ids = $follower->followingIds($user->id);
        // followed_idだけ抜き出す
        $following_ids = $follow_ids->pluck('followed_id')->toArray();
        
        
        $timelines = $tweet->with('cities')->where('city_id', $tweet->id)->getTimelines($user->id, $following_ids);
        
    
        //$tweet = Tweet::all();
        
        //$timelines = $tweet->with(['city' => function ($query) use($prefecture_id) {
        //$query->where('id', $prefecture_id);
        //}]) 
        //->get();
        
        //->with('city', function ($query) {
        //$query->where('ci', 'like', 'foo%');
        //})->get();
        
        //$allfollowing_ids = $following_ids->getTweetCity($tweet->id);
        //
        
        //with('city')->where('city_id', $tweet->id)->
        
        
        //$cityNames = $city->getCity($user->id, $following_ids);
        
        //$tweetId = Tweet::all();
        
        
        //$cityNames = City::find($tweetId->city_id);
        //dd($cityNames);
        
        //foreach ($cityNames as $cityName) {
        //$cityprace = City::find($cityName->cities_id);
        //}
        
        return view('tweets.index', [
            'user' => $user,
            'timelines' => $timelines,
            //'cityNames' => $cityNames,
            //'cityprace' => $cityprace,
            //'city' => $city,
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
    public function store(Request $request, Tweet $tweet)
    {
        $user = auth()->user();
        
        $data = $request->all();
         
        //$filename = $data->file('image')->getClientOriginalName();
        //dd($filename);
        //$textname = $data['text'];
        
        
        $validator = Validator::make($data, [
            'text' => ['required', 'string', 'max:140'],
            'image' => ['required', 'string', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'city_id' => ['required']
        ]);
        
        $tweet = new Tweet();
        
        $tweet->tweetStore($user->id, $data);
        $tweet->city_id = $data['city_id'];
        
        //投稿した画像をDBに格納させる
        if($request->file('image')->isValid()) {
            $filename = $request->file('image')->getClientOriginalName();
            $request->image->storeAs('public/images/', date("Ymd").'_'.$filename);
            $tweet->image = date("Ymd").'_'.$filename;
        }
        
        //$imagename = $filename->getClientOriginalName()->store('public/images');    //storageフォルダに投稿した画像を保存しファイルパスを格納
        //$imagefile = $imagename->->store('public/image_file/');
               //ファイル名から「public/」を取り除く
        $tweet->save();
        
        
        return redirect('tweets');
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
    public function update(Request $request, Tweet $tweet)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'text' => ['required', 'string', 'max:140']
        ]);

        $validator->validate();
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
