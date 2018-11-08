<?php

/* @PrestaShop/Admin/Configure/AdvancedParameters/performance.html.twig */
class __TwigTemplate_f49499557e928653069a140af81f76a8d0417df13caa9e1c75c1b98a5c28f003 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 25
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Configure/AdvancedParameters/performance.html.twig", 25);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'perfs_form_smarty_cache' => array($this, 'block_perfs_form_smarty_cache'),
            'perfs_form_debug_mode' => array($this, 'block_perfs_form_debug_mode'),
            'perfs_form_optional_features' => array($this, 'block_perfs_form_optional_features'),
            'perfs_form_ccc' => array($this, 'block_perfs_form_ccc'),
            'perfs_form_media_servers' => array($this, 'block_perfs_form_media_servers'),
            'perfs_form_caching' => array($this, 'block_perfs_form_caching'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 29
        list($context["smartyForm"], $context["debugModeForm"], $context["optionalFeaturesForm"], $context["combineCompressCacheForm"], $context["mediaServersForm"], $context["cachingForm"], $context["memcacheForm"]) =         array($this->getAttribute(        // line 30
(isset($context["form"]) ? $context["form"] : null), "smarty", array()), $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "debug_mode", array()), $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "optional_features", array()), $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "ccc", array()), $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "media_servers", array()), $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "caching", array()), $this->getAttribute((isset($context["form"]) ? $context["form"] : null), "add_memcache_server", array()));
        // line 25
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 33
    public function block_content($context, array $blocks = array())
    {
        // line 34
        echo "    <div class=\"container\">
        ";
        // line 35
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_start', array("attr" => array("class" => "form")));
        echo "
        <div class=\"row\">
            ";
        // line 37
        $this->displayBlock('perfs_form_smarty_cache', $context, $blocks);
        // line 81
        echo "
            ";
        // line 82
        $this->displayBlock('perfs_form_debug_mode', $context, $blocks);
        // line 116
        echo "        </div>

        <div class=\"row\">
            ";
        // line 119
        $this->displayBlock('perfs_form_optional_features', $context, $blocks);
        // line 161
        echo "
            ";
        // line 162
        $this->displayBlock('perfs_form_ccc', $context, $blocks);
        // line 199
        echo "        </div>

        <div class=\"row\">
            ";
        // line 202
        $this->displayBlock('perfs_form_media_servers', $context, $blocks);
        // line 239
        echo "
            ";
        // line 240
        $this->displayBlock('perfs_form_caching', $context, $blocks);
        // line 270
        echo "        </div>
        ";
        // line 271
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) ? $context["form"] : null), 'form_end');
        echo "
    </div>
