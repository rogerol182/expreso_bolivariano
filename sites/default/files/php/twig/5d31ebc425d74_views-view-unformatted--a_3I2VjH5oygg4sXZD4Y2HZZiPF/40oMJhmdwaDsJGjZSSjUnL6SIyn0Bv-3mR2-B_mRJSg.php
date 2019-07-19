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

/* themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--agencies-multiservice-list.html.twig */
class __TwigTemplate_07349e6d59c303221ee5427aef38540e6f79aaec45c256468ee52f6225da7ea6 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["for" => 22, "set" => 23];
        $filters = ["escape" => 29];
        $functions = ["file_url" => 23, "active_theme_path" => 29];

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
        echo "<div class=\"division mt-4 mb-4\"></div>
<div class=\"col col-lg-10 mx-auto mt-4\">
        <h2 class=\"block-title blue\">Puntos Multiservicio</h2>
        <!--  Begins For -->
        ";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 23
            echo "        ";
            $context["photo"] = call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_agency_image_list", []), "entity", []), "fileuri", []))]);
            // line 24
            echo "        <div class=\"agencias__panel panel panel-shadow mt-2\">
            <div class=\"row pl-2 pr-2\">
                <div class=\"col-md-6 mb-4\">
                    <div class=\"row\">
                        <div class=\"col-md-2 d-flex align-items-center justify-content-center mb-2\">
                            <img src=\"";
            // line 29
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null)), "html", null, true);
            echo "/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getActiveThemePath(), "html", null, true);
            echo "/images/misc/pinb.png\" alt=\"\" class=\"pin\">
                        </div>
                        <div class=\"col-md-10\">
                            <h2 class=\"block-title blue\">";
            // line 32
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_agency_title", []), "value", [])), "html", null, true);
            echo "</h2>
                            <div class=\"details mt-4\">
                                <p><b>Ubicación:</b> ";
            // line 34
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_agency_city", []), "value", [])), "html", null, true);
            echo " </p>
                                <p><b>Dirección:</b> ";
            // line 35
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_agency_address", []), "value", [])), "html", null, true);
            echo " </p>
                                <p><b>Teléfono:</b> ";
            // line 36
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_agency_indicative", []), "value", [])), "html", null, true);
            echo " ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_agency_phone", []), "value", [])), "html", null, true);
            echo " ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_agency_extension", []), "value", [])), "html", null, true);
            echo " </p>
                                <p><b>Email:</b> ";
            // line 37
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_agency_email", []), "value", [])), "html", null, true);
            echo " </p>
                                <p><b>Horario de atención:</b> ";
            // line 38
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
            // line 46
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["photo"] ?? null)), "html", null, true);
            echo "\" alt=\"\">
                        </div>
                        <div class=\"col-sm-2 d-flex align-items-center justify-content-center\">
                            <a href=\"";
            // line 49
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
        // line 56
        echo "        <!-- End For -->
</div>";
    }

    public function getTemplateName()
    {
        return "themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--agencies-multiservice-list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  138 => 56,  125 => 49,  119 => 46,  108 => 38,  104 => 37,  96 => 36,  92 => 35,  88 => 34,  83 => 32,  75 => 29,  68 => 24,  65 => 23,  61 => 22,  55 => 18,);
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
<div class=\"division mt-4 mb-4\"></div>
<div class=\"col col-lg-10 mx-auto mt-4\">
        <h2 class=\"block-title blue\">Puntos Multiservicio</h2>
        <!--  Begins For -->
        {% for row in rows %}
        {% set photo = file_url(row['content']['#row']._entity.field_agency_image_list.entity.fileuri) %}
        <div class=\"agencias__panel panel panel-shadow mt-2\">
            <div class=\"row pl-2 pr-2\">
                <div class=\"col-md-6 mb-4\">
                    <div class=\"row\">
                        <div class=\"col-md-2 d-flex align-items-center justify-content-center mb-2\">
                            <img src=\"{{ base_path }}/{{ active_theme_path() }}/images/misc/pinb.png\" alt=\"\" class=\"pin\">
                        </div>
                        <div class=\"col-md-10\">
                            <h2 class=\"block-title blue\">{{ row['content']['#row']._entity.field_agency_title.value }}</h2>
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
</div>", "themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--agencies-multiservice-list.html.twig", "/var/www/web/themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--agencies-multiservice-list.html.twig");
    }
}
