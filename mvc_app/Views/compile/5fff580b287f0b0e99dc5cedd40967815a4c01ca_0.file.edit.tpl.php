<?php
/* Smarty version 4.5.1, created on 2024-04-24 13:08:33
  from '/Applications/MAMP/htdocs/mvc_app/Views/contact/edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_662904518e7092_92338399',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5fff580b287f0b0e99dc5cedd40967815a4c01ca' => 
    array (
      0 => '/Applications/MAMP/htdocs/mvc_app/Views/contact/edit.tpl',
      1 => 1713881001,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_662904518e7092_92338399 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>更新画面</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
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
                <h1>更新画面</h1>
                <form action="/contact/update" method="post" class="bg-white p-3 rounded" id="contactForm">
                    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['contact']->value['id'];?>
">
                    <div>
                        <label for="name">氏名</label>
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['contact']->value->name ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['contact']->value['name'] ?? null : $tmp);?>
">
                        <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['name'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    </div>
                    <div>
                        <label for="kana">フリガナ</label>
                        <input type="text" class="form-control" name="kana" id="kana" value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['contact']->value->kana ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['contact']->value['kana'] ?? null : $tmp);?>
">
                        <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['kana'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    </div>
                    <div>
                        <label for="tel">電話番号</label>
                        <input type="text" class="form-control" name="tel" id="tel"value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['contact']->value->tel ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['contact']->value['tel'] ?? null : $tmp);?>
">
                        <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['tel'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    </div>
                    <div>
                        <label for="email">メールアドレス</label>
                        <input type="text" class="form-control" name="email" id="email"value="<?php echo (($tmp = $_smarty_tpl->tpl_vars['contact']->value->email ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['contact']->value['email'] ?? null : $tmp);?>
">
                        <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['email'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    </div>
                    <div>
                        <label for="body">お問い合わせ内容</label>
                        <textarea name="body" class="form-control" id="body"><?php echo (($tmp = $_smarty_tpl->tpl_vars['contact']->value->email ?? null)===null||$tmp==='' ? $_smarty_tpl->tpl_vars['contact']->value['body'] ?? null : $tmp);?>
</textarea>
                        <p class="error-text"><?php echo (($tmp = $_smarty_tpl->tpl_vars['errorMessages']->value['body'] ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                    </div>
                    <button type="submit" onclick="window.location.href = 'index';"
                        class="btn bg-secondary my-2 mx-2">キャンセル</button>
                    <button type="submit" class="btn bg-warning my-2">更新</button>
                </form>
            </div>
        </div>
    </div>
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

            // フリガナの検証: 未入力、または10文字を超える場合はエラー
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
                alert("電話番号は数字とハイフンのみ入力してください");
                e.preventDefault(); // フォームの送信をキャンセル
                return;
            }

            // お問い合わせ内容の検証: 未入力、または200文字を超える場合はエラー
            if (!body || body.length > 200) {
                alert("お問い合わせ内容は必須入力です。");
                e.preventDefault(); // フォームの送信をキャンセル
                return;
            }
        });
    <?php echo '</script'; ?>
>
</body>
</html><?php }
}
