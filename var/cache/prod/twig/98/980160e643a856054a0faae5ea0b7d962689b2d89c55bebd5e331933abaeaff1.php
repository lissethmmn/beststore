<?php

/* PrestaShopBundle:Admin/Module/Includes:notification_kpis.html.twig */
class __TwigTemplate_fa8c7655abc95111ca2ee0c60fac80bfe5b4b8c89e935071750a2c3790c1f60b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 25
        echo "<div class=\"row justify-content-center\">
    <div class=\"col-lg-10\">
        <div class=\"module-notification-kpis\">

            <div id=\"module-kpi-settings\" class=\"module-kpi\">
                <i class=\"material-icons\">settings</i>
                ";
        // line 31
        echo twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("%nbModules% modules to configure", array("%nbModules%" => twig_length_filter($this->env, $this->getAttribute((isset($context["modules"]) ? $context["modules"] : null), "to_configure", array()))), "Admin.Modules.Feature"), array("[1]" => "<span class=\"module-kpi-number\">", "[/1]" => "</span>"));
        echo "
            </div>

            <div id=\"module-kpi-update\" class=\"module-kpi\">
                <i class=\"material-icons\">update</i>
                ";
        // line 36
        echo twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("%nbModules% modules to update", array("%nbModules%" => twig_length_filter($this->env, $this->getAttribute((isset($context["modules"]) ? $context["modules"] : null), "to_update", array()))), "Admin.Modules.Feature"), array("[1]" => "<span class=\"module-kpi-number\">", "[/1]" => "</span>"));
        echo "
            </div>

        </div>
    </div>
</div>

<hr class=\"top-menu-separator\"/>
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module/Includes:notification_kpis.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 36,  27 => 31,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/Module/Includes:notification_kpis.html.twig", "C:\\xampp\\htdocs\\17beststore\\src\\PrestaShopBundle/Resources/views/Admin/Module/Includes/notification_kpis.html.twig");
    }
}
