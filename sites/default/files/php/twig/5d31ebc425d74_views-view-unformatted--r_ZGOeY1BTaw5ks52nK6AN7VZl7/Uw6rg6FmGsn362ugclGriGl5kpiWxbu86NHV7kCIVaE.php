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

/* themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--routes-list.html.twig */
class __TwigTemplate_60a3a402511cc9a179f341d0a57494466736b0779c3c8aaf8ea8c0e9c29c27a3 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 18, "for" => 26];
        $filters = ["date" => 18, "escape" => 31];
        $functions = ["file_url" => 27, "active_theme_path" => 64];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'for'],
                ['date', 'escape'],
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
        $context["now"] = twig_date_format_filter($this->env, "now", "d-m-Y");
        // line 19
        echo "<div class=\"container\">
    <div class=\"row\">
        <div class=\"resultados mt-4 col-12\">
            <div class=\"text-center\">
                <h3 class=\"title with-underline\">Nuestras Rutas</h3>
            </div>
            <div class=\"row\">
                ";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 27
            echo "                ";
            $context["photo_one"] = call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_image_origin", []), "entity", []), "fileuri", []))]);
            // line 28
            echo "                ";
            $context["photo_two"] = call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_image_destiny", []), "entity", []), "fileuri", []))]);
            // line 29
            echo "                <div class=\"col-sm-12 col-md-12 col-lg-4\">
                    <div class=\"panel panel-shadow\">
                        <div class=\"cities block-title orange\">";
            // line 31
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_title", []), "value", [])), "html", null, true);
            echo "</div>
                        <div class=\"images\">
                            <img class=\"imagedivideone\" style=\"position:absolute;\" src=\"";
            // line 33
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["photo_one"] ?? null)), "html", null, true);
            echo "\" alt=\"\">
                            <img class=\"imagedividetwo\" style=\"position:absolute;\" src=\"";
            // line 34
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["photo_two"] ?? null)), "html", null, true);
            echo "\" alt=\"\">
                        </div>
                        <div class=\"bg-dark-blue row no-gutters mt-2\">
                            <div class=\"col-6 pl-2\">Origen</div>
                            <div class=\"col-6 pl-2\">Destino</div>
                        </div>
                        <div class=\"bg-gray row no-gutters mt-2\">
                            <div class=\"col-6 pl-2\">";
            // line 41
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_city_origin", []), "value", [])), "html", null, true);
            echo "</div>
                            <div class=\"col-6 pl-2\">";
            // line 42
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_city_destiny", []), "value", [])), "html", null, true);
            echo "</div>
                        </div>
                        <div class=\"bg-dark-blue row no-gutters mt-2\">
                            <div class=\"col-6 pl-2\">Distancia</div>
                            <div class=\"col-6 pl-2\">Tiempo estimado</div>
                        </div>
                        <div class=\"bg-gray row no-gutters mt-2\">
                            <div class=\"col-6 pl-2\">";
            // line 49
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_distance", []), "value", [])), "html", null, true);
            echo "</div>
                            <div class=\"col-6 pl-2\">";
            // line 50
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_time_estimated", []), "value", [])), "html", null, true);
            echo "</div>
                        </div>

                        <div class=\"panel mt-4\">
                            <a href=\"";
            // line 54
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_url", []), "value", [])), "html", null, true);
            echo "\"><button class=\"btn w-100 light\">Ver mapa</button></a>
                            <!--<a href=\"/pages/reservation/";
            // line 55
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_city_origin_id", []), "value", [])), "html", null, true);
            echo "/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_city_origin", []), "value", [])), "html", null, true);
            echo "/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_city_destiny_id", []), "value", [])), "html", null, true);
            echo "/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_city_destiny", []), "value", [])), "html", null, true);
            echo "/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["now"] ?? null)), "html", null, true);
            echo "/0\"><button class=\"btn mt-2 w-100 dark\">Comprar tiquete</button></a>-->
                        </div>
                    </div>
                </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo "            </div>
        </div>
    </div>
    <!--<div class=\"col col-lg-10 mx-auto mt-4 mb-4 text-gray d-flex justify-content-between align-items-end\">
        <img class=\"mr-3\" src=\"";
        // line 64
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null)), "html", null, true);
        echo "/";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getActiveThemePath(), "html", null, true);
        echo "/images/misc/alert.png\" height=\"65px\" alt=\"Alerta\">
        <div class=\"small\"> <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi aut nam nisi? Doloribus, dolore incidunt inventore porro hic magni voluptatem soluta?</p></div>
    </div>-->
