<?php

/* @PrestaShop/Admin/Product/ProductPage/product.html.twig */
class __TwigTemplate_df3acbf601aaa93dde117c9c61740c2fd73c15e7b1ca5827b8f3c66fbe2ef7b3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 25
        $this->parent = $this->loadTemplate("@PrestaShop/Admin/layout.html.twig", "@PrestaShop/Admin/Product/ProductPage/product.html.twig", 25);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'product_header' => array($this, 'block_product_header'),
            'product_tabs_container' => array($this, 'block_product_tabs_container'),
            'product_panel_essentials' => array($this, 'block_product_panel_essentials'),
            'product_panel_combinations' => array($this, 'block_product_panel_combinations'),
            'product_panel_shipping' => array($this, 'block_product_panel_shipping'),
            'product_panel_pricing' => array($this, 'block_product_panel_pricing'),
            'product_panel_seo' => array($this, 'block_product_panel_seo'),
            'product_panel_options' => array($this, 'block_product_panel_options'),
            'product_panel_modules' => array($this, 'block_product_panel_modules'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@PrestaShop/Admin/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 327
        $context["js_translatable"] = twig_array_merge(array("Are you sure to disable variations ? they will all be deleted" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This will delete all the combinations. Do you wish to proceed?", array(), "Admin.Catalog.Notification")),         // line 329
(isset($context["js_translatable"]) ? $context["js_translatable"] : null));
        // line 331
        $context["js_translatable"] = twig_array_merge(array("Form update success" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Settings updated.", array(), "Admin.Notifications.Success"), "Form update errors" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Unable to update settings.", array(), "Admin.Notifications.Error"), "Delete" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Delete", array(), "Admin.Actions"), "ToLargeFile" => twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("The file is too large. Maximum size allowed is: [1]. The file you are trying to upload is [2].", array(), "Admin.Notifications.Error"), array("[1]" => "{{maxFilesize}}", "[2]" => "{{filesize}}")), "Drop images here" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Drop images here", array(), "Admin.Catalog.Feature"), "or select files" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("or select files", array(), "Admin.Catalog.Feature"), "files recommandations" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Recommended size 800 x 800px for default theme.", array(), "Admin.Catalog.Feature"), "files recommandations2" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("JPG, GIF or PNG format.", array(), "Admin.Catalog.Feature"), "Cover" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Cover", array(), "Admin.Catalog.Feature"), "Are you sure to delete this?" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Are you sure to delete this?", array(), "Admin.Notifications.Warning"), "This will delete the specific price. Do you wish to proceed?" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("This will delete the specific price. Do you wish to proceed?", array(), "Admin.Catalog.Notification"), "Quantities" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Quantities", array(), "Admin.Catalog.Feature"), "Combinations" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Combinations", array(), "Admin.Catalog.Feature"), "Virtual product" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Virtual product", array(), "Admin.Catalog.Feature"), "tax incl." => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("tax incl.", array(), "Admin.Catalog.Feature"), "tax excl." => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("tax excl.", array(), "Admin.Catalog.Feature"), "You can't create pack product with variations. Are you sure to disable variations ? they will all be deleted." => (($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("A pack of products can't have combinations.", array(), "Admin.Catalog.Notification") . " ") . $this->getAttribute(        // line 348
(isset($context["js_translatable"]) ? $context["js_translatable"] : null), "Are you sure to disable variations ? they will all be deleted", array(), "array")), "You can't create virtual product with variations. Are you sure to disable variations ? they will all be deleted." => (($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("A virtual product can't have combinations.", array(), "Admin.Catalog.Notification") . " ") . $this->getAttribute(        // line 349
(isset($context["js_translatable"]) ? $context["js_translatable"] : null), "Are you sure to disable variations ? they will all be deleted", array(), "array"))),         // line 350
(isset($context["js_translatable"]) ? $context["js_translatable"] : null));
        // line 25
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 27
    public function block_content($context, array $blocks = array())
    {
        // line 28
        echo "
  <form name=\"form\" id=\"form\" method=\"post\" class=\"form-horizontal product-page row justify-content-md-center\" novalidate=\"novalidate\">

    ";
        // line 31
        if ( !(isset($context["editable"]) ? $context["editable"] : null)) {
            echo " <fieldset disabled id=\"field-disabled\"> ";
        }
        // line 32
        echo "    ";
        // line 33
        echo "    ";
        $this->displayBlock('product_header', $context, $blocks);
        // line 44
        echo "
    <div class=\"col-md-10\">
      <div id=\"form_bubbling_errors\">
        ";
        // line 47
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : null), 'errors');
        echo "
      </div>
    </div>

    <div id=\"form-loading\" class=\"col-xxl-10\">
      ";
        // line 53
        echo "      ";
        $this->displayBlock('product_tabs_container', $context, $blocks);
        // line 56
        echo "      <div id=\"form_content\" class=\"tab-content\">

        ";
        // line 59
        echo "        ";
        $this->displayBlock('product_panel_essentials', $context, $blocks);
        // line 80
        echo "
        ";
        // line 82
        echo "        ";
        $this->displayBlock('product_panel_combinations', $context, $blocks);
        // line 103
        echo "
        ";
        // line 105
        echo "        ";
        $this->displayBlock('product_panel_shipping', $context, $blocks);
        // line 124
        echo "
        ";
        // line 126
        echo "        ";
        $this->displayBlock('product_panel_pricing', $context, $blocks);
        // line 133
        echo "
        ";
        // line 135
        echo "        ";
        $this->displayBlock('product_panel_seo', $context, $blocks);
        // line 141
        echo "
        ";
        // line 143
        echo "        ";
        $this->displayBlock('product_panel_options', $context, $blocks);
        // line 149
        echo "
        ";
        // line 151
        echo "        ";
        $this->displayBlock('product_panel_modules', $context, $blocks);
        // line 247
        echo "      </div>

      ";
        // line 249
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "id_product", array()), 'widget');
        echo "
      ";
        // line 250
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "_token", array()), 'widget');
        echo "

    </div>
    ";
        // line 254
        echo "    ";
        echo twig_include($this->env, $context, "@Product/ProductPage/Blocks/footer.html.twig", array("preview_link" =>         // line 255
(isset($context["preview_link"]) ? $context["preview_link"] : null), "preview_link_deactivate" =>         // line 256
(isset($context["preview_link_deactivate"]) ? $context["preview_link_deactivate"] : null), "is_shop_context" =>         // line 257
(isset($context["is_shop_context"]) ? $context["is_shop_context"] : null), "editable" =>         // line 258
(isset($context["editable"]) ? $context["editable"] : null), "is_active" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(        // line 259
(isset($context["form"]) ? $context["form"] : null), "step1", array()), "vars", array()), "value", array()), "active", array()), "productId" =>         // line 260
(isset($context["id_product"]) ? $context["id_product"] : null)));
        // line 261
        echo "
    ";
        // line 262
        if ( !(isset($context["editable"]) ? $context["editable"] : null)) {
            echo " </fieldset> ";
        }
        // line 263
        echo "  </form>


  ";
        // line 266
        $this->loadTemplate("@PrestaShop/Admin/Product/ProductPage/product.html.twig", "@PrestaShop/Admin/Product/ProductPage/product.html.twig", 266, "1655854412")->display(array_merge($context, array("id" => "confirmation_modal", "title" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Warning", array(), "Admin.Notifications.Warning"), "closable" => false, "actions" => array(0 => array("type" => "button", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("No", array(), "Admin.Global"), "class" => "btn btn-outline-secondary btn-lg cancel"), 1 => array("type" => "button", "label" => $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Yes", array(), "Admin.Global"), "class" => "btn btn-primary btn-lg continue")))));
        // line 287
        echo "
