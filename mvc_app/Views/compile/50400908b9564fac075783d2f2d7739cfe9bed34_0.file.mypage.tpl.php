<?php
/* Smarty version 4.5.1, created on 2024-03-28 04:36:59
  from '/Applications/MAMP/htdocs/mvc_app/Views/user/mypage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_6604f3eb7f19e6_93765410',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '50400908b9564fac075783d2f2d7739cfe9bed34' => 
    array (
      0 => '/Applications/MAMP/htdocs/mvc_app/Views/user/mypage.tpl',
      1 => 1711600611,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout/header.tpl' => 1,
    'file:layout/footer.tpl' => 1,
  ),
),false)) {
function content_6604f3eb7f19e6_93765410 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Casteria</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
<div class="main">
    <div class="container-field" >
        <?php $_smarty_tpl->_subTemplateRender("file:layout/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            <div class="form-wrapper">
                <h1>ユーザー情報</h1>
                <div class="form-item">
                    <p class="label-text">氏名</p>
                    <p class="data-text"><?php echo $_smarty_tpl->tpl_vars['data']->value->name;?>
</p>
                </div>

                <div class="form-item">
                    <p class="label-text">ふりがな</p>
                    <p class="data-text"><?php echo $_smarty_tpl->tpl_vars['data']->value->kana;?>
</p>
                </div>

                <div class="form-item">
                    <p class="label-text">メールアドレス</p>
                    <p class="data-text"><?php echo $_smarty_tpl->tpl_vars['data']->value->email;?>
</p>
                </div>

                <div class="form-item">
                    <p class="label-text">パスワード</p>
                    <p class="data-text"><?php echo $_smarty_tpl->tpl_vars['data']->value->password;?>
</p>
                </div>

                <div class="edit-button">
                    <a href="/user/edit" class="button">プロフィールの編集</a>
                </div>
            </div>
        <?php $_smarty_tpl->_subTemplateRender("file:layout/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
</body><?php }
}
