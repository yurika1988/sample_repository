<?php
/* Smarty version 4.5.1, created on 2024-04-23 14:01:10
  from '/Applications/MAMP/htdocs/mvc_app/Views/contact/index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_6627bf26ec8200_19573467',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c57b4f7d76450b6666497f89adb5183a6385d349' => 
    array (
      0 => '/Applications/MAMP/htdocs/mvc_app/Views/contact/index.tpl',
      1 => 1713880845,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6627bf26ec8200_19573467 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
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
                            value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['_POST']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                        <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    </div>
                    <div class="form-group">
                        <label for="kana">フリガナ</label>
                        <input type="text" class="form-control" name="kana" id="kana" placeholder="テストタロウ"
                            value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['_POST']->value['kana'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                        <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['kana'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    </div>
                    <div class="form-group">
                        <label for="tel">電話番号</label>
                        <input type="tel" class="form-control" name="tel" id="tel" placeholder="00000000000"
                            value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['_POST']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                        <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    </div>
                    <div class="form-group">
                        <label for="email">メールアドレス</label>
                        <input type="text" class="form-control" name="email" id="email"
                            placeholder="geekation@exemple.com" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['_POST']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
">
                        <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                        <div class="form-group">
                            <label for="body">お問い合わせ内容</label>
                            <textarea class="form-control" name="body" id="body" placeholder="〇〇について"
                                maxlength="200" value="<?php echo (($tmp = htmlentities(mb_convert_encoding((string)$_POST['body'], 'UTF-8', 'UTF-8'), ENT_QUOTES, 'UTF-8', true) ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
"></textarea>
                            <?php if (empty($_smarty_tpl->tpl_vars['errorMessages']->value['body'])) {?>
                                <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['body'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                            <?php }?>
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
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['contacts']->value, 'contact');
$_smarty_tpl->tpl_vars['contact']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
$_smarty_tpl->tpl_vars['contact']->do_else = false;
?>
                <tr>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value['kana'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value['tel'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value['email'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value['body'], ENT_QUOTES, 'UTF-8', true);?>
</td>
                    <td><a href="/contact/edit?id=<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
">編集</a></td>
                    <td><a href="/contact/delete?id=<?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['contact']->value['id'], ENT_QUOTES, 'UTF-8', true);?>
" class="link-danger"
                            onclick="return confirm('本当に削除しますか?')">削除</a></td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </table>
    </div>
    <?php echo '<script'; ?>
>
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
    <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
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
    <?php echo '</script'; ?>
>
</body>

</html><?php }
}
