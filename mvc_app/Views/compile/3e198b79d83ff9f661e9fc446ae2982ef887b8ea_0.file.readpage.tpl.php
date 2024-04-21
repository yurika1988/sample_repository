<?php
/* Smarty version 4.5.1, created on 2024-04-21 08:32:56
  from '/Applications/MAMP/htdocs/mvc_app/Views/contact/readpage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_6624cf38d416a0_40555277',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3e198b79d83ff9f661e9fc446ae2982ef887b8ea' => 
    array (
      0 => '/Applications/MAMP/htdocs/mvc_app/Views/contact/readpage.tpl',
      1 => 1713688320,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6624cf38d416a0_40555277 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
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
                        <p><?php echo $_POST['name'];?>
</p>
                        <input type="hidden" name="name" value="<?php echo $_POST['name'];?>
">
                    </div>
                    <div class="form-item">
                        <p class="label-text">フリガナ</p>
                        <p><?php echo $_POST['kana'];?>
</p>
                        <input type="hidden" name="kana" value="<?php echo $_POST['kana'];?>
">
                    </div>
                    <div class="form-item">
                        <p class="label-text">電話番号</p>
                        <p><?php echo $_POST['tel'];?>
</p>
                        <input type="hidden" name="tel" value="<?php echo $_POST['tel'];?>
">
                    </div>
                    <div class="form-item">
                        <p class="label-text">メールアドレス</p>
                        <p><?php echo $_POST['email'];?>
</p>
                        <input type="hidden" name="email" value="<?php echo $_POST['email'];?>
">
                    </div>
                    <div class="form-item">
                        <p class="label-text">お問い合わせ内容</p>
                        <p><?php echo (($tmp = htmlspecialchars((string)nl2br((string) $_POST['body'], (bool) 1), ENT_QUOTES, 'UTF-8', true) ?? null)===null||$tmp==='' ? '' ?? null : $tmp);?>
</p>
                        <input type="hidden" name="body" value="<?php echo $_POST['body'];?>
">
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

</html><?php }
}
