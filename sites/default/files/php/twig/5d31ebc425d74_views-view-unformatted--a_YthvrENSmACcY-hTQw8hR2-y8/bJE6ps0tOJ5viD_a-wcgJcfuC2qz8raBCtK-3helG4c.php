<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--agencies-list.html.twig */
class __TwigTemplate_05b2db8d577021c2e081e1fa5a314ce2443ed6c50e24b1816285547fe3a3ba01 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["for" => 21, "set" => 22];
        $filters = ["escape" => 28];
        $functions = ["file_url" => 22, "active_theme_path" => 28];

        try {
            $this->sandbox->checkSecurity(
                ['for', 'set'],
                ['escape'],
                ['file_url', 'active_theme_path']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 18
        echo "<div class=\"col col-lg-10 mx-auto mt-4\">
        <h2 class=\"block-title orange\">Agencias más cercanas</h2>
\t\t<!--  Begins For -->
\t\t";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 22
            echo "\t\t";
            $context["photo"] = call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_agency_image_list", []), "entity", []), "fileuri", []))]);
            // line 23
            echo "\t\t<div class=\"agencias__panel panel panel-shadow mt-2\">
            <div class=\"row pl-2 pr-2\">
                <div class=\"col-md-6 mb-4\">
                    <div class=\"row\">
                        <div class=\"col-md-2 d-flex align-items-center justify-content-center mb-2\">
                            <img src=\"";
            // line 28
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null)), "html", null, true);
            echo "/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getActiveThemePath(), "html", null, true);
            echo "/images/misc/pin.png\" alt=\"\" class=\"pin\">
                        </div>
                        <div class=\"col-md-10\">
                            <h2 class=\"block-title orange\">";
            // line 31
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_agency_title", []), "value", [])), "html", null, true);
            echo "</h2>
                            <div class=\"details mt-4\">
                                <p><b>Ubicación:</b> ";
            // line 33
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_agency_city", []), "value", [])), "html", null, true);
            echo " </p>
                                <p><b>Dirección:</b> ";
            // line 34
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_agency_address", []), "value", [])), "html", null, true);
            echo " </p>
                                <p><b>Teléfono:</b> ";
            // line 35
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_agency_indicative", []), "value", [])), "html", null, true);
            echo " ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_agency_phone", []), "value", [])), "html", null, true);
            echo " ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_agency_extension", []), "value", [])), "html", null, true);
            echo " </p>
                                <p><b>Email:</b> ";
            // line 36
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_agency_email", []), "value", [])), "html", null, true);
            echo " </p>
                                <p><b>Horario de atención:</b> ";
            // line 37
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_agency_schedule", []), "value", [])), "html", null, true);
            echo "</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"col-md-6\">
                    <div class=\"row\">
                        <div class=\"col-sm-10 d-flex align-items-start justify-content-center image_ref\">
                            <img src=\"";
            // line 45
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["photo"] ?? null)), "html", null, true);
            echo "\" alt=\"\">
                        </div>
                        <div class=\"col-sm-2 d-flex align-items-center justify-content-center\">
                            <a href=\"";
            // line 48
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_agency_url", []), "value", [])), "html", null, true);
            echo "\"><button class=\"btn w-100 p-30 dark\">Ver</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        echo "        <!-- End For -->
</div>";
    }

    public function getTemplateName()
    {
        return "themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--agencies-list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 55,  124 => 48,  118 => 45,  107 => 37,  103 => 36,  95 => 35,  91 => 34,  87 => 33,  82 => 31,  74 => 28,  67 => 23,  64 => 22,  60 => 21,  55 => 18,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{#
/**
 * @file
 * Theme override to display a view of unformatted rows.
 *
 * Available variables:
 * - title: The title of this group of rows. May be empty.
 * - rows: A list of the view's row items.
 *   - attributes: The row's HTML attributes.
 *   - content: The row's content.
 * - view: The view object.
 * - default_row_class: A flag indicating whether default classes should be
 *   used on rows.
 *
 * @see template_preprocess_views_view_unformatted()
 */
#}
<div class=\"col col-lg-10 mx-auto mt-4\">
        <h2 class=\"block-title orange\">Agencias más cercanas</h2>
\t\t<!--  Begins For -->
\t\t{% for row in rows %}
\t\t{% set photo = file_url(row['content']['#row']._entity.field_agency_image_list.entity.fileuri) %}
\t\t<div class=\"agencias__panel panel panel-shadow mt-2\">
            <div class=\"row pl-2 pr-2\">
                <div class=\"col-md-6 mb-4\">
                    <div class=\"row\">
                        <div class=\"col-md-2 d-flex align-items-center justify-content-center mb-2\">
                            <img src=\"{{ base_path }}/{{ active_theme_path() }}/images/misc/pin.png\" alt=\"\" class=\"pin\">
                        </div>
                        <div class=\"col-md-10\">
                            <h2 class=\"block-title orange\">{{ row['content']['#row']._entity.field_agency_title.value }}</h2>
                            <div class=\"details mt-4\">
                                <p><b>Ubicación:</b> {{ row['content']['#row']._entity.field_agency_city.value }} </p>
                                <p><b>Dirección:</b> {{ row['content']['#row']._entity.field_agency_address.value }} </p>
                                <p><b>Teléfono:</b> {{ row['content']['#row']._entity.field_agency_indicative.value }} {{ row['content']['#row']._entity.field_agency_phone.value }} {{ row['content']['#row']._entity.field_agency_extension.value }} </p>
                                <p><b>Email:</b> {{ row['content']['#row']._entity.field_agency_email.value }} </p>
                                <p><b>Horario de atención:</b> {{ row['content']['#row']._entity.field_agency_schedule.value }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class=\"col-md-6\">
                    <div class=\"row\">
                        <div class=\"col-sm-10 d-flex align-items-start justify-content-center image_ref\">
                            <img src=\"{{ photo }}\" alt=\"\">
                        </div>
                        <div class=\"col-sm-2 d-flex align-items-center justify-content-center\">
                            <a href=\"{{ row['content']['#row']._entity.field_agency_url.value }}\"><button class=\"btn w-100 p-30 dark\">Ver</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {% endfor %}
        <!-- End For -->
</div>", "themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--agencies-list.html.twig", "/var/www/web/themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--agencies-list.html.twig");
    }
}
