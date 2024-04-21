<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>確認画面</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        .label-text {
            font-size: 20px;
        }

        .form-item {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
    <div class="p-4 container-field form-orange">
        <div class="row justify-content-center">
            <div class="col-lg-6 mx-auto col-md-8">
                <h1>確認画面</h1>
                <form action="/contact/create" method="post" class="bg-white p-3 rounded mb-5">
                    <div class="form-item">
                        <p class="label-text ">氏名</p>
                        <p>{$smarty.post.name}</p>
                        <input type="hidden" name="name" value="{$smarty.post.name}">
                    </div>
                    <div class="form-item">
                        <p class="label-text">フリガナ</p>
                        <p>{$smarty.post.kana}</p>
                        <input type="hidden" name="kana" value="{$smarty.post.kana}">
                    </div>
                    <div class="form-item">
                        <p class="label-text">電話番号</p>
                        <p>{$smarty.post.tel}</p>
                        <input type="hidden" name="tel" value="{$smarty.post.tel}">
                    </div>
                    <div class="form-item">
                        <p class="label-text">メールアドレス</p>
                        <p>{$smarty.post.email}</p>
                        <input type="hidden" name="email" value="{$smarty.post.email}">
                    </div>
                    <div class="form-item">
                        <p class="label-text">お問い合わせ内容</p>
                        <p>{$smarty.post.body|nl2br|escape:'html'|default:''}</p>
                        <input type="hidden" name="body" value="{$smarty.post.body}">
                    </div>
                    <h2>上記内容でよろしいでしょうか？</h2>
                    <div class="edit-button">
                        <button type="button" onclick="window.location.href = 'index';"
                            class="btn bg-secondary my-2 mx-2">キャンセル</button>
                        <button type="submit" class="btn bg-warning my-2">送信</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>