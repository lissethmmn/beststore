<?php

/* @PrestaShop/Admin/Configure/AdvancedParameters/performance.html.twig */
class __TwigTemplate_08245fd30dbff81cee212facc776ccba9ab9eaef6efc5a5e21875065f4abef03 extends Twig_Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Configure/AdvancedParameters/performance.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@PrestaShop/Admin/Configure/AdvancedParameters/performance.html.twig"));

        // line 29
        list($context["smartyForm"], $context["debugModeForm"], $context["optionalFeaturesForm"], $context["combineCompressCacheForm"], $context["mediaServersForm"], $context["cachingForm"], $context["memcacheForm"]) =         array($this->getAttribute(        // line 30
(isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "smarty", array()), $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "debug_mode", array()), $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "optional_features", array()), $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "ccc", array()), $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "media_servers", array()), $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "caching", array()), $this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "add_memcache_server", array()));
        // line 25
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 33
    public function block_content($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "content"));

        // line 34
        echo "    <div class=\"container\">
        ";
        // line 35
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start', array("attr" => array("class" => "form")));
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
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
        echo "
    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 37
    public function block_perfs_form_smarty_cache($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "perfs_form_smarty_cache"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "perfs_form_smarty_cache"));

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
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["smartyForm"]) ? $context["smartyForm"] : $this->getContext($context, "smartyForm")), "template_compilation", array()), 'errors');
        echo "
                                ";
        // line 48
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["smartyForm"]) ? $context["smartyForm"] : $this->getContext($context, "smartyForm")), "template_compilation", array()), 'widget');
        echo "
                            </div>
                            <div class=\"form-group\">
                                ";
        // line 51
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "label_with_help", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Cache", array(), "Admin.Advparameters.Feature"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Should be enabled except for debugging.", array(), "Admin.Advparameters.Feature")), "method"), "html", null, true);
        echo "
                                ";
        // line 52
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["smartyForm"]) ? $context["smartyForm"] : $this->getContext($context, "smartyForm")), "cache", array()), 'errors');
        echo "
                                ";
        // line 53
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["smartyForm"]) ? $context["smartyForm"] : $this->getContext($context, "smartyForm")), "cache", array()), 'widget');
        echo "
                            </div>
                            <div class=\"form-group smarty-cache-option\">
                                ";
        // line 56
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "label_with_help", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Multi-front optimizations", array(), "Admin.Advparameters.Feature"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Should be enabled if you want to avoid to store the smarty cache on NFS.", array(), "Admin.Advparameters.Help")), "method"), "html", null, true);
        echo "
                                ";
        // line 57
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["smartyForm"]) ? $context["smartyForm"] : $this->getContext($context, "smartyForm")), "multi_front_optimization", array()), 'errors');
        echo "
                                ";
        // line 58
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["smartyForm"]) ? $context["smartyForm"] : $this->getContext($context, "smartyForm")), "multi_front_optimization", array()), 'widget');
        echo "
                            </div>
                            <div class=\"form-group smarty-cache-option\">
                                <label class=\"form-control-label\">";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Caching type", array(), "Admin.Advparameters.Feature"), "html", null, true);
        echo "</label>
                                ";
        // line 62
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["smartyForm"]) ? $context["smartyForm"] : $this->getContext($context, "smartyForm")), "caching_type", array()), 'errors');
        echo "
                                ";
        // line 63
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["smartyForm"]) ? $context["smartyForm"] : $this->getContext($context, "smartyForm")), "caching_type", array()), 'widget');
        echo "
                            </div>
                            <div class=\"form-group smarty-cache-option\">
                                <label class=\"form-control-label\">";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Clear cache", array(), "Admin.Advparameters.Feature"), "html", null, true);
        echo "</label>
                                ";
        // line 67
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["smartyForm"]) ? $context["smartyForm"] : $this->getContext($context, "smartyForm")), "clear_cache", array()), 'errors');
        echo "
                                ";
        // line 68
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["smartyForm"]) ? $context["smartyForm"] : $this->getContext($context, "smartyForm")), "clear_cache", array()), 'widget');
        echo "
                            </div>
                            ";
        // line 70
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["smartyForm"]) ? $context["smartyForm"] : $this->getContext($context, "smartyForm")), 'rest');
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
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 82
    public function block_perfs_form_debug_mode($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "perfs_form_debug_mode"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "perfs_form_debug_mode"));

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
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "label_with_help", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Disable non PrestaShop modules", array(), "Admin.Advparameters.Feature"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Enable or disable non PrestaShop Modules.", array(), "Admin.Advparameters.Feature")), "method"), "html", null, true);
        echo "
                                ";
        // line 92
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["debugModeForm"]) ? $context["debugModeForm"] : $this->getContext($context, "debugModeForm")), "disable_non_native_modules", array()), 'errors');
        echo "
                                ";
        // line 93
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["debugModeForm"]) ? $context["debugModeForm"] : $this->getContext($context, "debugModeForm")), "disable_non_native_modules", array()), 'widget');
        echo "
                            </div>
                            <div class=\"form-group\">
                                ";
        // line 96
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "label_with_help", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Disable all overrides", array(), "Admin.Advparameters.Feature"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Enable or disable all classes and controllers overrides.", array(), "Admin.Advparameters.Feature")), "method"), "html", null, true);
        echo "
                                ";
        // line 97
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["debugModeForm"]) ? $context["debugModeForm"] : $this->getContext($context, "debugModeForm")), "disable_overrides", array()), 'errors');
        echo "
                                ";
        // line 98
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["debugModeForm"]) ? $context["debugModeForm"] : $this->getContext($context, "debugModeForm")), "disable_overrides", array()), 'widget');
        echo "
                            </div>
                            <div class=\"form-group\">
                                ";
        // line 101
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "label_with_help", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Debug mode", array(), "Admin.Advparameters.Feature"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Enable or disable debug mode.", array(), "Admin.Advparameters.Help")), "method"), "html", null, true);
        echo "
                                ";
        // line 102
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["debugModeForm"]) ? $context["debugModeForm"] : $this->getContext($context, "debugModeForm")), "debug_mode", array()), 'errors');
        echo "
                                ";
        // line 103
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["debugModeForm"]) ? $context["debugModeForm"] : $this->getContext($context, "debugModeForm")), "debug_mode", array()), 'widget');
        echo "
                            </div>
                            ";
        // line 105
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["debugModeForm"]) ? $context["debugModeForm"] : $this->getContext($context, "debugModeForm")), 'rest');
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
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 119
    public function block_perfs_form_optional_features($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "perfs_form_optional_features"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "perfs_form_optional_features"));

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
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "infotip", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Some features can be disabled in order to improve performance.", array(), "Admin.Advparameters.Help")), "method"), "html", null, true);
        echo "

                            <div class=\"form-group\">
                                ";
        // line 131
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "label_with_help", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Combinations", array(), "Admin.Global"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Choose \"No\" to disable Product Combinations.", array(), "Admin.Advparameters.Help")), "method"), "html", null, true);
        echo "
                                ";
        // line 132
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["optionalFeaturesForm"]) ? $context["optionalFeaturesForm"] : $this->getContext($context, "optionalFeaturesForm")), "combinations", array()), 'errors');
        echo "
                                ";
        // line 133
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["optionalFeaturesForm"]) ? $context["optionalFeaturesForm"] : $this->getContext($context, "optionalFeaturesForm")), "combinations", array()), 'widget');
        echo "
                            </div>

                            ";
        // line 136
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["optionalFeaturesForm"]) ? $context["optionalFeaturesForm"] : $this->getContext($context, "optionalFeaturesForm")), "combinations", array()), "vars", array()), "disabled", array())) {
            // line 137
            echo "                                ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "warningtip", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You cannot set this parameter to No when combinations are already used by some of your products", array(), "Admin.Advparameters.Help")), "method"), "html", null, true);
            echo "
                            ";
        }
        // line 139
        echo "
                            <div class=\"form-group\">
                                ";
        // line 141
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "label_with_help", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Features", array(), "Admin.Global"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Choose \"No\" to disable Product Features.", array(), "Admin.Advparameters.Help")), "method"), "html", null, true);
        echo "
                                ";
        // line 142
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["optionalFeaturesForm"]) ? $context["optionalFeaturesForm"] : $this->getContext($context, "optionalFeaturesForm")), "features", array()), 'errors');
        echo "
                                ";
        // line 143
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["optionalFeaturesForm"]) ? $context["optionalFeaturesForm"] : $this->getContext($context, "optionalFeaturesForm")), "features", array()), 'widget');
        echo "
                            </div>
                            <div class=\"form-group\">
                                ";
        // line 146
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "label_with_help", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Customer groups", array(), "Admin.Advparameters.Feature"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Choose \"No\" to disable Customer Groups.", array(), "Admin.Advparameters.Help")), "method"), "html", null, true);
        echo "
                                ";
        // line 147
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["optionalFeaturesForm"]) ? $context["optionalFeaturesForm"] : $this->getContext($context, "optionalFeaturesForm")), "customer_groups", array()), 'errors');
        echo "
                                ";
        // line 148
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["optionalFeaturesForm"]) ? $context["optionalFeaturesForm"] : $this->getContext($context, "optionalFeaturesForm")), "customer_groups", array()), 'widget');
        echo "
                            </div>
                            ";
        // line 150
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["optionalFeaturesForm"]) ? $context["optionalFeaturesForm"] : $this->getContext($context, "optionalFeaturesForm")), 'rest');
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
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 162
    public function block_perfs_form_ccc($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "perfs_form_ccc"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "perfs_form_ccc"));

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
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "infotip", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("CCC allows you to reduce the loading time of your page. With these settings you will gain performance without even touching the code of your theme. Make sure, however, that your theme is compatible with PrestaShop 1.4+. Otherwise, CCC will cause problems.", array(), "Admin.Advparameters.Help")), "method"), "html", null, true);
        echo "

                            <div class=\"form-group\">
                                <label class=\"form-control-label\">";
        // line 174
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Smart cache for CSS", array(), "Admin.Advparameters.Feature"), "html", null, true);
        echo "</label>
                                ";
        // line 175
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["combineCompressCacheForm"]) ? $context["combineCompressCacheForm"] : $this->getContext($context, "combineCompressCacheForm")), "smart_cache_css", array()), 'errors');
        echo "
                                ";
        // line 176
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["combineCompressCacheForm"]) ? $context["combineCompressCacheForm"] : $this->getContext($context, "combineCompressCacheForm")), "smart_cache_css", array()), 'widget');
        echo "
                            </div>
                            <div class=\"form-group\">
                                <label class=\"form-control-label\">";
        // line 179
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Smart cache for JavaScript", array(), "Admin.Advparameters.Feature"), "html", null, true);
        echo "</label>
                                ";
        // line 180
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["combineCompressCacheForm"]) ? $context["combineCompressCacheForm"] : $this->getContext($context, "combineCompressCacheForm")), "smart_cache_js", array()), 'errors');
        echo "
                                ";
        // line 181
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["combineCompressCacheForm"]) ? $context["combineCompressCacheForm"] : $this->getContext($context, "combineCompressCacheForm")), "smart_cache_js", array()), 'widget');
        echo "
                            </div>
                            <div class=\"form-group\">
                                ";
        // line 184
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "label_with_help", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Apache optimization", array(), "Admin.Advparameters.Feature"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This will add directives to your .htaccess file, which should improve caching and compression.", array(), "Admin.Advparameters.Help")), "method"), "html", null, true);
        echo "
                                ";
        // line 185
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["combineCompressCacheForm"]) ? $context["combineCompressCacheForm"] : $this->getContext($context, "combineCompressCacheForm")), "apache_optimization", array()), 'errors');
        echo "
                                ";
        // line 186
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["combineCompressCacheForm"]) ? $context["combineCompressCacheForm"] : $this->getContext($context, "combineCompressCacheForm")), "apache_optimization", array()), 'widget');
        echo "
                            </div>
                            ";
        // line 188
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["combineCompressCacheForm"]) ? $context["combineCompressCacheForm"] : $this->getContext($context, "combineCompressCacheForm")), 'rest');
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
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 202
    public function block_perfs_form_media_servers($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "perfs_form_media_servers"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "perfs_form_media_servers"));

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
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "infotip", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("You must enter another domain, or subdomain, in order to use cookieless static content.", array(), "Admin.Advparameters.Feature")), "method"), "html", null, true);
        echo "

                            <div class=\"form-group\">
                                ";
        // line 214
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "label_with_help", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Media server #1", array(), "Admin.Advparameters.Feature"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Name of the second domain of your shop, (e.g. myshop-media-server-1.com). If you do not have another domain, leave this field blank.", array(), "Admin.Advparameters.Help")), "method"), "html", null, true);
        echo "
                                ";
        // line 215
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["mediaServersForm"]) ? $context["mediaServersForm"] : $this->getContext($context, "mediaServersForm")), "media_server_one", array()), 'errors');
        echo "
                                ";
        // line 216
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["mediaServersForm"]) ? $context["mediaServersForm"] : $this->getContext($context, "mediaServersForm")), "media_server_one", array()), 'widget');
        echo "
                            </div>
                            <div class=\"form-group\">
                                ";
        // line 219
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "label_with_help", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Media server #2", array(), "Admin.Advparameters.Feature"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Name of the third domain of your shop, (e.g. myshop-media-server-2.com). If you do not have another domain, leave this field blank.", array(), "Admin.Advparameters.Help")), "method"), "html", null, true);
        echo "
                                ";
        // line 220
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["mediaServersForm"]) ? $context["mediaServersForm"] : $this->getContext($context, "mediaServersForm")), "media_server_two", array()), 'errors');
        echo "
                                ";
        // line 221
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["mediaServersForm"]) ? $context["mediaServersForm"] : $this->getContext($context, "mediaServersForm")), "media_server_two", array()), 'widget');
        echo "
                            </div>
                            <div class=\"form-group\">
                                ";
        // line 224
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ps"]) ? $context["ps"] : $this->getContext($context, "ps")), "label_with_help", array(0 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Media server #3", array(), "Admin.Advparameters.Feature"), 1 => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Name of the fourth domain of your shop, (e.g. myshop-media-server-3.com). If you do not have another domain, leave this field blank.", array(), "Admin.Advparameters.Help")), "method"), "html", null, true);
        echo "
                                ";
        // line 225
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["mediaServersForm"]) ? $context["mediaServersForm"] : $this->getContext($context, "mediaServersForm")), "media_server_three", array()), 'errors');
        echo "
                                ";
        // line 226
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["mediaServersForm"]) ? $context["mediaServersForm"] : $this->getContext($context, "mediaServersForm")), "media_server_three", array()), 'widget');
        echo "
                            </div>
                            ";
        // line 228
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["mediaServersForm"]) ? $context["mediaServersForm"] : $this->getContext($context, "mediaServersForm")), 'rest');
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
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 240
    public function block_perfs_form_caching($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "perfs_form_caching"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "perfs_form_caching"));

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
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["cachingForm"]) ? $context["cachingForm"] : $this->getContext($context, "cachingForm")), "use_cache", array()), 'errors');
        echo "
                                ";
        // line 251
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["cachingForm"]) ? $context["cachingForm"] : $this->getContext($context, "cachingForm")), "use_cache", array()), 'widget');
        echo "
                            </div>
                            <div class=\"form-group memcache\" id=\"caching_systems\">
                                <label class=\"form-control-label\">";
        // line 254
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Caching system", array(), "Admin.Advparameters.Feature"), "html", null, true);
        echo "</label>
                                ";
        // line 255
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["cachingForm"]) ? $context["cachingForm"] : $this->getContext($context, "cachingForm")), "caching_system", array()), 'errors');
        echo "
                                ";
        // line 256
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["cachingForm"]) ? $context["cachingForm"] : $this->getContext($context, "cachingForm")), "caching_system", array()), 'widget');
        echo "
                            </div>
                            ";
        // line 258
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["cachingForm"]) ? $context["cachingForm"] : $this->getContext($context, "cachingForm")), 'rest');
        echo "
                            ";
        // line 259
        echo twig_include($this->env, $context, "@AdvancedParameters/memcache_servers.html.twig", array("form" => (isset($context["memcacheForm"]) ? $context["memcacheForm"] : $this->getContext($context, "memcacheForm"))));
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
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 275
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

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
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

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
        return array (  740 => 306,  713 => 282,  709 => 281,  705 => 280,  699 => 277,  694 => 276,  685 => 275,  669 => 264,  661 => 259,  657 => 258,  652 => 256,  648 => 255,  644 => 254,  638 => 251,  634 => 250,  630 => 249,  622 => 244,  617 => 241,  608 => 240,  592 => 233,  584 => 228,  579 => 226,  575 => 225,  571 => 224,  565 => 221,  561 => 220,  557 => 219,  551 => 216,  547 => 215,  543 => 214,  537 => 211,  529 => 206,  524 => 203,  515 => 202,  499 => 193,  491 => 188,  486 => 186,  482 => 185,  478 => 184,  472 => 181,  468 => 180,  464 => 179,  458 => 176,  454 => 175,  450 => 174,  444 => 171,  436 => 166,  431 => 163,  422 => 162,  406 => 155,  398 => 150,  393 => 148,  389 => 147,  385 => 146,  379 => 143,  375 => 142,  371 => 141,  367 => 139,  361 => 137,  359 => 136,  353 => 133,  349 => 132,  345 => 131,  339 => 128,  331 => 123,  326 => 120,  317 => 119,  301 => 110,  293 => 105,  288 => 103,  284 => 102,  280 => 101,  274 => 98,  270 => 97,  266 => 96,  260 => 93,  256 => 92,  252 => 91,  244 => 86,  239 => 83,  230 => 82,  214 => 75,  206 => 70,  201 => 68,  197 => 67,  193 => 66,  187 => 63,  183 => 62,  179 => 61,  173 => 58,  169 => 57,  165 => 56,  159 => 53,  155 => 52,  151 => 51,  145 => 48,  141 => 47,  137 => 46,  129 => 41,  124 => 38,  115 => 37,  102 => 271,  99 => 270,  97 => 240,  94 => 239,  92 => 202,  87 => 199,  85 => 162,  82 => 161,  80 => 119,  75 => 116,  73 => 82,  70 => 81,  68 => 37,  63 => 35,  60 => 34,  51 => 33,  41 => 25,  39 => 30,  38 => 29,  11 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{#**
 * 2007-2018 PrestaShop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/OSL-3.0
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@prestashop.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade PrestaShop to newer
 * versions in the future. If you wish to customize PrestaShop for your
 * needs please refer to http://www.prestashop.com for more information.
 *
 * @author    PrestaShop SA <contact@prestashop.com>
 * @copyright 2007-2018 PrestaShop SA
 * @license   https://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * International Registered Trademark & Property of PrestaShop SA
 *#}
{% extends '@PrestaShop/Admin/layout.html.twig' %}
{% trans_default_domain \"Admin.Advparameters.Feature\" %}

{%
    set smartyForm, debugModeForm, optionalFeaturesForm, combineCompressCacheForm, mediaServersForm, cachingForm, memcacheForm =
    form.smarty, form.debug_mode, form.optional_features, form.ccc, form.media_servers, form.caching, form.add_memcache_server
%}

{% block content %}
    <div class=\"container\">
        {{ form_start(form, {'attr' : {'class': 'form'} }) }}
        <div class=\"row\">
            {% block perfs_form_smarty_cache %}
            <div class=\"col\">
                <div class=\"card\">
                    <h3 class=\"card-header\">
                        <i class=\"material-icons\">business_center</i> {{ 'Smarty'|trans }}
                    </h3>
                    <div class=\"card-block\">
                        <div class=\"card-text\">
                            <div class=\"form-group\">
                                <label class=\"form-control-label\">{{ 'Template compilation'|trans }}</label>
                                {{ form_errors(smartyForm.template_compilation) }}
                                {{ form_widget(smartyForm.template_compilation) }}
                            </div>
                            <div class=\"form-group\">
                                {{ ps.label_with_help(('Cache'|trans), ('Should be enabled except for debugging.'|trans)) }}
                                {{ form_errors(smartyForm.cache) }}
                                {{ form_widget(smartyForm.cache) }}
                            </div>
                            <div class=\"form-group smarty-cache-option\">
                                {{ ps.label_with_help(('Multi-front optimizations'|trans), ('Should be enabled if you want to avoid to store the smarty cache on NFS.'|trans({}, 'Admin.Advparameters.Help'))) }}
                                {{ form_errors(smartyForm.multi_front_optimization) }}
                                {{ form_widget(smartyForm.multi_front_optimization) }}
                            </div>
                            <div class=\"form-group smarty-cache-option\">
                                <label class=\"form-control-label\">{{ 'Caching type'|trans }}</label>
                                {{ form_errors(smartyForm.caching_type) }}
                                {{ form_widget(smartyForm.caching_type) }}
                            </div>
                            <div class=\"form-group smarty-cache-option\">
                                <label class=\"form-control-label\">{{ 'Clear cache'|trans }}</label>
                                {{ form_errors(smartyForm.clear_cache) }}
                                {{ form_widget(smartyForm.clear_cache) }}
                            </div>
                            {{ form_rest(smartyForm) }}
                        </div>
                    </div>
                    <div class=\"card-footer\">
                        <div class=\"d-flex justify-content-end\">
                            <button class=\"btn btn-primary\">{{ 'Save'|trans({}, 'Admin.Actions') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            {% endblock %}

            {% block perfs_form_debug_mode %}
            <div class=\"col\">
                <div class=\"card\">
                    <h3 class=\"card-header\">
                        <i class=\"material-icons\">bug_report</i> {{ 'Debug mode'|trans }}
                    </h3>
                    <div class=\"card-block\">
                        <div class=\"card-text\">
                            <div class=\"form-group\">
                                {{ ps.label_with_help(('Disable non PrestaShop modules'|trans), ('Enable or disable non PrestaShop Modules.'|trans({}, 'Admin.Advparameters.Feature'))) }}
                                {{ form_errors(debugModeForm.disable_non_native_modules) }}
                                {{ form_widget(debugModeForm.disable_non_native_modules) }}
                            </div>
                            <div class=\"form-group\">
                                {{ ps.label_with_help(('Disable all overrides'|trans), ('Enable or disable all classes and controllers overrides.'|trans({}, 'Admin.Advparameters.Feature'))) }}
                                {{ form_errors(debugModeForm.disable_overrides) }}
                                {{ form_widget(debugModeForm.disable_overrides) }}
                            </div>
                            <div class=\"form-group\">
                                {{ ps.label_with_help(('Debug mode'|trans), ('Enable or disable debug mode.'|trans({}, 'Admin.Advparameters.Help'))) }}
                                {{ form_errors(debugModeForm.debug_mode) }}
                                {{ form_widget(debugModeForm.debug_mode) }}
                            </div>
                            {{ form_rest(debugModeForm) }}
                        </div>
                    </div>
                    <div class=\"card-footer\">
                        <div class=\"d-flex justify-content-end\">
                            <button class=\"btn btn-primary\">{{ 'Save'|trans({}, 'Admin.Actions') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            {% endblock %}
        </div>

        <div class=\"row\">
            {% block perfs_form_optional_features %}
            <div class=\"col\">
                <div class=\"card\">
                    <h3 class=\"card-header\">
                        <i class=\"material-icons\">extension</i> {{ 'Optional features'|trans }}
                    </h3>
                    <div class=\"card-block\">
                        <div class=\"card-text\">

                            {{ ps.infotip('Some features can be disabled in order to improve performance.'|trans({}, 'Admin.Advparameters.Help')) }}

                            <div class=\"form-group\">
                                {{ ps.label_with_help(('Combinations'|trans({}, 'Admin.Global')), ('Choose \"No\" to disable Product Combinations.'|trans({}, 'Admin.Advparameters.Help'))) }}
                                {{ form_errors(optionalFeaturesForm.combinations) }}
                                {{ form_widget(optionalFeaturesForm.combinations) }}
                            </div>

                            {% if optionalFeaturesForm.combinations.vars.disabled %}
                                {{ ps.warningtip('You cannot set this parameter to No when combinations are already used by some of your products'|trans({}, 'Admin.Advparameters.Help')) }}
                            {% endif %}

                            <div class=\"form-group\">
                                {{ ps.label_with_help(('Features'|trans({}, 'Admin.Global')), ('Choose \"No\" to disable Product Features.'|trans({}, 'Admin.Advparameters.Help'))) }}
                                {{ form_errors(optionalFeaturesForm.features) }}
                                {{ form_widget(optionalFeaturesForm.features) }}
                            </div>
                            <div class=\"form-group\">
                                {{ ps.label_with_help(('Customer groups'|trans), ('Choose \"No\" to disable Customer Groups.'|trans({}, 'Admin.Advparameters.Help'))) }}
                                {{ form_errors(optionalFeaturesForm.customer_groups) }}
                                {{ form_widget(optionalFeaturesForm.customer_groups) }}
                            </div>
                            {{ form_rest(optionalFeaturesForm) }}
                        </div>
                    </div>
                    <div class=\"card-footer\">
                        <div class=\"d-flex justify-content-end\">
                            <button class=\"btn btn-primary\">{{ 'Save'|trans({}, 'Admin.Actions') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            {% endblock %}

            {% block perfs_form_ccc %}
            <div class=\"col\">
                <div class=\"card\">
                    <h3 class=\"card-header\">
                        <i class=\"material-icons\">zoom_out_map</i> {{ 'CCC (Combine, Compress and Cache)'|trans }}
                    </h3>
                    <div class=\"card-block\">
                        <div class=\"card-text\">

                            {{ ps.infotip('CCC allows you to reduce the loading time of your page. With these settings you will gain performance without even touching the code of your theme. Make sure, however, that your theme is compatible with PrestaShop 1.4+. Otherwise, CCC will cause problems.'|trans({}, 'Admin.Advparameters.Help')) }}

                            <div class=\"form-group\">
                                <label class=\"form-control-label\">{{ 'Smart cache for CSS'|trans }}</label>
                                {{ form_errors(combineCompressCacheForm.smart_cache_css) }}
                                {{ form_widget(combineCompressCacheForm.smart_cache_css) }}
                            </div>
                            <div class=\"form-group\">
                                <label class=\"form-control-label\">{{ 'Smart cache for JavaScript'|trans }}</label>
                                {{ form_errors(combineCompressCacheForm.smart_cache_js) }}
                                {{ form_widget(combineCompressCacheForm.smart_cache_js) }}
                            </div>
                            <div class=\"form-group\">
                                {{ ps.label_with_help(('Apache optimization'|trans), ('This will add directives to your .htaccess file, which should improve caching and compression.'|trans({}, 'Admin.Advparameters.Help'))) }}
                                {{ form_errors(combineCompressCacheForm.apache_optimization) }}
                                {{ form_widget(combineCompressCacheForm.apache_optimization) }}
                            </div>
                            {{ form_rest(combineCompressCacheForm) }}
                        </div>
                    </div>
                    <div class=\"card-footer\">
                        <div class=\"d-flex justify-content-end\">
                            <button class=\"btn btn-primary\">{{ 'Save'|trans({}, 'Admin.Actions') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            {% endblock %}
        </div>

        <div class=\"row\">
            {% block perfs_form_media_servers %}
            <div class=\"col\">
                <div class=\"card\">
                    <h3 class=\"card-header\">
                        <i class=\"material-icons\">link</i> {{ 'Media servers (use only with CCC)'|trans }}
                    </h3>
                    <div class=\"card-block\">
                        <div class=\"card-text\">

                            {{ ps.infotip('You must enter another domain, or subdomain, in order to use cookieless static content.'|trans({}, 'Admin.Advparameters.Feature')) }}

                            <div class=\"form-group\">
                                {{ ps.label_with_help(('Media server #1'|trans({}, 'Admin.Advparameters.Feature')), ('Name of the second domain of your shop, (e.g. myshop-media-server-1.com). If you do not have another domain, leave this field blank.'|trans({}, 'Admin.Advparameters.Help'))) }}
                                {{ form_errors(mediaServersForm.media_server_one) }}
                                {{ form_widget(mediaServersForm.media_server_one) }}
                            </div>
                            <div class=\"form-group\">
                                {{ ps.label_with_help(('Media server #2'|trans({}, 'Admin.Advparameters.Feature')), ('Name of the third domain of your shop, (e.g. myshop-media-server-2.com). If you do not have another domain, leave this field blank.'|trans({}, 'Admin.Advparameters.Help'))) }}
                                {{ form_errors(mediaServersForm.media_server_two) }}
                                {{ form_widget(mediaServersForm.media_server_two) }}
                            </div>
                            <div class=\"form-group\">
                                {{ ps.label_with_help(('Media server #3'|trans({}, 'Admin.Advparameters.Feature')), ('Name of the fourth domain of your shop, (e.g. myshop-media-server-3.com). If you do not have another domain, leave this field blank.'|trans({}, 'Admin.Advparameters.Help'))) }}
                                {{ form_errors(mediaServersForm.media_server_three) }}
                                {{ form_widget(mediaServersForm.media_server_three) }}
                            </div>
                            {{ form_rest(mediaServersForm) }}
                        </div>
                    </div>
                    <div class=\"card-footer\">
                        <div class=\"d-flex justify-content-end\">
                            <button class=\"btn btn-primary\">{{ 'Save'|trans({}, 'Admin.Actions') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            {% endblock %}

            {% block perfs_form_caching %}
            <div class=\"col\">
                <div class=\"card\">
                    <h3 class=\"card-header\">
                        <i class=\"material-icons\">link</i> {{ 'Caching'|trans }}
                    </h3>
                    <div class=\"card-block\">
                        <div class=\"card-text\">
                            <div class=\"form-group\">
                                <label class=\"form-control-label\">{{ 'Use cache'|trans }}</label>
                                {{ form_errors(cachingForm.use_cache) }}
                                {{ form_widget(cachingForm.use_cache) }}
                            </div>
                            <div class=\"form-group memcache\" id=\"caching_systems\">
                                <label class=\"form-control-label\">{{ 'Caching system'|trans }}</label>
                                {{ form_errors(cachingForm.caching_system) }}
                                {{ form_widget(cachingForm.caching_system) }}
                            </div>
                            {{ form_rest(cachingForm) }}
                            {{ include('@AdvancedParameters/memcache_servers.html.twig', {'form': memcacheForm}) }}
                        </div>
                    </div>
                    <div class=\"card-footer\">
                        <div class=\"d-flex justify-content-end\">
                            <button class=\"btn btn-primary\">{{ 'Save'|trans({}, 'Admin.Actions') }}</button>
                        </div>
                    </div>
                </div>
            </div>
            {% endblock %}
        </div>
        {{ form_end(form) }}
    </div>
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script src=\"{{ asset('themes/default/js/bundle/admin_parameters/performancePage.js') }}\"></script>
    <script>
        var configuration = {
            'addServerUrl': '{{ url('admin_servers_add')|e('js') }}',
            'removeServerUrl': '{{ url('admin_servers_delete')|e('js') }}',
            'testServerUrl': '{{ url('admin_servers_test')|e('js') }}'
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

    <script src=\"{{ asset('themes/default/js/bundle/admin_parameters/performancePageUI.js') }}\"></script>
{% endblock %}
", "@PrestaShop/Admin/Configure/AdvancedParameters/performance.html.twig", "/home/beststor/public_html/version17/src/PrestaShopBundle/Resources/views/Admin/Configure/AdvancedParameters/performance.html.twig");
    }
}
