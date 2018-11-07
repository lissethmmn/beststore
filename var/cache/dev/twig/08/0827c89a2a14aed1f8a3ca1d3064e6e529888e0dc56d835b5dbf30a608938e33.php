<?php

/* @AdvancedParameters/memcache_servers.html.twig */
class __TwigTemplate_a4cc7996339ca5573b9d35725e435b6dd912af23152bccf5e205c196f3c5f4e5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'perfs_memcache_servers' => array($this, 'block_perfs_memcache_servers'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@AdvancedParameters/memcache_servers.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@AdvancedParameters/memcache_servers.html.twig"));

        // line 26
        echo "
";
        // line 27
        $this->displayBlock('perfs_memcache_servers', $context, $blocks);
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function block_perfs_memcache_servers($context, array $blocks = array())
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->env->getExtension("Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension");
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "perfs_memcache_servers"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->env->getExtension("Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension");
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "perfs_memcache_servers"));

        // line 28
        echo "<div class=\"form-group memcache\" id=\"new-server-btn\">
    <a
        class=\"btn btn-default\"
        data-toggle=\"collapse\"
        href=\"#server-form\"
        aria-expanded=\"false\"
        aria-controls=\"server-form\"
    ><i class=\"material-icons\">add_circle</i> ";
        // line 35
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Add server", array(), "Admin.Advparameters.Feature"), "html", null, true);
        echo "</a>
</div>

<div id=\"server-form\" class=\"collapse col-md-10\">
    <div class=\"form-group\">
        <label class=\"form-control-label\">";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("IP Address", array(), "Admin.Advparameters.Feature"), "html", null, true);
        echo "</label>
        ";
        // line 41
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "memcache_ip", array()), 'errors');
        echo "
        ";
        // line 42
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "memcache_ip", array()), 'widget');
        echo "
    </div>

    <div class=\"form-group\">
        <label class=\"form-control-label\">";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Port", array(), "Admin.Advparameters.Feature"), "html", null, true);
        echo "</label>
        ";
        // line 47
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "memcache_port", array()), 'errors');
        echo "
        ";
        // line 48
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "memcache_port", array()), 'widget');
        echo "
    </div>

    <div class=\"form-group\">
        <label class=\"form-control-label\">";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Weight", array(), "Admin.Advparameters.Feature"), "html", null, true);
        echo "</label>
        ";
        // line 53
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "memcache_weight", array()), 'errors');
        echo "
        ";
        // line 54
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "memcache_weight", array()), 'widget');
        echo "
    </div>

    ";
        // line 57
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'rest');
        echo "

    <div class=\"form-group\">
        <div class=\"float-right\">
            <button id=\"add-server-btn\" class=\"btn btn-primary\">";
        // line 61
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Add Server", array(), "Admin.Advparameters.Feature"), "html", null, true);
        echo "</button>
            <button id=\"test-server-btn\" class=\"btn btn-primary\">";
        // line 62
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Test Server", array(), "Admin.Advparameters.Feature"), "html", null, true);
        echo "</button>
        </div>
    </div>
</div>

