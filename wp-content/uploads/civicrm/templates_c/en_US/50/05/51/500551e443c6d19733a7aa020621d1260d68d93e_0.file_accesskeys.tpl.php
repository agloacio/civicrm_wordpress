<?php
/* Smarty version 5.3.1, created on 2024-10-08 15:45:48
  from 'file:CRM/common/accesskeys.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.3.1',
  'unifunc' => 'content_670553acb564b5_37928911',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '500551e443c6d19733a7aa020621d1260d68d93e' => 
    array (
      0 => 'CRM/common/accesskeys.tpl',
      1 => 1728398442,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_670553acb564b5_37928911 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\msteigerwald\\source\\repos\\civicrm_wordpress\\civicrm_wordpress\\wp-content\\plugins\\civicrm\\civicrm\\templates\\CRM\\common';
$_block_repeat=true;
if (!$_smarty_tpl->getSmarty()->getBlockHandler('crmScope')) {
throw new \Smarty\Exception('block tag \'crmScope\' not callable or registered');
}

echo $_smarty_tpl->getSmarty()->getBlockHandler('crmScope')->handle(array('extensionKey'=>''), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
  ob_start();
if (empty($_smarty_tpl->getValue('urlIsPublic'))) {?>
  <div class="footer" id="access">
    <?php $_smarty_tpl->getSmarty()->getRuntime('Capture')->open($_smarty_tpl, 'default', 'accessKeysHelpTitle', null);
$_block_repeat=true;
if (!$_smarty_tpl->getSmarty()->getBlockHandler('ts')) {
throw new \Smarty\Exception('block tag \'ts\' not callable or registered');
}

echo $_smarty_tpl->getSmarty()->getBlockHandler('ts')->handle(array(), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
  ob_start();
?>Access Keys<?php $_block_repeat=false;
echo $_smarty_tpl->getSmarty()->getBlockHandler('ts')->handle(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
$_smarty_tpl->getSmarty()->getRuntime('Capture')->close($_smarty_tpl);?>
    <?php $_block_repeat=true;
if (!$_smarty_tpl->getSmarty()->getBlockHandler('ts')) {
throw new \Smarty\Exception('block tag \'ts\' not callable or registered');
}

echo $_smarty_tpl->getSmarty()->getBlockHandler('ts')->handle(array(), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
  ob_start();
?>Access Keys:<?php $_block_repeat=false;
echo $_smarty_tpl->getSmarty()->getBlockHandler('ts')->handle(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
?>
    <?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('help')->handle(array('id'=>'accesskeys','file'=>'CRM/common/accesskeys','title'=>$_smarty_tpl->getValue('accessKeysHelpTitle')), $_smarty_tpl);?>

  </div>
<?php }
$_block_repeat=false;
echo $_smarty_tpl->getSmarty()->getBlockHandler('crmScope')->handle(array('extensionKey'=>''), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
}
}
