<?php
/* Smarty version 3.1.32, created on 2018-11-12 16:42:06
  from 'C:\xampp\htdocs\17beststore\modules\ps_themecusto\views\templates\admin\controllers\configuration\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5be9d78ec653d9_07603430',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'faa2bfdaa73e85e76fadac61a7e07a2497b63c9c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\17beststore\\modules\\ps_themecusto\\views\\templates\\admin\\controllers\\configuration\\index.tpl',
      1 => 1541584601,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./elem/wireframe.tpl' => 1,
    'file:./elem/module_actions.tpl' => 1,
    'file:./elem/modal.tpl' => 1,
  ),
),false)) {
function content_5be9d78ec653d9_07603430 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="psthemecusto">
    <?php if ($_smarty_tpl->tpl_vars['is_ps_ready']->value) {?>
    <div class="panel col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <div class="panel-heading">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Change colors, typography and your logo position','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>

        </div>
        <div class="row">
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                <img src="<?php echo $_smarty_tpl->tpl_vars['iconConfiguration']->value;?>
"/>
            </div>
            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                <p>
                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Use the Theme configurator module to customize the main graphic elements of your website : colors, buttons, typography, logo position.','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
:<br/>
                </p>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <a href="<?php echo $_smarty_tpl->tpl_vars['themeConfiguratorUrl']->value;?>
" class="btn btn-primary btn-lg btn-block" rel="noopener"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Configure','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
</a>
            </div>
        </div>
    </div>
    <?php }?>
    <div class="panel col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
        <div class="panel-heading">
            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Main theme modules cartography','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>

        </div>
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                <?php $_smarty_tpl->_subTemplateRender("file:./elem/wireframe.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 module-list">
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['elementsList']->value, 'categories', false, 'categoryname', 'cat', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['categoryname']->value => $_smarty_tpl->tpl_vars['categories']->value) {
?>
                <div class="row configuration-rectangle">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 js-module-name js-title-<?php echo $_smarty_tpl->tpl_vars['categoryname']->value;?>
" data-module_name="<?php echo $_smarty_tpl->tpl_vars['categoryname']->value;?>
">
                        <span class="col-lg-11 col-sm-11 col-xs-11 col-md-11">
                            <?php echo $_smarty_tpl->tpl_vars['listCategories']->value[$_smarty_tpl->tpl_vars['categoryname']->value];?>

                        </span>
                        <span class="col-lg-1 col-sm-1 col-xs-1 col-md-1 configuration-rectangle-caret">
                            <i class="material-icons down">keyboard_arrow_down</i>
                            <i class="material-icons up">keyboard_arrow_up</i>
                        </span>
                    </div>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'elements', false, 'type');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['type']->value => $_smarty_tpl->tpl_vars['elements']->value) {
?>
                        <?php if ($_smarty_tpl->tpl_vars['type']->value == 'pages') {?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['elements']->value, 'page');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['page']->value) {
?>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 module-informations">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                            <i class="icon-cogs"></i>
                                        </div>
                                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <b><?php echo $_smarty_tpl->tpl_vars['page']->value['displayName'];?>
</b>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7 description">
                                                <?php echo $_smarty_tpl->tpl_vars['page']->value['description'];?>

                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 general-action">
                                                <a class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-radius-right btn btn-primary-reverse btn-outline-primary light-button" href="<?php echo $_smarty_tpl->tpl_vars['page']->value['url'];?>
">
                                                    <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Configure','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <?php } else { ?>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['elements']->value, 'module', false, NULL, 'mods', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['module']->value) {
?>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 module-informations">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                            <img class="module-logo" src="<?php echo ($_smarty_tpl->tpl_vars['ps_uri']->value).($_smarty_tpl->tpl_vars['module']->value['logo']);?>
"/>
                                        </div>
                                        <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <b><?php echo $_smarty_tpl->tpl_vars['module']->value['displayName'];?>
</b>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7 description">
                                                <?php echo $_smarty_tpl->tpl_vars['module']->value['description'];?>

                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1">
                                                <?php $_smarty_tpl->_subTemplateRender("file:./elem/module_actions.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <?php }?>
                    <?php
}
} else {
?>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 module-informations">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
                                    <i class="material-icons hidden-xs">extension</i>
                                </div>
                                <div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <b><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'There is no module for this section','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
</b>
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-7 description">
                                        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'You can install a module for this section from our Modules Selection','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>

                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 general-action">
                                        <a class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-radius-right btn btn-primary-reverse btn-outline-primary light-button" href="<?php echo $_smarty_tpl->tpl_vars['selectionModulePage']->value;?>
" >
                                            <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'See modules selection','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </div>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-8">
                        <a class="btn btn-primary btn-lg btn-block" href="<?php echo $_smarty_tpl->tpl_vars['installedModulePage']->value;?>
#theme_modules"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'See all theme\'s modules','mod'=>'ps_themecusto'),$_smarty_tpl ) );?>
</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $_smarty_tpl->_subTemplateRender("file:./elem/modal.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>

<?php }
}