";
    }

    // line 33
    public function block_product_header($context, array $blocks = array())
    {
        // line 34
        echo "      ";
        echo twig_include($this->env, $context, "@Product/ProductPage/Blocks/header.html.twig", array("formName" => $this->getAttribute($this->getAttribute(        // line 35
(isset($context["form"]) ? $context["form"] : null), "step1", array()), "name", array()), "formType" => $this->getAttribute($this->getAttribute(        // line 36
(isset($context["form"]) ? $context["form"] : null), "step1", array()), "type_product", array()), "is_multishop_context" =>         // line 37
(isset($context["is_multishop_context"]) ? $context["is_multishop_context"] : null), "languages" =>         // line 38
(isset($context["languages"]) ? $context["languages"] : null), "help_link" =>         // line 39
(isset($context["help_link"]) ? $context["help_link"] : null), "stats_link" =>         // line 40
(isset($context["stats_link"]) ? $context["stats_link"] : null)));
        // line 42
        echo "
    ";
    }

    // line 53
    public function block_product_tabs_container($context, array $blocks = array())
    {
        // line 54
        echo "        ";
        echo twig_include($this->env, $context, "@Product/ProductPage/Blocks/tabs.html.twig");
        echo "
      ";
    }

    // line 59
    public function block_product_panel_essentials($context, array $blocks = array())
    {
        // line 60
        echo "          ";
        $context["formQuantityShortcut"] = (($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "step1", array(), "any", false, true), "qty_0_shortcut", array(), "any", true, true)) ? ($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "step1", array()), "qty_0_shortcut", array())) : (null));
        // line 61
        echo "          ";
        echo twig_include($this->env, $context, "@Product/ProductPage/Panels/essentials.html.twig", array("formPackItems" => $this->getAttribute($this->getAttribute(        // line 62
(isset($context["form"]) ? $context["form"] : null), "step1", array()), "inputPackItems", array()), "productId" =>         // line 63
(isset($context["id_product"]) ? $context["id_product"] : null), "images" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(        // line 64
(isset($context["form"]) ? $context["form"] : null), "step1", array()), "vars", array()), "value", array()), "images", array()), "formShortDescription" => $this->getAttribute($this->getAttribute(        // line 65
(isset($context["form"]) ? $context["form"] : null), "step1", array()), "description_short", array()), "formDescription" => $this->getAttribute($this->getAttribute(        // line 66
(isset($context["form"]) ? $context["form"] : null), "step1", array()), "description", array()), "formFeatures" => $this->getAttribute($this->getAttribute(        // line 67
(isset($context["form"]) ? $context["form"] : null), "step1", array()), "features", array()), "formManufacturer" => $this->getAttribute($this->getAttribute(        // line 68
(isset($context["form"]) ? $context["form"] : null), "step1", array()), "id_manufacturer", array()), "formRelatedProducts" => $this->getAttribute($this->getAttribute(        // line 69
(isset($context["form"]) ? $context["form"] : null), "step1", array()), "related_products", array()), "is_combination_active" =>         // line 70
(isset($context["is_combination_active"]) ? $context["is_combination_active"] : null), "has_combinations" =>         // line 71
(isset($context["has_combinations"]) ? $context["has_combinations"] : null), "formReference" => $this->getAttribute($this->getAttribute(        // line 72
(isset($context["form"]) ? $context["form"] : null), "step6", array()), "reference", array()), "formQuantityShortcut" =>         // line 73
(isset($context["formQuantityShortcut"]) ? $context["formQuantityShortcut"] : null), "formPriceShortcut" => $this->getAttribute($this->getAttribute(        // line 74
(isset($context["form"]) ? $context["form"] : null), "step1", array()), "price_shortcut", array()), "formPriceShortcutTTC" => $this->getAttribute($this->getAttribute(        // line 75
(isset($context["form"]) ? $context["form"] : null), "step1", array()), "price_ttc_shortcut", array()), "formCategories" => $this->getAttribute(        // line 76
(isset($context["form"]) ? $context["form"] : null), "step1", array())));
        // line 78
        echo "
        ";
    }

    // line 82
    public function block_product_panel_combinations($context, array $blocks = array())
    {
        // line 83
        echo "          ";
        $context["formStockQuantity"] = (($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "step3", array(), "any", false, true), "qty_0", array(), "any", true, true)) ? ($this->getAttribute($this->getAttribute((isset($context["form"]) ? $context["form"] : null), "step3", array()), "qty_0", array())) : (null));
        // line 84
        echo "          ";
        echo twig_include($this->env, $context, "@Product/ProductPage/Panels/combinations.html.twig", array("formDependsOnStocks" => $this->getAttribute($this->getAttribute(        // line 85
(isset($context["form"]) ? $context["form"] : null), "step3", array()), "depends_on_stock", array()), "productId" =>         // line 86
(isset($context["id_product"]) ? $context["id_product"] : null), "formStockQuantity" =>         // line 87
(isset($context["formStockQuantity"]) ? $context["formStockQuantity"] : null), "formStockMinimalQuantity" => $this->getAttribute($this->getAttribute(        // line 88
(isset($context["form"]) ? $context["form"] : null), "step3", array()), "minimal_quantity", array()), "formLowStockThreshold" => $this->getAttribute($this->getAttribute(        // line 89
(isset($context["form"]) ? $context["form"] : null), "step3", array()), "low_stock_threshold", array()), "formLowStockAlert" => $this->getAttribute($this->getAttribute(        // line 90
(isset($context["form"]) ? $context["form"] : null), "step3", array()), "low_stock_alert", array()), "formVirtualProduct" => $this->getAttribute($this->getAttribute(        // line 91
(isset($context["form"]) ? $context["form"] : null), "step3", array()), "virtual_product", array()), "asm_globally_activated" =>         // line 92
(isset($context["asm_globally_activated"]) ? $context["asm_globally_activated"] : null), "formType" => $this->getAttribute($this->getAttribute(        // line 93
(isset($context["form"]) ? $context["form"] : null), "step1", array()), "type_product", array()), "formAdvancedStockManagement" => $this->getAttribute($this->getAttribute(        // line 94
(isset($context["form"]) ? $context["form"] : null), "step3", array()), "advanced_stock_management", array()), "formPackStockType" => $this->getAttribute($this->getAttribute(        // line 95
(isset($context["form"]) ? $context["form"] : null), "step3", array()), "pack_stock_type", array()), "formStep3" => $this->getAttribute(        // line 96
(isset($context["form"]) ? $context["form"] : null), "step3", array()), "formCombinations" =>         // line 97
(isset($context["formCombinations"]) ? $context["formCombinations"] : null), "has_combinations" =>         // line 98
(isset($context["has_combinations"]) ? $context["has_combinations"] : null), "max_upload_size" =>         // line 99
(isset($context["max_upload_size"]) ? $context["max_upload_size"] : null)));
        // line 101
        echo "
        ";
    }

    // line 105
    public function block_product_panel_shipping($context, array $blocks = array())
    {
        // line 106
        echo "          <div role=\"tabpanel\" class=\"form-contenttab tab-pane\" id=\"step4\">
            <div class=\"row\">
              <div class=\"col-md-12\">
                <div class=\"container-fluid\">
                  <div class=\"row\">
                    ";
        // line 111
        echo twig_include($this->env, $context, "@Product/ProductPage/Forms/form_shipping.html.twig", array("form" => $this->getAttribute(        // line 112
(isset($context["form"]) ? $context["form"] : null), "step4", array()), "asm_globally_activated" =>         // line 113
(isset($context["asm_globally_activated"]) ? $context["asm_globally_activated"] : null), "isNotVirtual" => ($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(        // line 114
(isset($context["form"]) ? $context["form"] : null), "step1", array()), "type_product", array()), "vars", array()), "value", array()) != "2"), "isChecked" => $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(        // line 115
(isset($context["form"]) ? $context["form"] : null), "step3", array()), "advanced_stock_management", array()), "vars", array()), "checked", array()), "warehouses" =>         // line 116
(isset($context["warehouses"]) ? $context["warehouses"] : null)));
        // line 117
        echo "
                  </div>
                </div>
              </div>
            </div>
          </div>
        ";
    }

    // line 126
    public function block_product_panel_pricing($context, array $blocks = array())
    {
        // line 127
        echo "          ";
        echo twig_include($this->env, $context, "@Product/ProductPage/Panels/pricing.html.twig", array("pricingForm" => $this->getAttribute(        // line 128
(isset($context["form"]) ? $context["form"] : null), "step2", array()), "is_multishop_context" =>         // line 129
(isset($context["is_multishop_context"]) ? $context["is_multishop_context"] : null), "productId" =>         // line 130
(isset($context["id_product"]) ? $context["id_product"] : null)));
        // line 131
        echo "
        ";
    }

    // line 135
    public function block_product_panel_seo($context, array $blocks = array())
    {
        // line 136
        echo "          ";
        echo twig_include($this->env, $context, "@Product/ProductPage/Panels/seo.html.twig", array("seoForm" => $this->getAttribute(        // line 137
(isset($context["form"]) ? $context["form"] : null), "step5", array()), "productId" =>         // line 138
(isset($context["id_product"]) ? $context["id_product"] : null)));
        // line 139
        echo "
        ";
    }

    // line 143
    public function block_product_panel_options($context, array $blocks = array())
    {
        // line 144
        echo "          ";
        echo twig_include($this->env, $context, "@Product/ProductPage/Panels/options.html.twig", array("optionsForm" => $this->getAttribute(        // line 145
(isset($context["form"]) ? $context["form"] : null), "step6", array()), "productId" =>         // line 146
(isset($context["id_product"]) ? $context["id_product"] : null)));
        // line 147
        echo "
        ";
    }

    // line 151
    public function block_product_panel_modules($context, array $blocks = array())
    {
        // line 152
        echo "          ";
        if (($this->env->getExtension('PrestaShopBundle\Twig\HookExtension')->hookCount("displayAdminProductsExtra") > 0)) {
            // line 153
            echo "            <div role=\"tabpanel\" class=\"form-contenttab tab-pane\" id=\"hooks\">
              <div class=\"row\">
                <div class=\"col-md-12\">
                  <div class=\"container-fluid\">
                    <div class=\"row\">

                      ";
            // line 160
            echo "                      <div class=\"col-md-12\">
                        ";
            // line 161
            $context["hooks"] = $this->env->getExtension('PrestaShopBundle\Twig\HookExtension')->renderHooksArray("displayAdminProductsExtra", array("id_product" => (isset($context["id_product"]) ? $context["id_product"] : null)));
            // line 162
            echo "
                        <div class=\"row module-selection\" style=\"display: none;\">
                          <div class=\"col-md-12 col-lg-7\">
                            ";
            // line 165
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["hooks"]) ? $context["hooks"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                // line 166
                echo "                              <div class=\"module-render-container module-";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "name", array()), "html", null, true);
                echo "\">
                                <div>
                                  <img class=\"top-logo\" src=\"";
                // line 168
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "img", array()), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "displayName", array()), "html", null, true);
                echo "\">
                                  <h2 class=\"text-ellipsis module-name-grid\">
                                    ";
                // line 170
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "displayName", array()), "html", null, true);
                echo "
                                  </h2>
                                  <div class=\"text-ellipsis small-text module-version\">
                                    ";
                // line 173
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "version", array()), "html", null, true);
                echo " by ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "author", array()), "html", null, true);
                echo "
                                  </div>
                                </div>
                                <div class=\"small no-padding\">
                                  ";
                // line 177
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "description", array()), "html", null, true);
                echo "
                                </div>
                              </div>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 181
            echo "                          </div>
                          <div class=\"col-md-12 col-lg-5\">
                            <h2>";
            // line 183
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Module to configure", array(), "Admin.Catalog.Feature"), "html", null, true);
            echo "</h2>
                            <select class=\"modules-list-select\" data-toggle=\"select2\">
                              ";
            // line 185
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["hooks"]) ? $context["hooks"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                // line 186
                echo "                                <option value=\"module-";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "name", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "displayName", array()), "html", null, true);
                echo "</option>
                              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 188
            echo "                            </select>
                          </div>
                        </div>

                        <div class=\"module-render-container all-modules\">
                          <p>
                            <h2>";
            // line 194
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Choose a module to configure", array(), "Admin.Catalog.Feature"), "html", null, true);
            echo "</h2>
                            ";
            // line 195
            echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("These modules are relative to the product page of your shop.", array(), "Admin.Catalog.Feature"), "html", null, true);
            echo "<br />
                            ";
            // line 196
            echo twig_replace_filter($this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("To manage all your modules go to the [1]Installed module page[/1]", array(), "Admin.Catalog.Feature"), array("[1]" => (("<a href=\"" . $this->env->getExtension('Symfony\Bridge\Twig\Extension\RoutingExtension')->getPath("admin_module_manage")) . "\">"), "[/1]" => "</a>"));
            echo "
                          </p>
                          <div class=\"row\">
                            ";
            // line 199
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["hooks"]) ? $context["hooks"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                // line 200
                echo "                              <div class=\"col-md-12 col-lg-6 col-xl-4\">
                                <div class=\"module-item-wrapper-grid\">
                                  <div class=\"module-item-heading-grid\">
                                    <img class=\"module-logo-thumb-grid\" src=\"";
                // line 203
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "img", array()), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "displayName", array()), "html", null, true);
                echo "\">
                                    <h3 class=\"text-ellipsis module-name-grid\">
                                      ";
                // line 205
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "displayName", array()), "html", null, true);
                echo "
                                    </h3>
                                    <div class=\"text-ellipsis small-text module-version-author-grid\">
                                      ";
                // line 208
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "version", array()), "html", null, true);
                echo " by ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "author", array()), "html", null, true);
                echo "
                                    </div>
                                  </div>
                                  <div class=\"module-quick-description-grid small no-padding\">
                                    ";
                // line 212
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "description", array()), "html", null, true);
                echo "
                                  </div>
                                  <div class=\"module-container\">
                                    <div class=\"module-quick-action-grid clearfix\">
                                      <button class=\"modules-list-button btn btn-outline-primary pull-xs-right\" data-target=\"module-";
                // line 216
                echo twig_escape_filter($this->env, $this->getAttribute($context["module"], "id", array()), "html", null, true);
                echo "\">
                                        ";
                // line 217
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Configure", array(), "Admin.Actions"), "html", null, true);
                echo "
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 224
            echo "                          </div>
                        </div>

                        ";
            // line 227
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["hooks"]) ? $context["hooks"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["module"]) {
                // line 228
                echo "                          <div
                            id=\"module_";
                // line 229
                echo twig_escape_filter($this->env, $this->getAttribute($context["module"], "id", array()), "html", null, true);
                echo "\"
                            class=\"module-render-container module-";
                // line 230
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["module"], "attributes", array()), "name", array()), "html", null, true);
                echo "\"
                            style=\"display: none;\"
                          >
                            <div>
                              ";
                // line 234
                echo $this->getAttribute($context["module"], "content", array());
                echo "
                            </div>
                          </div>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['module'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 238
            echo "                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          ";
        }
        // line 246
        echo "        ";
    }

    // line 290
    public function block_javascripts($context, array $blocks = array())
    {
        // line 291
        echo "  ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
  <script src=\"";
        // line 292
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/product/form.js"), "html", null, true);
        echo "\"></script>

  <script src=\"";
        // line 294
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/product/product-manufacturer.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 295
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/product/product-related.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 296
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/product/product-category-tags.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 297
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/product/default-category.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 298
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/product/product-combinations.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 299
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/category-tree.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 300
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/module/module_card.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 301
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("themes/default/js/bundle/modal-confirmation.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 302
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("../js/tiny_mce/tiny_mce.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 303
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("../js/admin/tinymce.inc.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 304
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("../js/admin/tinymce_loader.js"), "html", null, true);
        echo "\"></script>

  <script>
      \$(function() {
        var editable = '";
        // line 308
        echo twig_escape_filter($this->env, (isset($context["editable"]) ? $context["editable"] : null), "html", null, true);
        echo "';

        if (editable !== '1'){
          \$('#field-disabled').find(\"select\").each(function() {
            \$(this).removeClass('select2-hidden-accessible');
          });
          \$('#field-disabled').find(\"span.select2\").each(function() {
            \$(this).hide();
          });
          \$('#field-disabled').find(\"a.pstaggerClosingCross\").each(function() {
            \$(this).attr(\"disabled\", \"disabled\").on(\"click\", function() {
              return false;
            });
          });
        }
      });
  </script>
