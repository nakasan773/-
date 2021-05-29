<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValiRequests;
use App\Http\Requests\TweetRequest;
use Illuminate\Support\Facades\Storage;
//use Illuminate\Support\Facades\Validator;
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
        //$test2 = Tweet::all();
        //$test2 = Tweet::with('cities')->where('city_id', $tweet->id);
        //dd($test2);
        
        //dd($collection);
        
        //dd($city);
        
        //->with('cities', 'tweets.city_id', '=', 'cities.id')->get();
        
        
        //$timelines = $tweet->getCity();
        
        //dd($timelines);
        //$timelines = Tweet::with('city')->with('user')->orderBy('id','desc')->paginate(10);
        
        
        $timelines = Tweet::with('city')
                            ->when($request->tweet_text, function ($query) use ($request) {
                                return $query->where('text', 'like', "%$request->tweet_text%");
                            })
                            ->when($request->tweet_city, function ($query) use ($request) {
                                return $query->where('city_id', 'like', "%$request->tweet_city%");
                            })
                            ->orderByRaw('created_at desc')
                            ->paginate(10);
        
        
        
        //以下元データ
        //$follow_ids = $follower->followingIds($user->id);
    
        //$following_ids = $follow_ids->pluck('followed_id')->toArray();
        //$timelines = $tweet->getTimelines($user->id, $following_ids);
        //ここまで
        
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
            'allcities' => $allcities,
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
    public function store(ValiRequests $request, Tweet $tweet)
    {
        $user = auth()->user();
        
        $data = $request->all();
         
        //$filename = $data->file('image')->getClientOriginalName();
        //dd($filename);
        //$textname = $data['text'];
        
        
    
        
        $tweet = new Tweet();
        
        $tweet->tweetStore($user->id, $data);
        $tweet->city_id = $data['city_id'];
        
        //投稿した画像をDBに格納させる
        if($request->file('image')->isValid()) {
            
            $file = $data['image'];
            //$filename = $request->file('image')->getClientOriginalName();
            //二つのpathに保存
            $path = Storage::disk('s3')->put('/portfolio',$file, 'public');
            //$request->image->storeAs('public/images/', date("Ymd").'_'.$filename);
            $tweet->image = $file;
            //$tweet->image = date("Ymd").'_'.$filename;
        }
        
        //$imagename = $filename->getClientOriginalName()->store('public/images');    //storageフォルダに投稿した画像を保存しファイルパスを格納
        //$imagefile = $imagename->->store('public/image_file/');
               //ファイル名から「public/」を取り除く
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
