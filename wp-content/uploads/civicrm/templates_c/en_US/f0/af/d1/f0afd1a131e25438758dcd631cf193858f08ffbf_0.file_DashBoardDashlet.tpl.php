<?php
/* Smarty version 5.3.1, created on 2024-10-08 15:45:48
  from 'file:CRM/Contact/Page/DashBoardDashlet.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.1',
  'unifunc' => 'content_670553acae90e0_76546996',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f0afd1a131e25438758dcd631cf193858f08ffbf' => 
    array (
      0 => 'CRM/Contact/Page/DashBoardDashlet.tpl',
      1 => 1728398447,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:CRM/common/chart.tpl' => 1,
  ),
))) {
function content_670553acae90e0_76546996 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\msteigerwald\\source\\repos\\civicrm_wordpress\\civicrm_wordpress\\wp-content\\plugins\\civicrm\\civicrm\\templates\\CRM\\Contact\\Page';
$_block_repeat=true;
if (!$_smarty_tpl->getSmarty()->getBlockHandler('crmScope')) {
throw new \Smarty\Exception('block tag \'crmScope\' not callable or registered');
}

echo $_smarty_tpl->getSmarty()->getBlockHandler('crmScope')->handle(array('extensionKey'=>''), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
  ob_start();
$_smarty_tpl->renderSubTemplate("file:CRM/common/chart.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
echo $_smarty_tpl->getValue('communityMessages');?>

<div class="clear"></div>
<div class="crm-block crm-content-block">

  <crm-angular-js modules="crmDashboard">
    <crm-dashboard></crm-dashboard>
  </crm-angular-js>

</div>
<?php $_block_repeat=false;
echo $_smarty_tpl->getSmarty()->getBlockHandler('crmScope')->handle(array('extensionKey'=>''), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
}
}