";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Product/ProductPage/product.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  591 => 308,  584 => 304,  580 => 303,  576 => 302,  572 => 301,  568 => 300,  564 => 299,  560 => 298,  556 => 297,  552 => 296,  548 => 295,  544 => 294,  539 => 292,  534 => 291,  531 => 290,  527 => 246,  517 => 238,  507 => 234,  500 => 230,  496 => 229,  493 => 228,  489 => 227,  484 => 224,  471 => 217,  467 => 216,  460 => 212,  451 => 208,  445 => 205,  438 => 203,  433 => 200,  429 => 199,  423 => 196,  419 => 195,  415 => 194,  407 => 188,  396 => 186,  392 => 185,  387 => 183,  383 => 181,  373 => 177,  364 => 173,  358 => 170,  351 => 168,  345 => 166,  341 => 165,  336 => 162,  334 => 161,  331 => 160,  323 => 153,  320 => 152,  317 => 151,  312 => 147,  310 => 146,  309 => 145,  307 => 144,  304 => 143,  299 => 139,  297 => 138,  296 => 137,  294 => 136,  291 => 135,  286 => 131,  284 => 130,  283 => 129,  282 => 128,  280 => 127,  277 => 126,  267 => 117,  265 => 116,  264 => 115,  263 => 114,  262 => 113,  261 => 112,  260 => 111,  253 => 106,  250 => 105,  245 => 101,  243 => 99,  242 => 98,  241 => 97,  240 => 96,  239 => 95,  238 => 94,  237 => 93,  236 => 92,  235 => 91,  234 => 90,  233 => 89,  232 => 88,  231 => 87,  230 => 86,  229 => 85,  227 => 84,  224 => 83,  221 => 82,  216 => 78,  214 => 76,  213 => 75,  212 => 74,  211 => 73,  210 => 72,  209 => 71,  208 => 70,  207 => 69,  206 => 68,  205 => 67,  204 => 66,  203 => 65,  202 => 64,  201 => 63,  200 => 62,  198 => 61,  195 => 60,  192 => 59,  185 => 54,  182 => 53,  177 => 42,  175 => 40,  174 => 39,  173 => 38,  172 => 37,  171 => 36,  170 => 35,  168 => 34,  165 => 33,  160 => 287,  158 => 266,  153 => 263,  149 => 262,  146 => 261,  144 => 260,  143 => 259,  142 => 258,  141 => 257,  140 => 256,  139 => 255,  137 => 254,  131 => 250,  127 => 249,  123 => 247,  120 => 151,  117 => 149,  114 => 143,  111 => 141,  108 => 135,  105 => 133,  102 => 126,  99 => 124,  96 => 105,  93 => 103,  90 => 82,  87 => 80,  84 => 59,  80 => 56,  77 => 53,  69 => 47,  64 => 44,  61 => 33,  59 => 32,  55 => 31,  50 => 28,  47 => 27,  43 => 25,  41 => 350,  40 => 349,  39 => 348,  38 => 331,  36 => 329,  35 => 327,  11 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@PrestaShop/Admin/Product/ProductPage/product.html.twig", "C:\\xampp\\htdocs\\17beststore\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\ProductPage\\product.html.twig");
    }
}


