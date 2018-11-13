<?php

/* PrestaShopBundle:Admin/Helpers:dropdown_menu.html.twig */
class __TwigTemplate_dc320a79edd3044ae9a20b085d81aabdfc1a8c5a69ea66c2acc34ddcb14fdf0d extends Twig_Template
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
        $context["buttonType"] = ((array_key_exists("buttonType", $context)) ? (_twig_default_filter((isset($context["buttonType"]) ? $context["buttonType"] : null), "primary")) : ("primary"));
        // line 26
        $context["right"] = ((array_key_exists("right", $context)) ? (_twig_default_filter((isset($context["right"]) ? $context["right"] : null), false)) : (false));
        // line 27
        echo "
<div class=\"";
        // line 28
        echo twig_escape_filter($this->env, ((array_key_exists("div_style", $context)) ? (_twig_default_filter((isset($context["div_style"]) ? $context["div_style"] : null), "btn-group dropdown")) : ("btn-group dropdown")), "html", null, true);
        echo "\">

  ";
        // line 30
        if (array_key_exists("default_item", $context)) {
            // line 31
            echo "    <a
      href=\"";
            // line 32
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["default_item"]) ? $context["default_item"] : null), "href", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["default_item"]) ? $context["default_item"] : null), "href", array()), "#")) : ("#")), "html", null, true);
            echo "\"
      title=\"";
            // line 33
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["default_item"]) ? $context["default_item"] : null), "title", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["default_item"]) ? $context["default_item"] : null), "title", array()), (($this->getAttribute((isset($context["default_item"]) ? $context["default_item"] : null), "label", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["default_item"]) ? $context["default_item"] : null), "label", array()), "")) : ("")))) : ((($this->getAttribute((isset($context["default_item"]) ? $context["default_item"] : null), "label", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["default_item"]) ? $context["default_item"] : null), "label", array()), "")) : ("")))), "html", null, true);
            echo "\"
      class=\"btn btn-";
            // line 34
            echo twig_escape_filter($this->env, (isset($context["buttonType"]) ? $context["buttonType"] : null), "html", null, true);
            echo "\"
      ";
            // line 35
            if ((array_key_exists("disabled", $context) && ((isset($context["disabled"]) ? $context["disabled"] : null) == true))) {
                echo "disabled=\"disabled\"";
            }
            // line 36
            echo "    >
      ";
            // line 37
            if ($this->getAttribute((isset($context["default_item"]) ? $context["default_item"] : null), "icon", array())) {
                // line 38
                echo "        <i class=\"material-icons\">";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["default_item"]) ? $context["default_item"] : null), "icon", array()), "html", null, true);
                echo "</i>
      ";
            }
            // line 40
            echo "      ";
            echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["default_item"]) ? $context["default_item"] : null), "label", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["default_item"]) ? $context["default_item"] : null), "label", array()), "")) : ("")), "html", null, true);
            echo "
    </a>
  ";
        }
        // line 43
        echo "
  <button
    ";
        // line 45
        if ((isset($context["button_id"]) ? $context["button_id"] : null)) {
            echo "id=\"";
            echo twig_escape_filter($this->env, (isset($context["button_id"]) ? $context["button_id"] : null), "html", null, true);
            echo "\"";
        }
        // line 46
        echo "    class=\"btn btn-";
        echo twig_escape_filter($this->env, (isset($context["buttonType"]) ? $context["buttonType"] : null), "html", null, true);
        echo " dropdown-toggle\"
    ";
        // line 47
        if ((array_key_exists("disabled", $context) && ((isset($context["disabled"]) ? $context["disabled"] : null) == true))) {
            echo "disabled=\"disabled\"";
        }
        // line 48
        echo "    data-toggle=\"dropdown\"
  >
    ";
        // line 50
        echo twig_escape_filter($this->env, ((array_key_exists("menu_label", $context)) ? (_twig_default_filter((isset($context["menu_label"]) ? $context["menu_label"] : null), "")) : ("")), "html", null, true);
        echo "
    <i class=\"";
        // line 51
        echo twig_escape_filter($this->env, ((array_key_exists("menu_icon", $context)) ? (_twig_default_filter((isset($context["menu_icon"]) ? $context["menu_icon"] : null), "icon-caret-down")) : ("icon-caret-down")), "html", null, true);
        echo "\"></i>
  </button>

  <div class=\"dropdown-menu";
        // line 54
        if ((isset($context["right"]) ? $context["right"] : null)) {
            echo " dropdown-menu-right";
        }
        echo "\">
    ";
        // line 55
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["items"]) ? $context["items"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["entry"]) {
            // line 56
            echo "      ";
            if (($this->getAttribute($context["entry"], "divider", array(), "any", true, true) && ($this->getAttribute($context["entry"], "divider", array()) == true))) {
                // line 57
                echo "        <div class=\"dropdown-divider\"></div>
      ";
            } else {
                // line 59
                echo "        <a
          class=\"dropdown-item\" href=\"";
                // line 60
                echo twig_escape_filter($this->env, (($this->getAttribute($context["entry"], "href", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["entry"], "href", array()), "#")) : ("#")), "html", null, true);
                echo "\"
          ";
                // line 61
                if ($this->getAttribute($context["entry"], "onclick", array(), "any", true, true)) {
                    echo "onclick=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["entry"], "onclick", array()), "html", null, true);
                    echo "\"";
                }
                // line 62
                echo "          ";
                if ($this->getAttribute($context["entry"], "target", array(), "any", true, true)) {
                    echo "target=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["entry"], "target", array()), "html", null, true);
                    echo "\"";
                }
                // line 63
                echo "        >
          ";
                // line 64
                if ($this->getAttribute($context["entry"], "icon", array())) {
                    // line 65
                    echo "            <i class=\"material-icons\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["entry"], "icon", array()), "html", null, true);
                    echo "</i>
          ";
                }
                // line 67
                echo "          ";
                echo twig_escape_filter($this->env, (($this->getAttribute($context["entry"], "label", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["entry"], "label", array()), "")) : ("")), "html", null, true);
                echo "
        </a>
      ";
            }
            // line 70
            echo "    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entry'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        echo "  </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Helpers:dropdown_menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  164 => 71,  158 => 70,  151 => 67,  145 => 65,  143 => 64,  140 => 63,  133 => 62,  127 => 61,  123 => 60,  120 => 59,  116 => 57,  113 => 56,  109 => 55,  103 => 54,  97 => 51,  93 => 50,  89 => 48,  85 => 47,  80 => 46,  74 => 45,  70 => 43,  63 => 40,  57 => 38,  55 => 37,  52 => 36,  48 => 35,  44 => 34,  40 => 33,  36 => 32,  33 => 31,  31 => 30,  26 => 28,  23 => 27,  21 => 26,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/Helpers:dropdown_menu.html.twig", "C:\\xampp\\htdocs\\17beststore\\src\\PrestaShopBundle/Resources/views/Admin/Helpers/dropdown_menu.html.twig");
    }
}
