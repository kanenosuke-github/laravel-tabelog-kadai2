<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>admin-login</title>

    <style>
        .nagoyameshi-btn {
            background-color: #007bff; /* ブルー背景 */
            color: white; /* 白いテキスト */
        }
        .nagoyameshi-btn:hover {
            background-color: #0056b3; /* ホバー時の濃いブルー */
        }
    </style>
    
</head>
<body>
    

    <div class="container my-4 nagoyameshi-container">
        <div class="row justify-content-center">
            <div class="col-xl-3 col-lg-4 col-md-5 col-sm-7">
                <h1 class="mb-4 text-center">管理者ログイン</h1>

                <hr class="mb-4">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <div class="form-group mb-3">
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="メールアドレス" autofocus>
                    </div>

                    <div class="form-group mb-3">
                        <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password" placeholder="パスワード">
                    </div>

                    <div class="form-group mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    次回から自動的にログインする
                                </label>
                            </div>
                    </div>

                    <div class="form-group d-flex justify-content-center mb-4">
                        <button type="submit" class="btn text-white shadow-sm w-100 nagoyameshi-btn">ログイン</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </body>
    </html>