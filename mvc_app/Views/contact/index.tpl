<!doctype html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>お問い合わせ画面</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style>
        .error-text {
            color: red;
        }
    </style>
</head>

<body>
    <div class="p-4 container-field form-orange">
        <div class="row justify-content-center">
            <div class="col-lg-6 mx-auto col-md-8">
                <h2 class="mb-4">入力画面</h2>
                <form action="/contact/read" method="post" class="bg-white p-3 rounded" id="contactForm">
                    <div class="form-group">
                        <label for="name">氏名</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="テスト太郎"
                            value="{$_POST['name']|default:''}">
                        <p class="error-text">{$errorMessages['name']|default:''}</p>
                    </div>
                    <div class="form-group">
                        <label for="kana">フリガナ</label>
                        <input type="text" class="form-control" name="kana" id="kana" placeholder="テストタロウ"
                            value="{$_POST['kana']|default:''}">
                        <p class="error-text">{$errorMessages['kana']|default:''}</p>
                    </div>
                    <div class="form-group">
                        <label for="tel">電話番号</label>
                        <input type="tel" class="form-control" name="tel" id="tel" placeholder="00000000000"
                            value="{$_POST['tel']|default:''}">
                        <p class="error-text">{$errorMessages['tel']|default:''}</p>
                    </div>
                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="text" class="form-control" name="email" id="email"
                            placeholder="geekation@exemple.com" value="{$_POST['email']|default:''}">
                        <p class="error-text">{$errorMessages['email']|default:''}</p>
                        <div class="form-group">
                        <label for="body">お問い合わせ内容</label>
                    <textarea class="form-control" name="body" id="body" placeholder="〇〇について" maxlength="200">{if isset($smarty.post.body)}{$smarty.post.body|escape}{/if}</textarea>
                        {if isset($smarty.post.body) && isset($errorMessages['body']) && empty($smarty.post.body)}
                            <p class="error-text">{$errorMessages['body']}</p>
                        {/if}
                    </div>                
                        <button type="submit" class="btn bg-warning my-2">送信</button>
                </form>
            </div>
        </div>
    </div>
    <div class="mt-5">
        <table class="table table-striped">
            <tr>
                <th scope="col">氏名</th>
                <th scope="col">フリガナ</th>
                <th scope="col">電話番号</th>
                <th scope="col">メールアドレス</th>
                <th scope="col">お問い合わせ内容</th>
                <th scope="col"> </th>
                <th scope="col"> </th>
            </tr>
            {foreach $contacts as $contact}
                <tr>
                    <td>{$contact.name|escape}</td>
                    <td>{$contact.kana|escape}</td>
                    <td>{$contact.tel|escape}</td>
                    <td>{$contact.email|escape}</td>
                    <td>{$contact.body|escape}</td>
                    <td><a href="/contact/edit?id={$contact.id|escape}">編集</a></td>
                    <td><a href="/contact/delete?id={$contact.id|escape}" class="link-danger"
                            onclick="return confirm('本当に削除しますか?')">削除</a></td>
                </tr>
            {/foreach}
        </table>
    </div>
    <script>
        // 削除ボタンのクリックイベントを追加
        const deleteLinks = document.querySelectorAll('.delete-link');
        deleteLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault(); // デフォルトのクリックイベントをキャンセル

                // 確認ダイアログを表示し、OKが押された場合のみ削除処理を実行
                const confirmed = confirm('本当に削除しますか？');
                if (confirmed) {
                    window.location.href = this.getAttribute('href');
                }
            });
        });
    </script>
    <script>
        document.getElementById("contactForm").addEventListener("submit", function(e) {
            // 各入力フィールドの値を取得
            const name = document.getElementById("name").value;
            const kana = document.getElementById("kana").value;
            const tel = document.getElementById("tel").value;
            const email = document.getElementById("email").value;
            const body = document.getElementById("body").value;

            // 名前の検証: 未入力、または10文字を超える場合はエラー
            if (!name) {
                alert("氏名は必須入力です");
                e.preventDefault(); // フォームの送信をキャンセル
                return;
            }
            if (name.length > 10) {
                alert("氏名は10文字以内で入力してください");
                e.preventDefault(); // フォームの送信をキャンセル
                return;
            }
            if (!kana) {
                alert("フリガナは必須入力です");
                e.preventDefault(); // フォームの送信をキャンセル
                return;
            }
            if (kana.length > 10) {
                alert("フリガナは10文字以内で入力してください");
                e.preventDefault(); // フォームの送信をキャンセル
                return;
            }
            // 電話番号の検証: 数字とハイフン以外の文字を含む場合はエラー
            const phonePattern = /^[0-9\-]+$/;
            if (!tel.match(phonePattern)) {
                alert("電話番号0〜9の数字を入力してください");
                e.preventDefault();
                return;
            }
            if (!email) {
                alert("メールアドレスは必須入力です");
                e.preventDefault(); // フォームの送信をキャンセル
                return;
            }
            // お問い合わせ内容の検証: 未入力、または200文字を超える場合はエラー
            if (!body || body.length > 200) {
                alert("お問い合わせ内容は必須入力です。");
                e.preventDefault();
                return;
            }

            // フォームが送信されたら、セッションストレージに入力内容を保存する
            sessionStorage.setItem("name", name);
            sessionStorage.setItem("kana", kana);
            sessionStorage.setItem("tel", tel);
            sessionStorage.setItem("email", email);
            sessionStorage.setItem("body", body);
        });
    </script>
</body>

</html>