<?php

/* PrestaShopBundle:Admin/Module/Includes:action_menu.html.twig */
class __TwigTemplate_d4c30663dd3fd0f3459778717f7bb20eba4f7b88d018969ab2858760083d6d91 extends Twig_Template
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
        list($context["url"], $context["priceRaw"], $context["priceDisplay"], $context["url_active"], $context["urls"], $context["name"]) =         array($this->getAttribute($this->getAttribute(        // line 26
(isset($context["module"]) ? $context["module"] : null), "attributes", array()), "url", array()), $this->getAttribute($this->getAttribute($this->getAttribute(        // line 27
(isset($context["module"]) ? $context["module"] : null), "attributes", array()), "price", array()), "raw", array()), $this->getAttribute($this->getAttribute($this->getAttribute(        // line 28
(isset($context["module"]) ? $context["module"] : null), "attributes", array()), "price", array()), "displayPrice", array()), $this->getAttribute($this->getAttribute(        // line 29
(isset($context["module"]) ? $context["module"] : null), "attributes", array()), "url_active", array()), $this->getAttribute($this->getAttribute(        // line 30
(isset($context["module"]) ? $context["module"] : null), "attributes", array()), "urls", array()), $this->getAttribute($this->getAttribute(        // line 31
(isset($context["module"]) ? $context["module"] : null), "attributes", array()), "name", array()));
        // line 33
        echo "
  ";
        // line 34
        if (((isset($context["url_active"]) ? $context["url_active"] : null) == "buy")) {
            // line 35
            echo "  <div class=\"form-action-button-container\">
    <a class=\"btn btn-primary btn-primary-reverse btn-block btn-outline-primary light-button module_action_menu_go_to_addons\" href=\"";
            // line 36
            echo twig_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : null), "html", null, true);
            echo "\" target=\"_blank\">
      ";
            // line 37
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Discover", array(), "Admin.Modules.Feature"), "html", null, true);
            echo "
    </a>
  </div>
  ";
        } elseif (twig_length_filter($this->env,         // line 40
(isset($context["urls"]) ? $context["urls"] : null))) {
            // line 41
            echo "  <div class=\"btn-group form-action-button-container\">
    <form class=\"btn-group form-action-button\" method=\"post\" action=\"";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["urls"]) ? $context["urls"] : null), (isset($context["url_active"]) ? $context["url_active"] : null), array(), "array"), "html", null, true);
            echo "\">
      <button type=\"submit\" class=\"btn btn-primary-reverse btn-outline-primary light-button module_action_menu_";
            // line 43
            echo twig_escape_filter($this->env, (isset($context["url_active"]) ? $context["url_active"] : null), "html", null, true);
            echo "\"
          data-confirm_modal=\"module-modal-confirm-";
            // line 44
            echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, (isset($context["url_active"]) ? $context["url_active"] : null), "html", null, true);
            echo "\">
          ";
            // line 45
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(twig_replace_filter(twig_capitalize_string_filter($this->env, (isset($context["url_active"]) ? $context["url_active"] : null)), array("_" => " ")), array(), "Admin.Actions"), "html", null, true);
            echo "
      </button>
    </form>
    ";
            // line 48
            if ((twig_length_filter($this->env, (isset($context["urls"]) ? $context["urls"] : null)) > 1)) {
                // line 49
                echo "          <input type=\"hidden\" class=\"btn\">
          <button type=\"button\" class=\"btn btn-outline-primary dropdown-toggle dropdown-toggle-split\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
            <span class=\"caret\"></span>
            <span class=\"sr-only\">";
                // line 52
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Toggle Dropdown", array(), "Admin.Modules.Feature"), "html", null, true);
                echo "</span>
          </button>
          <div class=\"dropdown-menu\">
            ";
                // line 55
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["urls"]) ? $context["urls"] : null));
                foreach ($context['_seq'] as $context["module_action"] => $context["module_url"]) {
                    // line 56
                    echo "              ";
                    if (($context["module_action"] != (isset($context["url_active"]) ? $context["url_active"] : null))) {
                        // line 57
                        echo "                  <li>
                    <form method=\"post\" action=\"";
                        // line 58
                        echo twig_escape_filter($this->env, $context["module_url"], "html", null, true);
                        echo "\">
                      <button type=\"submit\" class=\"dropdown-item module_action_menu_";
                        // line 59
                        echo twig_escape_filter($this->env, $context["module_action"], "html", null, true);
                        echo "\" data-confirm_modal=\"module-modal-confirm-";
                        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
                        echo "-";
                        echo twig_escape_filter($this->env, $context["module_action"], "html", null, true);
                        echo "\">
                        ";
                        // line 60
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(twig_replace_filter(twig_capitalize_string_filter($this->env, $context["module_action"]), array("_" => " ")), array(), "Admin.Actions"), "html", null, true);
                        echo "
                      </button>
                    </form>
                  </li>
              ";
                    }
                    // line 65
                    echo "            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['module_action'], $context['module_url'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 66
                echo "          </div>
    ";
            }
            // line 68
            echo "  </div>
  ";
        }
    }

    public function getTemplateName()
    {
        return "PrestaShopBundle:Admin/Module/Includes:action_menu.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 68,  119 => 66,  113 => 65,  105 => 60,  97 => 59,  93 => 58,  90 => 57,  87 => 56,  83 => 55,  77 => 52,  72 => 49,  70 => 48,  64 => 45,  58 => 44,  54 => 43,  50 => 42,  47 => 41,  45 => 40,  39 => 37,  35 => 36,  32 => 35,  30 => 34,  27 => 33,  25 => 31,  24 => 30,  23 => 29,  22 => 28,  21 => 27,  20 => 26,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PrestaShopBundle:Admin/Module/Includes:action_menu.html.twig", "C:\\xampp\\htdocs\\17beststore\\src\\PrestaShopBundle/Resources/views/Admin/Module/Includes/action_menu.html.twig");
    }
}
