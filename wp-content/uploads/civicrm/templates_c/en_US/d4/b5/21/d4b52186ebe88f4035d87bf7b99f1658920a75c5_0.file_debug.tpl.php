<?php
/* Smarty version 5.3.1, created on 2024-10-08 15:45:48
  from 'file:CRM/common/debug.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.1',
  'unifunc' => 'content_670553aca4e138_56138959',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4b52186ebe88f4035d87bf7b99f1658920a75c5' => 
    array (
      0 => 'CRM/common/debug.tpl',
      1 => 1728398442,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_670553aca4e138_56138959 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\msteigerwald\\source\\repos\\civicrm_wordpress\\civicrm_wordpress\\wp-content\\plugins\\civicrm\\civicrm\\templates\\CRM\\common';
$_block_repeat=true;
if (!$_smarty_tpl->getSmarty()->getBlockHandler('crmScope')) {
throw new \Smarty\Exception('block tag \'crmScope\' not callable or registered');
}

echo $_smarty_tpl->getSmarty()->getBlockHandler('crmScope')->handle(array('extensionKey'=>''), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
  ob_start();
?><!-- .tpl file invoked: <?php echo $_smarty_tpl->getValue('tplFile');?>
. Call via form.tpl if we have a form in the page. -->
<?php if ($_smarty_tpl->getValue('debugging')['smartyDebug']) {
$_smarty_debug = new \Smarty\Debug;
 $_smarty_debug->display_debug($_smarty_tpl);
unset($_smarty_debug);
}?>

<?php if ($_smarty_tpl->getValue('debugging')['sessionReset']) {
echo $_smarty_tpl->getValue('session')->reset($_smarty_tpl->getValue('debugging')['sessionReset']);?>

<?php }?>

<?php if ($_smarty_tpl->getValue('debugging')['sessionDebug']) {
echo $_smarty_tpl->getValue('session')->debug($_smarty_tpl->getValue('debugging')['sessionDebug']);?>

<?php }?>

<?php if ($_smarty_tpl->getValue('debugging')['directoryCleanup']) {
echo $_smarty_tpl->getValue('config')->cleanup($_smarty_tpl->getValue('debugging')['directoryCleanup']);?>

<?php }?>

<?php if ($_smarty_tpl->getValue('debugging')['cacheCleanup']) {
echo $_smarty_tpl->getValue('config')->clearDBCache();?>

<?php }?>

<?php if ($_smarty_tpl->getValue('debugging')['configReset']) {
echo $_smarty_tpl->getValue('config')->reset();?>

<?php }
$_block_repeat=false;
echo $_smarty_tpl->getSmarty()->getBlockHandler('crmScope')->handle(array('extensionKey'=>''), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
}
}
