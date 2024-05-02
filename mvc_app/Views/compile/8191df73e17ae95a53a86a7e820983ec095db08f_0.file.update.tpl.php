<?php
/* Smarty version 4.5.1, created on 2024-04-07 04:09:57
  from '/Applications/MAMP/htdocs/mvc_app/Views/contact/update.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.1',
  'unifunc' => 'content_66121c95e64c69_76840080',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8191df73e17ae95a53a86a7e820983ec095db08f' => 
    array (
      0 => '/Applications/MAMP/htdocs/mvc_app/Views/contact/update.tpl',
      1 => 1712462992,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_66121c95e64c69_76840080 (Smarty_Internal_Template $_smarty_tpl) {
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
<form action="/contact/update" method="post">
<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['contact']->value['id'];?>
">
<div>
    <label for="name">氏名</label>
    <input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['contact']->value['name'];?>
">
</div>
<div>
    <label for="kana">フリガナ</label>
    <input type="text" name="kana" value="<?php echo $_smarty_tpl->tpl_vars['contact']->value['kana'];?>
">
</div>
<div>
    <label for="tel">電話番号</label>
    <input type="text" name="tel" value="<?php echo $_smarty_tpl->tpl_vars['contact']->value['tel'];?>
">
</div>
<div>
    <label for="email">メールアドレス</label>
    <input type="email" name="email" value="<?php echo $_smarty_tpl->tpl_vars['contact']->value['email'];?>
">
</div>
<div>
    <label for="body">お問い合わせ内容</label>
    <textarea name="body"><?php echo $_smarty_tpl->tpl_vars['contact']->value['body'];?>
</textarea>
</div>
<button type="submit">更新</button>
</form>
</body><?php }
}
