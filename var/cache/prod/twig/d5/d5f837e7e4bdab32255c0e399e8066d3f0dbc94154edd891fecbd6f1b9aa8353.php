<?php

/* PrestaShopBundle:Admin/Module/Includes:sorting.html.twig */
class __TwigTemplate_f93358eb024d5b5471c2df22f7fb944db77cf64cc50412b6afcbf79e00972d1f extends Twig_Template
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
        echo "<div class=\"module-sorting-menu\">
    <div class=\"row\">
        <div class=\"col-lg-6\">
            <div class=\"module-sorting-search-wording\">
                <span id=\"selected_modules\" class=\"module-search-result-wording\">";
        // line 29
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("%nbModules% modules and services selected for you", array("%nbModules%" => (isset($context["totalModules"]) ? $context["totalModules"] : null)), "Admin.Modules.Feature"), "html", null, true);
        echo "</span>
                <span class=\"help-box\" data-toggle=\"popover\"
                    data-title=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Selection", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "\"
                    data-content=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Customize your store with this selection of modules recommended for your shop, based on your country, language and version of PrestaShop. It includes the most popular modules from our Addons marketplace, and free partner modules.", array(), "Admin.Modules.Help"), "html", null, true);
        echo "\">
                </span>
            </div>
        </div>
        <div class=\"col-lg-6\">
            <div class=\"module-sorting module-sorting-author float-right\">
                <select id=\"sort_module\" class=\"custom-select sort-component\">
                  <option value=\"\" disabled selected>- ";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Sort by", array(), "Admin.Actions"), "html", null, true);
        echo " -</option>
                  <option value=\"name\">";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Name", array(), "Admin.Global"), "html", null, true);
        echo "</option>
                  <option value=\"price\">";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Increasing Price", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "</option>
                  <option value=\"price-desc\">";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Decreasing Price", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "</option>
                  <option value=\"scoring-desc\">";
        // line 43
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Popularity", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "</option>
                </select>
            </div>
        </div>
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module/Includes:sorting.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 43,  56 => 42,  52 => 41,  48 => 40,  44 => 39,  34 => 32,  30 => 31,  25 => 29,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/Module/Includes:sorting.html.twig", "C:\\xampp\\htdocs\\17beststore\\src\\PrestaShopBundle/Resources/views/Admin/Module/Includes/sorting.html.twig");
    }
}
