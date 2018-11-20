<?php

/* @PrestaShop/Admin/ProductImage/form.html.twig */
class __TwigTemplate_d31e1860aab4618d09b5eb742338533274d591b7c2e232307fcd2a8377bc80bf extends Twig_Template
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
        echo "<button type=\"button\" class=\"float-right close\" onclick=\"formImagesProduct.close()\"><i class=\"material-icons\">close</i></button>

<div class=\"row\">
    <div class=\"col-lg-12 col-xl-7\">
      ";
        // line 29
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "cover", array()), 'widget');
        echo "
    </div>
    <div class=\"col-lg-12 col-xl-4\">
        <a href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "base_image_url", array()), "html", null, true);
        echo ".";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "format", array()), "html", null, true);
        echo "\" class=\"btn btn-link btn-sm open-image\" target=\"_blank\">
          <i class=\"material-icons\">zoom_in</i> ";
        // line 33
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Zoom", array(), "Admin.Catalog.Feature"), "html", null, true);
        echo "
        </a>
    </div>
</div>

<label class=\"control-label\">";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "legend", array()), "vars", array()), "label", array()), "html", null, true);
        echo "</label>
";
        // line 39
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "legend", array()), 'widget');
        echo "
";
        // line 40
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "legend", array()), 'errors');
        echo "

<div class=\"actions\">
    <button type=\"button\" class=\"btn btn-sm btn-primary pull-sm-right\" onclick=\"formImagesProduct.send(";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "id", array()), "html", null, true);
        echo ")\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Save image settings", array(), "Admin.Actions"), "html", null, true);
        echo "</button>
    <button type=\"button\" class=\"btn btn-sm btn-link\" onclick=\"formImagesProduct.delete(";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["image"]) ? $context["image"] : null), "id", array()), "html", null, true);
        echo ")\"><i class=\"material-icons\">delete</i> ";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Delete", array(), "Admin.Actions"), "html", null, true);
        echo "</button>
</div>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/ProductImage/form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  65 => 44,  59 => 43,  53 => 40,  49 => 39,  45 => 38,  37 => 33,  31 => 32,  25 => 29,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@PrestaShop/Admin/ProductImage/form.html.twig", "C:\\xampp\\htdocs\\17beststore\\src\\PrestaShopBundle\\Resources\\views\\Admin\\ProductImage\\form.html.twig");
    }
}
