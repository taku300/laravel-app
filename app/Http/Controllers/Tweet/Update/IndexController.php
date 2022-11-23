<?php

namespace App\Http\Controllers\Tweet\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Models\Tweet;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $tweetId = (int) $request->route('tweetId');
        $tweet = Tweet::where('id',$tweetId)->first();
        $tweet = Tweet::where('id',$tweetId)->firstOrFail(); //例外をスルーしない場合は404 not found
        // if (is_null($tweet)) { //例外をキャッチしない場合は自動的に404 not fount
        //     throw new NotFoundHttpException('存在しないつぶやきです');
        // }
        return view('tweet.update')->with('tweet', $tweet);
    }
}
