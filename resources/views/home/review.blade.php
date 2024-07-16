<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review</title>
</head>
<body>
    <h1>レビュー</h1>
    <form action="{{route('home.review',['id' => $store->id])}}" method="POST">
    @csrf
    <input type="text" name="user_name" placeholder="お名前" required>
    <textarea name="comment" id="comment" placeholider="レビュー内容" required></textarea>
    <button type="submit">投稿</button>
    </form>

</body>
</html>