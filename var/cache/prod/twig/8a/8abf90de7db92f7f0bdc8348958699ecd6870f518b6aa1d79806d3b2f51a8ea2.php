<?php

/* @Product/CatalogPage/Blocks/tools.html.twig */
class __TwigTemplate_b62de9d5431ebabbf05d06c0f71a43c487a1e575fca03fa1a37824980ac7f30f extends Twig_Template
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
        echo "<div class=\"col-2 text-right\">
  <div class=\"dropdown\">
    <button class=\"btn btn-text dropdown-toggle tool-button\"
            id=\"catalog-tools-button\"
            data-toggle=\"dropdown\"
            aria-haspopup=\"true\"
            aria-expanded=\"false\"
            title=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Settings", array(), "Admin.Global"), "html", null, true);
        echo "\"
    >
      <span class=\"sr-only\">";
        // line 34
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Settings", array(), "Admin.Global"), "html", null, true);
        echo "</span>
    </button>
    <div class=\"dropdown-menu dropdown-menu-right\" aria-labelledby=\"catalog-tools-button\">
      ";
        // line 37
        echo $this->env->getExtension('PrestaShopBundle\Twig\HookExtension')->renderHook("displayDashboardToolbarIcons", array());
        echo "
      <a id=\"desc-product-export\" class=\"dropdown-item\" href=\"";
        // line 38
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_product_export_action");
        echo "\">
        ";
        // line 39
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Export", array(), "Admin.Actions"), "html", null, true);
        echo "
      </a>
      <a id=\"desc-product-import\" class=\"dropdown-item\" href=\"";
        // line 41
        echo twig_escape_filter($this->env, (isset($context["import_link"]) ? $context["import_link"] : null), "html", null, true);
        echo "\">
        ";
        // line 42
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Import", array(), "Admin.Actions"), "html", null, true);
        echo "
      </a>
      <a id=\"desc-product-show-sql\" class=\"dropdown-item\" href=\"javascript:void(0);\" onclick=\"showLastSqlQuery();\">
        ";
        // line 45
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Show SQL query", array(), "Admin.Actions"), "html", null, true);
        echo "
      </a>
      <a id=\"desc-product-sql-manager\" class=\"dropdown-item\" href=\"javascript:void(0);\" onclick=\"sendLastSqlQuery(createSqlQueryName());\">
        ";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Export to SQL Manager", array(), "Admin.Actions"), "html", null, true);
        echo "
      </a>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@Product/CatalogPage/Blocks/tools.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 48,  62 => 45,  56 => 42,  52 => 41,  47 => 39,  43 => 38,  39 => 37,  33 => 34,  28 => 32,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@Product/CatalogPage/Blocks/tools.html.twig", "C:\\xampp\\htdocs\\17beststore\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\CatalogPage\\Blocks\\tools.html.twig");
    }
}
