<?php
/* Smarty version 5.3.1, created on 2024-10-08 15:45:48
  from 'file:CRM/common/wordpress.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.1',
  'unifunc' => 'content_670553ac9c78a8_02229280',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e642350c04f01879872a915bb615f9553ed63fe5' => 
    array (
      0 => 'CRM/common/wordpress.tpl',
      1 => 1728398442,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:CRM/common/CMSPrint.tpl' => 1,
  ),
))) {
function content_670553ac9c78a8_02229280 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\msteigerwald\\source\\repos\\civicrm_wordpress\\civicrm_wordpress\\wp-content\\plugins\\civicrm\\civicrm\\templates\\CRM\\common';
$_block_repeat=true;
if (!$_smarty_tpl->getSmarty()->getBlockHandler('crmScope')) {
throw new \Smarty\Exception('block tag \'crmScope\' not callable or registered');
}

echo $_smarty_tpl->getSmarty()->getBlockHandler('crmScope')->handle(array('extensionKey'=>''), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
  ob_start();
$_smarty_tpl->renderSubTemplate("file:CRM/common/CMSPrint.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
$_block_repeat=false;
echo $_smarty_tpl->getSmarty()->getBlockHandler('crmScope')->handle(array('extensionKey'=>''), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
}
}