</div>

";
    }

    public function getTemplateName()
    {
        return "themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--routes-list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 64,  147 => 60,  128 => 55,  124 => 54,  117 => 50,  113 => 49,  103 => 42,  99 => 41,  89 => 34,  85 => 33,  80 => 31,  76 => 29,  73 => 28,  70 => 27,  66 => 26,  57 => 19,  55 => 18,);
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
{% set now = \"now\"|date(\"d-m-Y\") %}
<div class=\"container\">
    <div class=\"row\">
        <div class=\"resultados mt-4 col-12\">
            <div class=\"text-center\">
                <h3 class=\"title with-underline\">Nuestras Rutas</h3>
            </div>
            <div class=\"row\">
                {% for row in rows %}
                {% set photo_one = file_url(row['content']['#row']._entity.field_route_image_origin.entity.fileuri) %}
                {% set photo_two = file_url(row['content']['#row']._entity.field_route_image_destiny.entity.fileuri) %}
                <div class=\"col-sm-12 col-md-12 col-lg-4\">
                    <div class=\"panel panel-shadow\">
                        <div class=\"cities block-title orange\">{{ row['content']['#row']._entity.field_route_title.value }}</div>
                        <div class=\"images\">
                            <img class=\"imagedivideone\" style=\"position:absolute;\" src=\"{{ photo_one }}\" alt=\"\">
                            <img class=\"imagedividetwo\" style=\"position:absolute;\" src=\"{{ photo_two }}\" alt=\"\">
                        </div>
                        <div class=\"bg-dark-blue row no-gutters mt-2\">
                            <div class=\"col-6 pl-2\">Origen</div>
                            <div class=\"col-6 pl-2\">Destino</div>
                        </div>
                        <div class=\"bg-gray row no-gutters mt-2\">
                            <div class=\"col-6 pl-2\">{{ row['content']['#row']._entity.field_route_city_origin.value }}</div>
                            <div class=\"col-6 pl-2\">{{ row['content']['#row']._entity.field_route_city_destiny.value }}</div>
                        </div>
                        <div class=\"bg-dark-blue row no-gutters mt-2\">
                            <div class=\"col-6 pl-2\">Distancia</div>
                            <div class=\"col-6 pl-2\">Tiempo estimado</div>
                        </div>
                        <div class=\"bg-gray row no-gutters mt-2\">
                            <div class=\"col-6 pl-2\">{{ row['content']['#row']._entity.field_route_distance.value }}</div>
                            <div class=\"col-6 pl-2\">{{ row['content']['#row']._entity.field_route_time_estimated.value }}</div>
                        </div>

                        <div class=\"panel mt-4\">
                            <a href=\"{{ row['content']['#row']._entity.field_route_url.value }}\"><button class=\"btn w-100 light\">Ver mapa</button></a>
                            <!--<a href=\"/pages/reservation/{{ row['content']['#row']._entity.field_route_city_origin_id.value }}/{{ row['content']['#row']._entity.field_route_city_origin.value }}/{{ row['content']['#row']._entity.field_route_city_destiny_id.value }}/{{ row['content']['#row']._entity.field_route_city_destiny.value }}/{{ now }}/0\"><button class=\"btn mt-2 w-100 dark\">Comprar tiquete</button></a>-->
                        </div>
                    </div>
                </div>
                {% endfor %}
            </div>
        </div>
    </div>
    <!--<div class=\"col col-lg-10 mx-auto mt-4 mb-4 text-gray d-flex justify-content-between align-items-end\">
        <img class=\"mr-3\" src=\"{{ base_path }}/{{ active_theme_path() }}/images/misc/alert.png\" height=\"65px\" alt=\"Alerta\">
        <div class=\"small\"> <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi aut nam nisi? Doloribus, dolore incidunt inventore porro hic magni voluptatem soluta?</p></div>
    </div>-->
</div>

", "themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--routes-list.html.twig", "/var/www/web/themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--routes-list.html.twig");
    }
}