";
    }

    // line 37
    public function block_perfs_form_smarty_cache($context, array $blocks = array())
    {
        // line 38
        echo "            <div class=\"col\">
                <div class=\"card\">
                    <h3 class=\"card-header\">
                        <i class=\"material-icons\">business_center</i> ";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Smarty", array(), "Admin.Advparameters.Feature"), "html", null, true);
        echo "
                    </h3>
                    <div class=\"card-block\">
                        <div class=\"card-text\">
                            <div class=\"form-group\">
                                <label class=\"form-control-label\">";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Template compilation", array(), "Admin.Advparameters.Feature"), "html", null, true);
        echo "</label>
                                ";
        // line 47
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["smartyForm"]) ? $context["smartyForm"] : null), "template_compilation", array()), 'errors');
        echo "
                                ";
        // line 48
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["smartyForm"]) ? $context["smartyForm"] : null), "template_compilation", array()), 'widget');
        echo "
                            </div>
                            <div class=\"form-group\">
                                ";
        // line 51
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : null), "label_with_help", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Cache", array(), "Admin.Advparameters.Feature"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Should be enabled except for debugging.", array(), "Admin.Advparameters.Feature")), "method"), "html", null, true);
        echo "
                                ";
        // line 52
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["smartyForm"]) ? $context["smartyForm"] : null), "cache", array()), 'errors');
        echo "
                                ";
        // line 53
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["smartyForm"]) ? $context["smartyForm"] : null), "cache", array()), 'widget');
        echo "
                            </div>
                            <div class=\"form-group smarty-cache-option\">
                                ";
        // line 56
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : null), "label_with_help", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Multi-front optimizations", array(), "Admin.Advparameters.Feature"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Should be enabled if you want to avoid to store the smarty cache on NFS.", array(), "Admin.Advparameters.Help")), "method"), "html", null, true);
        echo "
                                ";
        // line 57
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["smartyForm"]) ? $context["smartyForm"] : null), "multi_front_optimization", array()), 'errors');
        echo "
                                ";
        // line 58
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["smartyForm"]) ? $context["smartyForm"] : null), "multi_front_optimization", array()), 'widget');
        echo "
                            </div>
                            <div class=\"form-group smarty-cache-option\">
                                <label class=\"form-control-label\">";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Caching type", array(), "Admin.Advparameters.Feature"), "html", null, true);
        echo "</label>
                                ";
        // line 62
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["smartyForm"]) ? $context["smartyForm"] : null), "caching_type", array()), 'errors');
        echo "
                                ";
        // line 63
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["smartyForm"]) ? $context["smartyForm"] : null), "caching_type", array()), 'widget');
        echo "
                            </div>
                            <div class=\"form-group smarty-cache-option\">
                                <label class=\"form-control-label\">";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Clear cache", array(), "Admin.Advparameters.Feature"), "html", null, true);
        echo "</label>
                                ";
        // line 67
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["smartyForm"]) ? $context["smartyForm"] : null), "clear_cache", array()), 'errors');
        echo "
                                ";
        // line 68
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["smartyForm"]) ? $context["smartyForm"] : null), "clear_cache", array()), 'widget');
        echo "
                            </div>
                            ";
        // line 70
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["smartyForm"]) ? $context["smartyForm"] : null), 'rest');
        echo "
                        </div>
                    </div>
                    <div class=\"card-footer\">
                        <div class=\"d-flex justify-content-end\">
                            <button class=\"btn btn-primary\">";
        // line 75
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", array(), "Admin.Actions"), "html", null, true);
        echo "</button>
                        </div>
                    </div>
                </div>
            </div>
            ";
    }

    // line 82
    public function block_perfs_form_debug_mode($context, array $blocks = array())
    {
        // line 83
        echo "            <div class=\"col\">
                <div class=\"card\">
                    <h3 class=\"card-header\">
                        <i class=\"material-icons\">bug_report</i> ";
        // line 86
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Debug mode", array(), "Admin.Advparameters.Feature"), "html", null, true);
        echo "
                    </h3>
                    <div class=\"card-block\">
                        <div class=\"card-text\">
                            <div class=\"form-group\">
                                ";
        // line 91
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : null), "label_with_help", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Disable non PrestaShop modules", array(), "Admin.Advparameters.Feature"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Enable or disable non PrestaShop Modules.", array(), "Admin.Advparameters.Feature")), "method"), "html", null, true);
        echo "
                                ";
        // line 92
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["debugModeForm"]) ? $context["debugModeForm"] : null), "disable_non_native_modules", array()), 'errors');
        echo "
                                ";
        // line 93
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["debugModeForm"]) ? $context["debugModeForm"] : null), "disable_non_native_modules", array()), 'widget');
        echo "
                            </div>
                            <div class=\"form-group\">
                                ";
        // line 96
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : null), "label_with_help", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Disable all overrides", array(), "Admin.Advparameters.Feature"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Enable or disable all classes and controllers overrides.", array(), "Admin.Advparameters.Feature")), "method"), "html", null, true);
        echo "
                                ";
        // line 97
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["debugModeForm"]) ? $context["debugModeForm"] : null), "disable_overrides", array()), 'errors');
        echo "
                                ";
        // line 98
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["debugModeForm"]) ? $context["debugModeForm"] : null), "disable_overrides", array()), 'widget');
        echo "
                            </div>
                            <div class=\"form-group\">
                                ";
        // line 101
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : null), "label_with_help", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Debug mode", array(), "Admin.Advparameters.Feature"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Enable or disable debug mode.", array(), "Admin.Advparameters.Help")), "method"), "html", null, true);
        echo "
                                ";
        // line 102
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["debugModeForm"]) ? $context["debugModeForm"] : null), "debug_mode", array()), 'errors');
        echo "
                                ";
        // line 103
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["debugModeForm"]) ? $context["debugModeForm"] : null), "debug_mode", array()), 'widget');
        echo "
                            </div>
                            ";
        // line 105
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["debugModeForm"]) ? $context["debugModeForm"] : null), 'rest');
        echo "
                        </div>
                    </div>
                    <div class=\"card-footer\">
                        <div class=\"d-flex justify-content-end\">
                            <button class=\"btn btn-primary\">";
        // line 110
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", array(), "Admin.Actions"), "html", null, true);
        echo "</button>
                        </div>
                    </div>
                </div>
            </div>
            ";
    }

    // line 119
    public function block_perfs_form_optional_features($context, array $blocks = array())
    {
        // line 120
        echo "            <div class=\"col\">
                <div class=\"card\">
                    <h3 class=\"card-header\">
                        <i class=\"material-icons\">extension</i> ";
        // line 123
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Optional features", array(), "Admin.Advparameters.Feature"), "html", null, true);
        echo "
                    </h3>
                    <div class=\"card-block\">
                        <div class=\"card-text\">

                            ";
        // line 128
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : null), "infotip", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Some features can be disabled in order to improve performance.", array(), "Admin.Advparameters.Help")), "method"), "html", null, true);
        echo "

                            <div class=\"form-group\">
                                ";
        // line 131
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : null), "label_with_help", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Combinations", array(), "Admin.Global"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Choose \"No\" to disable Product Combinations.", array(), "Admin.Advparameters.Help")), "method"), "html", null, true);
        echo "
                                ";
        // line 132
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["optionalFeaturesForm"]) ? $context["optionalFeaturesForm"] : null), "combinations", array()), 'errors');
        echo "
                                ";
        // line 133
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["optionalFeaturesForm"]) ? $context["optionalFeaturesForm"] : null), "combinations", array()), 'widget');
        echo "
                            </div>

                            ";
        // line 136
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["optionalFeaturesForm"]) ? $context["optionalFeaturesForm"] : null), "combinations", array()), "vars", array()), "disabled", array())) {
            // line 137
            echo "                                ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : null), "warningtip", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You cannot set this parameter to No when combinations are already used by some of your products", array(), "Admin.Advparameters.Help")), "method"), "html", null, true);
            echo "
                            ";
        }
        // line 139
        echo "
                            <div class=\"form-group\">
                                ";
        // line 141
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : null), "label_with_help", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Features", array(), "Admin.Global"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Choose \"No\" to disable Product Features.", array(), "Admin.Advparameters.Help")), "method"), "html", null, true);
        echo "
                                ";
        // line 142
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["optionalFeaturesForm"]) ? $context["optionalFeaturesForm"] : null), "features", array()), 'errors');
        echo "
                                ";
        // line 143
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["optionalFeaturesForm"]) ? $context["optionalFeaturesForm"] : null), "features", array()), 'widget');
        echo "
                            </div>
                            <div class=\"form-group\">
                                ";
        // line 146
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : null), "label_with_help", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Customer groups", array(), "Admin.Advparameters.Feature"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Choose \"No\" to disable Customer Groups.", array(), "Admin.Advparameters.Help")), "method"), "html", null, true);
        echo "
                                ";
        // line 147
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["optionalFeaturesForm"]) ? $context["optionalFeaturesForm"] : null), "customer_groups", array()), 'errors');
        echo "
                                ";
        // line 148
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["optionalFeaturesForm"]) ? $context["optionalFeaturesForm"] : null), "customer_groups", array()), 'widget');
        echo "
                            </div>
                            ";
        // line 150
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["optionalFeaturesForm"]) ? $context["optionalFeaturesForm"] : null), 'rest');
        echo "
                        </div>
                    </div>
                    <div class=\"card-footer\">
                        <div class=\"d-flex justify-content-end\">
                            <button class=\"btn btn-primary\">";
        // line 155
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", array(), "Admin.Actions"), "html", null, true);
        echo "</button>
                        </div>
                    </div>
                </div>
            </div>
            ";
    }

    // line 162
    public function block_perfs_form_ccc($context, array $blocks = array())
    {
        // line 163
        echo "            <div class=\"col\">
                <div class=\"card\">
                    <h3 class=\"card-header\">
                        <i class=\"material-icons\">zoom_out_map</i> ";
        // line 166
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("CCC (Combine, Compress and Cache)", array(), "Admin.Advparameters.Feature"), "html", null, true);
        echo "
                    </h3>
                    <div class=\"card-block\">
                        <div class=\"card-text\">

                            ";
        // line 171
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : null), "infotip", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("CCC allows you to reduce the loading time of your page. With these settings you will gain performance without even touching the code of your theme. Make sure, however, that your theme is compatible with PrestaShop 1.4+. Otherwise, CCC will cause problems.", array(), "Admin.Advparameters.Help")), "method"), "html", null, true);
        echo "

                            <div class=\"form-group\">
                                <label class=\"form-control-label\">";
        // line 174
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Smart cache for CSS", array(), "Admin.Advparameters.Feature"), "html", null, true);
        echo "</label>
                                ";
        // line 175
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["combineCompressCacheForm"]) ? $context["combineCompressCacheForm"] : null), "smart_cache_css", array()), 'errors');
        echo "
                                ";
        // line 176
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["combineCompressCacheForm"]) ? $context["combineCompressCacheForm"] : null), "smart_cache_css", array()), 'widget');
        echo "
                            </div>
                            <div class=\"form-group\">
                                <label class=\"form-control-label\">";
        // line 179
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Smart cache for JavaScript", array(), "Admin.Advparameters.Feature"), "html", null, true);
        echo "</label>
                                ";
        // line 180
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["combineCompressCacheForm"]) ? $context["combineCompressCacheForm"] : null), "smart_cache_js", array()), 'errors');
        echo "
                                ";
        // line 181
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["combineCompressCacheForm"]) ? $context["combineCompressCacheForm"] : null), "smart_cache_js", array()), 'widget');
        echo "
                            </div>
                            <div class=\"form-group\">
                                ";
        // line 184
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : null), "label_with_help", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Apache optimization", array(), "Admin.Advparameters.Feature"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This will add directives to your .htaccess file, which should improve caching and compression.", array(), "Admin.Advparameters.Help")), "method"), "html", null, true);
        echo "
                                ";
        // line 185
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["combineCompressCacheForm"]) ? $context["combineCompressCacheForm"] : null), "apache_optimization", array()), 'errors');
        echo "
                                ";
        // line 186
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["combineCompressCacheForm"]) ? $context["combineCompressCacheForm"] : null), "apache_optimization", array()), 'widget');
        echo "
                            </div>
                            ";
        // line 188
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["combineCompressCacheForm"]) ? $context["combineCompressCacheForm"] : null), 'rest');
        echo "
                        </div>
                    </div>
                    <div class=\"card-footer\">
                        <div class=\"d-flex justify-content-end\">
                            <button class=\"btn btn-primary\">";
        // line 193
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", array(), "Admin.Actions"), "html", null, true);
        echo "</button>
                        </div>
                    </div>
                </div>
            </div>
            ";
    }

    // line 202
    public function block_perfs_form_media_servers($context, array $blocks = array())
    {
        // line 203
        echo "            <div class=\"col\">
                <div class=\"card\">
                    <h3 class=\"card-header\">
                        <i class=\"material-icons\">link</i> ";
        // line 206
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Media servers (use only with CCC)", array(), "Admin.Advparameters.Feature"), "html", null, true);
        echo "
                    </h3>
                    <div class=\"card-block\">
                        <div class=\"card-text\">

                            ";
        // line 211
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : null), "infotip", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You must enter another domain, or subdomain, in order to use cookieless static content.", array(), "Admin.Advparameters.Feature")), "method"), "html", null, true);
        echo "

                            <div class=\"form-group\">
                                ";
        // line 214
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : null), "label_with_help", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Media server #1", array(), "Admin.Advparameters.Feature"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Name of the second domain of your shop, (e.g. myshop-media-server-1.com). If you do not have another domain, leave this field blank.", array(), "Admin.Advparameters.Help")), "method"), "html", null, true);
        echo "
                                ";
        // line 215
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["mediaServersForm"]) ? $context["mediaServersForm"] : null), "media_server_one", array()), 'errors');
        echo "
                                ";
        // line 216
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["mediaServersForm"]) ? $context["mediaServersForm"] : null), "media_server_one", array()), 'widget');
        echo "
                            </div>
                            <div class=\"form-group\">
                                ";
        // line 219
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : null), "label_with_help", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Media server #2", array(), "Admin.Advparameters.Feature"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Name of the third domain of your shop, (e.g. myshop-media-server-2.com). If you do not have another domain, leave this field blank.", array(), "Admin.Advparameters.Help")), "method"), "html", null, true);
        echo "
                                ";
        // line 220
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["mediaServersForm"]) ? $context["mediaServersForm"] : null), "media_server_two", array()), 'errors');
        echo "
                                ";
        // line 221
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["mediaServersForm"]) ? $context["mediaServersForm"] : null), "media_server_two", array()), 'widget');
        echo "
                            </div>
                            <div class=\"form-group\">
                                ";
        // line 224
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : null), "label_with_help", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Media server #3", array(), "Admin.Advparameters.Feature"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Name of the fourth domain of your shop, (e.g. myshop-media-server-3.com). If you do not have another domain, leave this field blank.", array(), "Admin.Advparameters.Help")), "method"), "html", null, true);
        echo "
                                ";
        // line 225
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["mediaServersForm"]) ? $context["mediaServersForm"] : null), "media_server_three", array()), 'errors');
        echo "
                                ";
        // line 226
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["mediaServersForm"]) ? $context["mediaServersForm"] : null), "media_server_three", array()), 'widget');
        echo "
                            </div>
                            ";
        // line 228
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["mediaServersForm"]) ? $context["mediaServersForm"] : null), 'rest');
        echo "
                        </div>
                    </div>
                    <div class=\"card-footer\">
                        <div class=\"d-flex justify-content-end\">
                            <button class=\"btn btn-primary\">";
        // line 233
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", array(), "Admin.Actions"), "html", null, true);
        echo "</button>
                        </div>
                    </div>
                </div>
            </div>
            ";
    }

    // line 240
    public function block_perfs_form_caching($context, array $blocks = array())
    {
        // line 241
        echo "            <div class=\"col\">
                <div class=\"card\">
                    <h3 class=\"card-header\">
                        <i class=\"material-icons\">link</i> ";
        // line 244
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Caching", array(), "Admin.Advparameters.Feature"), "html", null, true);
        echo "
                    </h3>
                    <div class=\"card-block\">
                        <div class=\"card-text\">
                            <div class=\"form-group\">
                                <label class=\"form-control-label\">";
        // line 249
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Use cache", array(), "Admin.Advparameters.Feature"), "html", null, true);
        echo "</label>
                                ";
        // line 250
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["cachingForm"]) ? $context["cachingForm"] : null), "use_cache", array()), 'errors');
        echo "
                                ";
        // line 251
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["cachingForm"]) ? $context["cachingForm"] : null), "use_cache", array()), 'widget');
        echo "
                            </div>
                            <div class=\"form-group memcache\" id=\"caching_systems\">
                                <label class=\"form-control-label\">";
        // line 254
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Caching system", array(), "Admin.Advparameters.Feature"), "html", null, true);
        echo "</label>
                                ";
        // line 255
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["cachingForm"]) ? $context["cachingForm"] : null), "caching_system", array()), 'errors');
        echo "
                                ";
        // line 256
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["cachingForm"]) ? $context["cachingForm"] : null), "caching_system", array()), 'widget');
        echo "
                            </div>
                            ";
        // line 258
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["cachingForm"]) ? $context["cachingForm"] : null), 'rest');
        echo "
                            ";
        // line 259
        echo twig_include($this->env, $context, "@AdvancedParameters/memcache_servers.html.twig", array("form" => (isset($context["memcacheForm"]) ? $context["memcacheForm"] : null)));
        echo "
                        </div>
                    </div>
                    <div class=\"card-footer\">
                        <div class=\"d-flex justify-content-end\">
                            <button class=\"btn btn-primary\">";
        // line 264
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save", array(), "Admin.Actions"), "html", null, true);
        echo "</button>
                        </div>
                    </div>
                </div>
            </div>
            ";
    }

    // line 275
    public function block_javascripts($context, array $blocks = array())
    {
        // line 276
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    <script src=\"";
        // line 277
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/admin_parameters/performancePage.js"), "html", null, true);
        echo "\"></script>
    <script>
        var configuration = {
            'addServerUrl': '";
        // line 280
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("admin_servers_add"), "js"), "html", null, true);
        echo "',
            'removeServerUrl': '";
        // line 281
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("admin_servers_delete"), "js"), "html", null, true);
        echo "',
            'testServerUrl': '";
        // line 282
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getUrl("admin_servers_test"), "js"), "html", null, true);
        echo "'
        };
        var app = new PerformancePage(
            configuration.addServerUrl,
            configuration.removeServerUrl,
            configuration.testServerUrl
        );

        window.addEventListener('load', function() {
            var addServerBtn = document.getElementById('add-server-btn');
            var testServerBtn = document.getElementById('test-server-btn');

            addServerBtn.addEventListener('click', function(event) {
                event.preventDefault();
                app.addServer();
            });

            testServerBtn.addEventListener('click', function(event) {
                event.preventDefault();
                app.testServer();
            });
        });
    </script>

    <script src=\"";
        // line 306
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/admin_parameters/performancePageUI.js"), "html", null, true);
        echo "\"></script>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Configure/AdvancedParameters/performance.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  638 => 306,  611 => 282,  607 => 281,  603 => 280,  597 => 277,  592 => 276,  589 => 275,  579 => 264,  571 => 259,  567 => 258,  562 => 256,  558 => 255,  554 => 254,  548 => 251,  544 => 250,  540 => 249,  532 => 244,  527 => 241,  524 => 240,  514 => 233,  506 => 228,  501 => 226,  497 => 225,  493 => 224,  487 => 221,  483 => 220,  479 => 219,  473 => 216,  469 => 215,  465 => 214,  459 => 211,  451 => 206,  446 => 203,  443 => 202,  433 => 193,  425 => 188,  420 => 186,  416 => 185,  412 => 184,  406 => 181,  402 => 180,  398 => 179,  392 => 176,  388 => 175,  384 => 174,  378 => 171,  370 => 166,  365 => 163,  362 => 162,  352 => 155,  344 => 150,  339 => 148,  335 => 147,  331 => 146,  325 => 143,  321 => 142,  317 => 141,  313 => 139,  307 => 137,  305 => 136,  299 => 133,  295 => 132,  291 => 131,  285 => 128,  277 => 123,  272 => 120,  269 => 119,  259 => 110,  251 => 105,  246 => 103,  242 => 102,  238 => 101,  232 => 98,  228 => 97,  224 => 96,  218 => 93,  214 => 92,  210 => 91,  202 => 86,  197 => 83,  194 => 82,  184 => 75,  176 => 70,  171 => 68,  167 => 67,  163 => 66,  157 => 63,  153 => 62,  149 => 61,  143 => 58,  139 => 57,  135 => 56,  129 => 53,  125 => 52,  121 => 51,  115 => 48,  111 => 47,  107 => 46,  99 => 41,  94 => 38,  91 => 37,  84 => 271,  81 => 270,  79 => 240,  76 => 239,  74 => 202,  69 => 199,  67 => 162,  64 => 161,  62 => 119,  57 => 116,  55 => 82,  52 => 81,  50 => 37,  45 => 35,  42 => 34,  39 => 33,  35 => 25,  33 => 30,  32 => 29,  11 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@PrestaShop/Admin/Configure/AdvancedParameters/performance.html.twig", "C:\\xampp\\htdocs\\17beststore\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Configure\\AdvancedParameters\\performance.html.twig");
    }
}