/* @PrestaShop/Admin/Product/ProductPage/product.html.twig */
class __TwigTemplate_df3acbf601aaa93dde117c9c61740c2fd73c15e7b1ca5827b8f3c66fbe2ef7b3_1655854412 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 266
        $this->parent = $this->loadTemplate("PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig", "@PrestaShop/Admin/Product/ProductPage/product.html.twig", 266);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "PrestaShopBundle:Admin/Helpers:bootstrap_popup.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 283
    public function block_content($context, array $blocks = array())
    {
        // line 284
        echo "      <div class=\"modal-body\"></div>
    ";
    }

    public function getTemplateName()
    {
        return "@PrestaShop/Admin/Product/ProductPage/product.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  670 => 284,  667 => 283,  650 => 266,  591 => 308,  584 => 304,  580 => 303,  576 => 302,  572 => 301,  568 => 300,  564 => 299,  560 => 298,  556 => 297,  552 => 296,  548 => 295,  544 => 294,  539 => 292,  534 => 291,  531 => 290,  527 => 246,  517 => 238,  507 => 234,  500 => 230,  496 => 229,  493 => 228,  489 => 227,  484 => 224,  471 => 217,  467 => 216,  460 => 212,  451 => 208,  445 => 205,  438 => 203,  433 => 200,  429 => 199,  423 => 196,  419 => 195,  415 => 194,  407 => 188,  396 => 186,  392 => 185,  387 => 183,  383 => 181,  373 => 177,  364 => 173,  358 => 170,  351 => 168,  345 => 166,  341 => 165,  336 => 162,  334 => 161,  331 => 160,  323 => 153,  320 => 152,  317 => 151,  312 => 147,  310 => 146,  309 => 145,  307 => 144,  304 => 143,  299 => 139,  297 => 138,  296 => 137,  294 => 136,  291 => 135,  286 => 131,  284 => 130,  283 => 129,  282 => 128,  280 => 127,  277 => 126,  267 => 117,  265 => 116,  264 => 115,  263 => 114,  262 => 113,  261 => 112,  260 => 111,  253 => 106,  250 => 105,  245 => 101,  243 => 99,  242 => 98,  241 => 97,  240 => 96,  239 => 95,  238 => 94,  237 => 93,  236 => 92,  235 => 91,  234 => 90,  233 => 89,  232 => 88,  231 => 87,  230 => 86,  229 => 85,  227 => 84,  224 => 83,  221 => 82,  216 => 78,  214 => 76,  213 => 75,  212 => 74,  211 => 73,  210 => 72,  209 => 71,  208 => 70,  207 => 69,  206 => 68,  205 => 67,  204 => 66,  203 => 65,  202 => 64,  201 => 63,  200 => 62,  198 => 61,  195 => 60,  192 => 59,  185 => 54,  182 => 53,  177 => 42,  175 => 40,  174 => 39,  173 => 38,  172 => 37,  171 => 36,  170 => 35,  168 => 34,  165 => 33,  160 => 287,  158 => 266,  153 => 263,  149 => 262,  146 => 261,  144 => 260,  143 => 259,  142 => 258,  141 => 257,  140 => 256,  139 => 255,  137 => 254,  131 => 250,  127 => 249,  123 => 247,  120 => 151,  117 => 149,  114 => 143,  111 => 141,  108 => 135,  105 => 133,  102 => 126,  99 => 124,  96 => 105,  93 => 103,  90 => 82,  87 => 80,  84 => 59,  80 => 56,  77 => 53,  69 => 47,  64 => 44,  61 => 33,  59 => 32,  55 => 31,  50 => 28,  47 => 27,  43 => 25,  41 => 350,  40 => 349,  39 => 348,  38 => 331,  36 => 329,  35 => 327,  11 => 25,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "@PrestaShop/Admin/Product/ProductPage/product.html.twig", "C:\\xampp\\htdocs\\17beststore\\src\\PrestaShopBundle\\Resources\\views\\Admin\\Product\\ProductPage\\product.html.twig");
    }
}
