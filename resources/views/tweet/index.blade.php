<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta 
    name="viewport" 
    content="
    width=device-width, user-scalable=yes, initial-scale=1.0,
    maximum-scale=1.0, minimum-scale=1.0
    "
    >
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>つぶやきアプリ</title>
</head>
<body>
    <h1>つぶやきアプリ</h1>
    <div>
        <p>投稿フォーム</p>
        <form action="{{ route('tweet.create') }}" method="post">
            @csrf
            <label for="tweet-content">つぶやき</label>
            <span>140文字まで</span>
            <textarea name="tweet" id="tweet-content" type="text"
            placeholder="つぶやき入力"></textarea>
            @error('tweet')
                <p style="color: red;">{{ $message }}</p>
            @enderror
            <button type="submit">投稿</button>
        </form>
        @foreach($tweets as $tweet)
        <details>
            <summary>{{ $tweet->content }}</summary>
            <div>
                <a href="{{ route('tweet.update.index', ['tweetId' => $tweet->id]) }}">編集</a>
                <form action="{{ route('tweet.delete', ['tweetId' => $tweet->id]) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="subumit">消去</button>
                </form>
            </div>
        </details>
        @endforeach
    </div>
</body>
</html>