<div id=\"servers-list\" class=\"memcache\">
    <div class=\"form-group\">
        <table class=\"table\" id=\"servers-table\">
            <thead>
            <tr>
                <th class=\"fixed-width-xs\"><span class=\"title_box\">";
        // line 72
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("ID", array(), "Admin.Global"), "html", null, true);
        echo "</span></th>
                <th><span class=\"title_box\">";
        // line 73
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("IP address", array(), "messages"), "html", null, true);
        echo "</span></th>
                <th class=\"fixed-width-xs\"><span class=\"title_box\">";
        // line 74
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Port", array(), "Admin.Advparameters.Feature"), "html", null, true);
        echo "</span></th>
                <th class=\"fixed-width-xs\"><span class=\"title_box\">";
        // line 75
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Weight", array(), "Admin.Advparameters.Feature"), "html", null, true);
        echo "</span></th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            ";
        // line 80
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["servers"]) ? $context["servers"] : $this->getContext($context, "servers")));
        foreach ($context['_seq'] as $context["_key"] => $context["server"]) {
            // line 81
            echo "                <tr id=\"row_";
            echo twig_escape_filter($this->env, $this->getAttribute($context["server"], "id_memcached_server", array()), "html", null, true);
            echo "\">
                    <td>";
            // line 82
            echo twig_escape_filter($this->env, $this->getAttribute($context["server"], "id_memcached_server", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 83
            echo twig_escape_filter($this->env, $this->getAttribute($context["server"], "ip", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 84
            echo twig_escape_filter($this->env, $this->getAttribute($context["server"], "port", array()), "html", null, true);
            echo "</td>
                    <td>";
            // line 85
            echo twig_escape_filter($this->env, $this->getAttribute($context["server"], "weight", array()), "html", null, true);
            echo "</td>
                    <td>
                        ";
            // line 87
            $context["removeMsg"] = twig_jsonencode_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Do you really want to remove the server %serverIp%:%serverPort% ?", array("%serverIp%" => $this->getAttribute($context["server"], "ip", array()), "%serverPort%" => $this->getAttribute($context["server"], "port", array())), "Admin.Advparameters.Notification"));
            // line 88
            echo "                        <a class=\"btn btn-default\" href=\"\" onclick=\"app.removeServer(";
            echo twig_escape_filter($this->env, $this->getAttribute($context["server"], "id_memcached_server", array()), "html", null, true);
            echo ", ";
            echo twig_escape_filter($this->env, (isset($context["removeMsg"]) ? $context["removeMsg"] : $this->getContext($context, "removeMsg")), "html", null, true);
            echo ");\"><i class=\"material-icons\">remove_circle</i> ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Remove", array(), "Admin.Actions"), "html", null, true);
            echo "</a>
                    </td>
                </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['server'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 92
        echo "            </tbody>
        </table>
    </div>
</div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "@AdvancedParameters/memcache_servers.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  195 => 92,  180 => 88,  178 => 87,  173 => 85,  169 => 84,  165 => 83,  161 => 82,  156 => 81,  152 => 80,  144 => 75,  140 => 74,  136 => 73,  132 => 72,  119 => 62,  115 => 61,  108 => 57,  102 => 54,  98 => 53,  94 => 52,  87 => 48,  83 => 47,  79 => 46,  72 => 42,  68 => 41,  64 => 40,  56 => 35,  47 => 28,  29 => 27,  26 => 26,);
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
{% trans_default_domain \"Admin.Advparameters.Feature\" %}

{% block perfs_memcache_servers %}
<div class=\"form-group memcache\" id=\"new-server-btn\">
    <a
        class=\"btn btn-default\"
        data-toggle=\"collapse\"
        href=\"#server-form\"
        aria-expanded=\"false\"
        aria-controls=\"server-form\"
    ><i class=\"material-icons\">add_circle</i> {{ 'Add server'|trans }}</a>
</div>

<div id=\"server-form\" class=\"collapse col-md-10\">
    <div class=\"form-group\">
        <label class=\"form-control-label\">{{ 'IP Address'|trans }}</label>
        {{ form_errors(form.memcache_ip) }}
        {{ form_widget(form.memcache_ip) }}
    </div>

    <div class=\"form-group\">
        <label class=\"form-control-label\">{{ 'Port'|trans }}</label>
        {{ form_errors(form.memcache_port) }}
        {{ form_widget(form.memcache_port) }}
    </div>

    <div class=\"form-group\">
        <label class=\"form-control-label\">{{ 'Weight'|trans }}</label>
        {{ form_errors(form.memcache_weight) }}
        {{ form_widget(form.memcache_weight) }}
    </div>

    {{ form_rest(form) }}

    <div class=\"form-group\">
        <div class=\"float-right\">
            <button id=\"add-server-btn\" class=\"btn btn-primary\">{{ 'Add Server'|trans }}</button>
            <button id=\"test-server-btn\" class=\"btn btn-primary\">{{ 'Test Server'|trans }}</button>
        </div>
    </div>
</div>

<div id=\"servers-list\" class=\"memcache\">
    <div class=\"form-group\">
        <table class=\"table\" id=\"servers-table\">
            <thead>
            <tr>
                <th class=\"fixed-width-xs\"><span class=\"title_box\">{{ 'ID'|trans({}, 'Admin.Global') }}</span></th>
                <th><span class=\"title_box\">{{ 'IP address'|trans({}, 'messages') }}</span></th>
                <th class=\"fixed-width-xs\"><span class=\"title_box\">{{ 'Port'|trans }}</span></th>
                <th class=\"fixed-width-xs\"><span class=\"title_box\">{{ 'Weight'|trans }}</span></th>
                <th>&nbsp;</th>
            </tr>
            </thead>
            <tbody>
            {% for server in servers %}
                <tr id=\"row_{{ server.id_memcached_server }}\">
                    <td>{{ server.id_memcached_server }}</td>
                    <td>{{ server.ip }}</td>
                    <td>{{ server.port }}</td>
                    <td>{{ server.weight }}</td>
                    <td>
                        {% set removeMsg = 'Do you really want to remove the server %serverIp%:%serverPort% ?'|trans({'%serverIp%': server.ip, '%serverPort%': server.port}, 'Admin.Advparameters.Notification')|json_encode|raw  %}
                        <a class=\"btn btn-default\" href=\"\" onclick=\"app.removeServer({{ server.id_memcached_server }}, {{ removeMsg }});\"><i class=\"material-icons\">remove_circle</i> {{ 'Remove'|trans({}, 'Admin.Actions') }}</a>
                    </td>
                </tr>
            {% endfor %}
            </tbody>
        </table>
    </div>
</div>
{% endblock %}
", "@AdvancedParameters/memcache_servers.html.twig", "/home/beststor/public_html/version17/src/PrestaShopBundle/Resources/views/Admin/Configure/AdvancedParameters/memcache_servers.html.twig");
    }
}
