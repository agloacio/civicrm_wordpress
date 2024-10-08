<?php
/* Smarty version 5.3.1, created on 2024-10-08 15:45:48
  from 'file:CRM\Contact\Page\DashBoard.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.1',
  'unifunc' => 'content_670553acacc013_76260517',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '46c184847b552d3d10ff145698e2415c7582f267' => 
    array (
      0 => 'CRM\\Contact\\Page\\DashBoard.tpl',
      1 => 1728398447,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:CRM/Contact/Page/DashBoardDashlet.tpl' => 3,
  ),
))) {
function content_670553acacc013_76260517 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\msteigerwald\\source\\repos\\civicrm_wordpress\\civicrm_wordpress\\wp-content\\plugins\\civicrm\\civicrm\\templates\\CRM\\Contact\\Page';
$_block_repeat=true;
if (!$_smarty_tpl->getSmarty()->getBlockHandler('crmScope')) {
throw new \Smarty\Exception('block tag \'crmScope\' not callable or registered');
}

echo $_smarty_tpl->getSmarty()->getBlockHandler('crmScope')->handle(array('extensionKey'=>''), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
  ob_start();
if (empty($_smarty_tpl->getValue('hookContent'))) {?>
    <?php $_smarty_tpl->renderSubTemplate("file:CRM/Contact/Page/DashBoardDashlet.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
} else { ?>
    <?php if ($_smarty_tpl->getValue('hookContentPlacement') != 2 && $_smarty_tpl->getValue('hookContentPlacement') != 3) {?>
        <?php $_smarty_tpl->renderSubTemplate("file:CRM/Contact/Page/DashBoardDashlet.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
    <?php }?>

    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('hookContent'), 'content', false, 'title');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('title')->value => $_smarty_tpl->getVariable('content')->value) {
$foreach2DoElse = false;
?>
    <fieldset><legend><?php echo $_smarty_tpl->getValue('title');?>
</legend>
        <?php echo $_smarty_tpl->getValue('content');?>

    </fieldset>
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>

    <?php if ($_smarty_tpl->getValue('hookContentPlacement') == 2) {?>
        <?php $_smarty_tpl->renderSubTemplate("file:CRM/Contact/Page/DashBoardDashlet.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), (int) 0, $_smarty_current_dir);
?>
    <?php }
}
$_block_repeat=false;
echo $_smarty_tpl->getSmarty()->getBlockHandler('crmScope')->handle(array('extensionKey'=>''), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
}
}
