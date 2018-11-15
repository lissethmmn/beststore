<?php

/* @PrestaShop/Admin/Module/Includes/modal_read_more_content.html.twig */
class __TwigTemplate_24c7bdb8580478dcd11424709dc3beedbfbdb43092438679c426f1dfd98b0755 extends Twig_Template
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
        $context["ats"] = $this->getAttribute((isset($context["module"]) ? $context["module"] : null), "attributes", array());
        // line 26
        list($context["name"], $context["displayName"], $context["nbRates"], $context["starsRate"], $context["img"], $context["serviceUrl"], $context["version"], $context["cover"], $context["additionalDescription"], $context["fullDescription"], $context["changeLog"], $context["customerBenefits"], $context["demoVideo"], $context["author"], $context["notFoundImg"], $context["features"], $context["badges"]) =         array($this->getAttribute(        // line 29
(isset($context["ats"]) ? $context["ats"] : null), "name", array()), $this->getAttribute((isset($context["ats"]) ? $context["ats"] : null), "displayName", array()), $this->getAttribute((isset($context["ats"]) ? $context["ats"] : null), "nbRates", array()), $this->getAttribute((isset($context["ats"]) ? $context["ats"] : null), "starsRate", array()), $this->getAttribute((isset($context["ats"]) ? $context["ats"] : null), "img", array()), ((($this->getAttribute(        // line 30
(isset($context["ats"]) ? $context["ats"] : null), "serviceUrl", array(), "any", true, true) && (twig_length_filter($this->env, $this->getAttribute((isset($context["ats"]) ? $context["ats"] : null), "serviceUrl", array())) > 0))) ? ($this->getAttribute((isset($context["ats"]) ? $context["ats"] : null), "serviceUrl", array())) : (false)), $this->getAttribute(        // line 31
(isset($context["ats"]) ? $context["ats"] : null), "version", array()), $this->getAttribute((isset($context["ats"]) ? $context["ats"] : null), "cover", array()), ((($this->getAttribute(        // line 32
(isset($context["ats"]) ? $context["ats"] : null), "additionalDescription", array(), "any", true, true) && (twig_length_filter($this->env, $this->getAttribute((isset($context["ats"]) ? $context["ats"] : null), "additionalDescription", array())) > 0))) ? ($this->getAttribute((isset($context["ats"]) ? $context["ats"] : null), "additionalDescription", array())) : (false)), ((($this->getAttribute(        // line 33
(isset($context["ats"]) ? $context["ats"] : null), "fullDescription", array(), "any", true, true) && (twig_length_filter($this->env, $this->getAttribute((isset($context["ats"]) ? $context["ats"] : null), "fullDescription", array())) > 0))) ? ($this->getAttribute((isset($context["ats"]) ? $context["ats"] : null), "fullDescription", array())) : (false)), ((($this->getAttribute(        // line 34
(isset($context["ats"]) ? $context["ats"] : null), "changeLog", array(), "any", true, true) && (twig_length_filter($this->env, $this->getAttribute((isset($context["ats"]) ? $context["ats"] : null), "changeLog", array())) > 0))) ? ($this->getAttribute((isset($context["ats"]) ? $context["ats"] : null), "changeLog", array())) : (false)), ((($this->getAttribute(        // line 35
(isset($context["ats"]) ? $context["ats"] : null), "customer_benefits", array(), "any", true, true) && (twig_length_filter($this->env, $this->getAttribute((isset($context["ats"]) ? $context["ats"] : null), "customer_benefits", array())) > 0))) ? ($this->getAttribute((isset($context["ats"]) ? $context["ats"] : null), "customer_benefits", array())) : (false)), ((($this->getAttribute(        // line 36
(isset($context["ats"]) ? $context["ats"] : null), "demo_video", array(), "any", true, true) && (twig_length_filter($this->env, $this->getAttribute((isset($context["ats"]) ? $context["ats"] : null), "demo_video", array())) > 0))) ? ($this->getAttribute((isset($context["ats"]) ? $context["ats"] : null), "demo_video", array())) : (false)), $this->getAttribute(        // line 37
(isset($context["ats"]) ? $context["ats"] : null), "author", array()), "https://cdn4.iconfinder.com/data/icons/ballicons-2-free/100/box-512.png", $this->getAttribute(        // line 38
(isset($context["ats"]) ? $context["ats"] : null), "features", array()), ((($this->getAttribute(        // line 39
(isset($context["ats"]) ? $context["ats"] : null), "badges", array(), "any", true, true) && (twig_length_filter($this->env, $this->getAttribute((isset($context["ats"]) ? $context["ats"] : null), "badges", array())) > 0))) ? ($this->getAttribute((isset($context["ats"]) ? $context["ats"] : null), "badges", array())) : (false)));
        // line 41
        echo "<div class=\"modal-dialog module-modal-dialog\">
  <!-- Modal content-->
  <div class=\"modal-content module-modal-content no-padding\">
    <div class=\"modal-header module-modal-header\">
      ";
        // line 45
        if (((isset($context["nbRates"]) ? $context["nbRates"] : null) > 0)) {
            // line 46
            echo "        <div class=\"read-more-stars module-star-ranking-grid-";
            echo twig_escape_filter($this->env, (isset($context["starsRate"]) ? $context["starsRate"] : null), "html", null, true);
            echo "\">
          (
          ";
            // line 48
            echo twig_escape_filter($this->env, (isset($context["nbRates"]) ? $context["nbRates"] : null), "html", null, true);
            echo "
          )
        </div>
      ";
        }
        // line 52
        echo "      <div>
        <img class=\"module-logo-thumb\" height=\"57\" width=\"57\" src=\"";
        // line 53
        echo twig_escape_filter($this->env, (isset($context["img"]) ? $context["img"] : null), "html", null, true);
        echo "\" alt=\"";
        echo twig_escape_filter($this->env, (isset($context["displayName"]) ? $context["displayName"] : null), "html", null, true);
        echo "\"/>
        <div class=\"modal-title module-modal-title\">
          <h1>";
        // line 55
        echo twig_escape_filter($this->env, (isset($context["displayName"]) ? $context["displayName"] : null), "html", null, true);
        echo "<br>
            <small class=\"version small-text\">
              ";
        // line 57
        if ((array_key_exists("serviceUrl", $context) && (twig_length_filter($this->env, (isset($context["serviceUrl"]) ? $context["serviceUrl"] : null)) > 0))) {
            // line 58
            echo "                ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Service by %author%", array("%author%" => (isset($context["author"]) ? $context["author"] : null)), "Admin.Modules.Feature"), "html", null, true);
            echo "
              ";
        } else {
            // line 60
            echo "                ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("v%version% by %author%", array("%version%" => (isset($context["version"]) ? $context["version"] : null), "%author%" => (isset($context["author"]) ? $context["author"] : null)), "Admin.Modules.Feature"), "html", null, true);
            echo "
              ";
        }
        // line 62
        echo "            </small>
          </h1>

        </div>
      </div>
      <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
        <span aria-hidden=\"true\">&times;</span>
      </button>
    </div>

    <div class=\"modal-body row module-modal-body\">
      <div class=\"col-md-12 module-big-cover\">
        <img src=\"";
        // line 74
        if ($this->getAttribute((isset($context["cover"]) ? $context["cover"] : null), "big", array(), "any", true, true)) {
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["cover"]) ? $context["cover"] : null), "big", array()), "html", null, true);
        } else {
            echo twig_escape_filter($this->env, (isset($context["notFoundImg"]) ? $context["notFoundImg"] : null), "html", null, true);
        }
        echo "\"/>
      </div>
      <div class=\"col-md-12 module-menu-readmore\">
        <nav class=\"navbar navbar-light\">
          ";
        // line 79
        echo "          <ul class=\"nav nav-pills\">
            <li class=\"nav-item\">
              <a class=\"nav-link module-readmore-tab active\" data-toggle=\"tab\" href=\"#overview-";
        // line 81
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Overview", array(), "Admin.Modules.Feature"), "html", null, true);
        echo "</a>
            </li>
            ";
        // line 83
        if ((isset($context["additionalDescription"]) ? $context["additionalDescription"] : null)) {
            // line 84
            echo "              <li class=\"nav-item\">
                <a class=\"nav-link module-readmore-tab\" data-toggle=\"tab\" href=\"#additional-";
            // line 85
            echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Additional information", array(), "Admin.Modules.Feature"), "html", null, true);
            echo "</a>
              </li>
            ";
        }
        // line 88
        echo "            ";
        if ((isset($context["customerBenefits"]) ? $context["customerBenefits"] : null)) {
            // line 89
            echo "              <li class=\"nav-item\">
                <a class=\"nav-link module-readmore-tab\" data-toggle=\"tab\" href=\"#customer_benefits-";
            // line 90
            echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Benefits", array(), "Admin.Modules.Feature"), "html", null, true);
            echo "</a>
              </li>
            ";
        }
        // line 93
        echo "            ";
        if ((isset($context["features"]) ? $context["features"] : null)) {
            // line 94
            echo "              <li class=\"nav-item\">
                <a class=\"nav-link module-readmore-tab\" data-toggle=\"tab\" href=\"#features-";
            // line 95
            echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Features", array(), "Admin.Modules.Feature"), "html", null, true);
            echo "</a>
              </li>
            ";
        }
        // line 98
        echo "            ";
        if ((isset($context["demoVideo"]) ? $context["demoVideo"] : null)) {
            // line 99
            echo "              <li class=\"nav-item\">
                <a class=\"nav-link module-readmore-tab\" data-toggle=\"tab\" href=\"#demo_video-";
            // line 100
            echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Demo video", array(), "Admin.Modules.Feature"), "html", null, true);
            echo "</a>
              </li>
            ";
        }
        // line 103
        echo "            ";
        if ((isset($context["changeLog"]) ? $context["changeLog"] : null)) {
            // line 104
            echo "              <li class=\"nav-item\">
                <a class=\"nav-link module-readmore-tab\" data-toggle=\"tab\" href=\"#changelog-";
            // line 105
            echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Changelog", array(), "Admin.Modules.Feature"), "html", null, true);
            echo "</a>
              </li>
            ";
        }
        // line 108
        echo "            ";
        // line 109
        echo "          </ul>
        </nav>
        <div class=\"tab-content\">
          ";
        // line 113
        echo "          <div id=\"overview-";
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "\" class=\"tab-pane fade in active\">
            <p class=\"module-readmore-tab-content\">
              ";
        // line 115
        if ((isset($context["fullDescription"]) ? $context["fullDescription"] : null)) {
            // line 116
            echo "                ";
            echo (isset($context["fullDescription"]) ? $context["fullDescription"] : null);
            echo "
              ";
        } else {
            // line 118
            echo "                ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("No description found for this module :(", array(), "Admin.Modules.Notification"), "html", null, true);
            echo "
              ";
        }
        // line 120
        echo "            </p>
          </div>

          <div id=\"additional-";
        // line 123
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "\" class=\"tab-pane fade\">
            <p class=\"module-readmore-tab-content\">
              ";
        // line 125
        if ((isset($context["additionalDescription"]) ? $context["additionalDescription"] : null)) {
            // line 126
            echo "                ";
            echo (isset($context["additionalDescription"]) ? $context["additionalDescription"] : null);
            echo "
              ";
        } else {
            // line 128
            echo "                ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("No additional description provided for this module :(", array(), "Admin.Modules.Notification"), "html", null, true);
            echo "
              ";
        }
        // line 130
        echo "            </p>
          </div>

          <div id=\"features-";
        // line 133
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "\" class=\"tab-pane fade\">
            <p class=\"module-readmore-tab-content\">
              ";
        // line 135
        if ((isset($context["features"]) ? $context["features"] : null)) {
            // line 136
            echo "                ";
            echo (isset($context["features"]) ? $context["features"] : null);
            echo "
              ";
        } else {
            // line 138
            echo "                ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("No feature list provided for this module :(", array(), "Admin.Modules.Notification"), "html", null, true);
            echo "
              ";
        }
        // line 140
        echo "            </p>
          </div>

          <div id=\"customer_benefits-";
        // line 143
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "\" class=\"tab-pane fade\">
            <p class=\"module-readmore-tab-content\">
              ";
        // line 145
        if ((isset($context["customerBenefits"]) ? $context["customerBenefits"] : null)) {
            // line 146
            echo "                ";
            echo (isset($context["customerBenefits"]) ? $context["customerBenefits"] : null);
            echo "
              ";
        } else {
            // line 148
            echo "                ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("No customer benefits notes found for this module :(", array(), "Admin.Modules.Notification"), "html", null, true);
            echo "
              ";
        }
        // line 150
        echo "            </p>
          </div>

          <div id=\"demo_video-";
        // line 153
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "\" class=\"tab-pane fade\">
            <p class=\"module-readmore-tab-content\">
              ";
        // line 155
        if ((isset($context["demoVideo"]) ? $context["demoVideo"] : null)) {
            // line 156
            echo "                ";
            echo $this->env->getExtension('PrestaShopBundle\Twig\LayoutExtension')->getYoutubeLink((isset($context["demoVideo"]) ? $context["demoVideo"] : null));
            echo "
              ";
        } else {
            // line 158
            echo "                ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("No demonstration video found for this module :(", array(), "Admin.Modules.Notification"), "html", null, true);
            echo "
              ";
        }
        // line 160
        echo "            </p>
          </div>

          <div id=\"changelog-";
        // line 163
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "\" class=\"tab-pane fade\">
            ";
        // line 164
        if ((isset($context["changeLog"]) ? $context["changeLog"] : null)) {
            // line 165
            echo "              <ul class=\"module-readmore-tab-content\">
                ";
            // line 166
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_reverse_filter($this->env, $this->env->getExtension('PrestaShopBundle\Twig\DataFormatterExtension')->arrayCast((isset($context["changeLog"]) ? $context["changeLog"] : null))));
            foreach ($context['_seq'] as $context["version"] => $context["lines"]) {
                // line 167
                echo "                  <li>
                    <b>";
                // line 168
                echo twig_escape_filter($this->env, $context["version"], "html", null, true);
                echo ":</b>
                    ";
                // line 169
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["lines"]);
                foreach ($context['_seq'] as $context["_key"] => $context["line"]) {
                    // line 170
                    echo "                      ";
                    echo twig_escape_filter($this->env, $context["line"], "html", null, true);
                    echo "<br/>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['line'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 172
                echo "                  </li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['version'], $context['lines'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 174
            echo "              </ul>
            ";
        } else {
            // line 176
            echo "              ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("No changelog provided for this module :(", array(), "Admin.Modules.Notification"), "html", null, true);
            echo "
            ";
        }
        // line 178
        echo "          </div>
          ";
        // line 180
        echo "        </div>
      </div>
    </div>

    <div class=\"modal-footer module-modal-footer\">
      <div class=\"module-stars-price\">
        <div class=\"module-price text-sm-right\">
          ";
        // line 187
        if ((($this->getAttribute($this->getAttribute((isset($context["module"]) ? $context["module"] : null), "attributes", array()), "url_active", array()) == "buy") && ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["module"]) ? $context["module"] : null), "attributes", array()), "price", array()), "raw", array()) != "0.00"))) {
            // line 188
            echo "            ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["module"]) ? $context["module"] : null), "attributes", array()), "price", array()), "displayPrice", array()), "html", null, true);
            echo "
          ";
        } elseif (($this->getAttribute($this->getAttribute(        // line 189
(isset($context["module"]) ? $context["module"] : null), "attributes", array()), "url_active", array()) != "buy")) {
            // line 190
            echo "            ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Free", array(), "Admin.Modules.Feature"), "html", null, true);
            echo "
          ";
        }
        // line 192
        echo "        </div>
      </div>
      <div class=\"module-badges-action\">
        <div class=\"float-left module-badges-display\">
          ";
        // line 196
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["badges"]) ? $context["badges"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["badge"]) {
            // line 197
            echo "            <img src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["badge"], "img", array()), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["badge"], "label", array()), "html", null, true);
            echo "\"/>
            ";
            // line 198
            echo twig_escape_filter($this->env, $this->getAttribute($context["badge"], "label", array()), "html", null, true);
            echo "
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['badge'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 200
        echo "        </div>
        <div class=\"float-right module-action\">
          ";
        // line 202
        $this->loadTemplate("PrestaShopBundle:Admin/Module/Includes:action_menu.html.twig", "@PrestaShop/Admin/Module/Includes/modal_read_more_content.html.twig", 202)->display(array_merge($context, array("module" => (isset($context["module"]) ? $context["module"] : null), "level" => (isset($context["level"]) ? $context["level"] : null))));
        // line 203
        echo "        </div>
      </div>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Module/Includes/modal_read_more_content.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  425 => 203,  423 => 202,  419 => 200,  411 => 198,  404 => 197,  400 => 196,  394 => 192,  388 => 190,  386 => 189,  381 => 188,  379 => 187,  370 => 180,  367 => 178,  361 => 176,  357 => 174,  350 => 172,  341 => 170,  337 => 169,  333 => 168,  330 => 167,  326 => 166,  323 => 165,  321 => 164,  317 => 163,  312 => 160,  306 => 158,  300 => 156,  298 => 155,  293 => 153,  288 => 150,  282 => 148,  276 => 146,  274 => 145,  269 => 143,  264 => 140,  258 => 138,  252 => 136,  250 => 135,  245 => 133,  240 => 130,  234 => 128,  228 => 126,  226 => 125,  221 => 123,  216 => 120,  210 => 118,  204 => 116,  202 => 115,  196 => 113,  191 => 109,  189 => 108,  181 => 105,  178 => 104,  175 => 103,  167 => 100,  164 => 99,  161 => 98,  153 => 95,  150 => 94,  147 => 93,  139 => 90,  136 => 89,  133 => 88,  125 => 85,  122 => 84,  120 => 83,  113 => 81,  109 => 79,  98 => 74,  84 => 62,  78 => 60,  72 => 58,  70 => 57,  65 => 55,  58 => 53,  55 => 52,  48 => 48,  42 => 46,  40 => 45,  34 => 41,  32 => 39,  31 => 38,  30 => 37,  29 => 36,  28 => 35,  27 => 34,  26 => 33,  25 => 32,  24 => 31,  23 => 30,  22 => 29,  21 => 26,  19 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@PrestaShop/Admin/Module/Includes/modal_read_more_content.html.twig", "C:\\xampp\\htdocs\\17beststore\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Module\\Includes\\modal_read_more_content.html.twig");
    }
}
