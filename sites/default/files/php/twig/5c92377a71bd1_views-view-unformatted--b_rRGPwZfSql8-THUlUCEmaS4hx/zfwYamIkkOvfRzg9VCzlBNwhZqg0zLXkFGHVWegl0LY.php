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

/* themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--banner-home-slider.html.twig */
class __TwigTemplate_d82c0c4c2f2bb619caa600ae75b3edd94abc21f0777b74ccff7a7e691c9fab83 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["for" => 32, "set" => 33];
        $filters = [];
        $functions = ["file_url" => 33];

        try {
            $this->sandbox->checkSecurity(
                ['for', 'set'],
                [],
                ['file_url']
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
        echo "<section class=\"container-fluid searcher\">
    <div class=\"row searcher__wrapper\">
        <!-- 
        Slider Galería para el buscador:
        este carousel se identifica con el id: searcher__gallery
        y se manipula con los identificadores
        de la clase carousel-indicators
        El envoltorio del slider es la clase searcher__slider.
        -->
        <div class=\"searcher__slider gallery\">
            <div id=\"searcher__gallery\" class=\"carousel  slide\" data-ride=\"carousel\">
                <!-- Contenedor Slider Carrusel  -->  
                <div class=\"carousel-inner\">
                \t<!-- Elemento Slider Carrusel --> 
                \t";
        // line 32
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 33
            echo "\t\t\t  \t\t";
            $context["photo"] = call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_image", []), "entity", []), "fileuri", []))]);
            // line 34
            echo "                    <div class=\"carousel-item active\">
                    \t<!-- Foto Elemento Slider Carrusel -->
                    \t<h1 class=\"searcher__title\">";
            // line 36
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "title", []), "value", [])), "html", null, true);
            echo "</h1>
                    \t<div class=\"weather_box\">
\t\t\t                <span>22° Guatapé/Piedra el Peñol</span><i></i>
\t\t\t            </div>
                        <img src=\"";
            // line 40
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["photo"] ?? null)), "html", null, true);
            echo "\" alt=\"First slide\">
                    </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"col\">
                
                <svg class=\"searcher__svg\">
                    <path d=\"M0 25 L1500 25 Z\"/>
                </svg>
                <div class=\"container-fluid searcher__toolbar\">
                    <div class=\"row\">
                        <div class=\"col\">
                            <h2 class=\"searcher__subtitle\">¿Cual es tu siguiente viaje?</h2>
                            <h2 class=\"searcher__subtitle searcher__subtitle--right\">Experiencias</h2>
                        </div>
                    </div>
                    <div class=\"row searcher__row searcher__row--filler\">
                        <div class=\"col-6 col-md-2 searcher__col\">
                            <p class=\"searcher__label\">Origen</p>
                            <select class=\"searcher__select __select--bluedark\" name=\"origin\" id=\"origin\">
                                <option value=\"Bogotá\" selected>Bogotá</option>
                                <option value=\"Bogotá\" >Cali</option>
                            </select>
                        </div>
                        <div class=\"col-6 col-md-2 searcher__col searcher__col--line\">
                            <p class=\"searcher__label\">Destino</p>
                            <select class=\"searcher__select __select--siena\" name=\"destiny\" id=\"destiny\">
                                <option value=\"Medellín\" selected>Medellín</option>
                                <option value=\"Medellín\">Melgar</option>
                            </select>
                        </div>
                        <div class=\"col-6 col-md-2 searcher__col\">
                            <p class=\"searcher__label searcher__label--nomobile\">Ida</p>
                            <input type=\"date\" class=\"searcher__input searcher__input--date searcher__input--blue\" name=\"fromof\" id=\"fromof\"/>
                        </div>
                        <div class=\"col-6 col-md-2 searcher__col\">
                            <p class=\"searcher__label searcher__label--nomobile\">Regreso (opcional)</p>
                            <input type=\"date\" class=\"searcher__input searcher__input--date searcher__input--yellow\" name=\"cameof\" id=\"cameof\"/>
                        </div>
                        <div class=\"col-12 col-md-2 searcher__col justify-content-center d-flex\">
                            <button class=\"hvr-pulse-shrink searcher__btn searcher__btn--search\">Buscar</button>
                            <button class=\"hvr-pulse-shrink searcher__btn searcher__btn--tour d-inline-block d-sm-none\">Tours</button>
                        </div>
                        <div class=\"col-12 col-md-2 searcher__col searcher__col--last\">
                            <button class=\"hvr-pulse-shrink searcher__btn searcher__btn--tour searcher__btn--onlydesktop\">Tours</button>
                        </div>
                    </div>
                </div>
            </div>
\t</div>
</section>";
    }

    public function getTemplateName()
    {
        return "themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--banner-home-slider.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 43,  89 => 40,  82 => 36,  78 => 34,  75 => 33,  71 => 32,  55 => 18,);
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
<section class=\"container-fluid searcher\">
    <div class=\"row searcher__wrapper\">
        <!-- 
        Slider Galería para el buscador:
        este carousel se identifica con el id: searcher__gallery
        y se manipula con los identificadores
        de la clase carousel-indicators
        El envoltorio del slider es la clase searcher__slider.
        -->
        <div class=\"searcher__slider gallery\">
            <div id=\"searcher__gallery\" class=\"carousel  slide\" data-ride=\"carousel\">
                <!-- Contenedor Slider Carrusel  -->  
                <div class=\"carousel-inner\">
                \t<!-- Elemento Slider Carrusel --> 
                \t{% for row in rows %}
\t\t\t  \t\t{% set photo = file_url(row['content']['#row']._entity.field_image.entity.fileuri) %}
                    <div class=\"carousel-item active\">
                    \t<!-- Foto Elemento Slider Carrusel -->
                    \t<h1 class=\"searcher__title\">{{ row['content']['#row']._entity.title.value }}</h1>
                    \t<div class=\"weather_box\">
\t\t\t                <span>22° Guatapé/Piedra el Peñol</span><i></i>
\t\t\t            </div>
                        <img src=\"{{ photo }}\" alt=\"First slide\">
                    </div>
                    {% endfor %}
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"col\">
                
                <svg class=\"searcher__svg\">
                    <path d=\"M0 25 L1500 25 Z\"/>
                </svg>
                <div class=\"container-fluid searcher__toolbar\">
                    <div class=\"row\">
                        <div class=\"col\">
                            <h2 class=\"searcher__subtitle\">¿Cual es tu siguiente viaje?</h2>
                            <h2 class=\"searcher__subtitle searcher__subtitle--right\">Experiencias</h2>
                        </div>
                    </div>
                    <div class=\"row searcher__row searcher__row--filler\">
                        <div class=\"col-6 col-md-2 searcher__col\">
                            <p class=\"searcher__label\">Origen</p>
                            <select class=\"searcher__select __select--bluedark\" name=\"origin\" id=\"origin\">
                                <option value=\"Bogotá\" selected>Bogotá</option>
                                <option value=\"Bogotá\" >Cali</option>
                            </select>
                        </div>
                        <div class=\"col-6 col-md-2 searcher__col searcher__col--line\">
                            <p class=\"searcher__label\">Destino</p>
                            <select class=\"searcher__select __select--siena\" name=\"destiny\" id=\"destiny\">
                                <option value=\"Medellín\" selected>Medellín</option>
                                <option value=\"Medellín\">Melgar</option>
                            </select>
                        </div>
                        <div class=\"col-6 col-md-2 searcher__col\">
                            <p class=\"searcher__label searcher__label--nomobile\">Ida</p>
                            <input type=\"date\" class=\"searcher__input searcher__input--date searcher__input--blue\" name=\"fromof\" id=\"fromof\"/>
                        </div>
                        <div class=\"col-6 col-md-2 searcher__col\">
                            <p class=\"searcher__label searcher__label--nomobile\">Regreso (opcional)</p>
                            <input type=\"date\" class=\"searcher__input searcher__input--date searcher__input--yellow\" name=\"cameof\" id=\"cameof\"/>
                        </div>
                        <div class=\"col-12 col-md-2 searcher__col justify-content-center d-flex\">
                            <button class=\"hvr-pulse-shrink searcher__btn searcher__btn--search\">Buscar</button>
                            <button class=\"hvr-pulse-shrink searcher__btn searcher__btn--tour d-inline-block d-sm-none\">Tours</button>
                        </div>
                        <div class=\"col-12 col-md-2 searcher__col searcher__col--last\">
                            <button class=\"hvr-pulse-shrink searcher__btn searcher__btn--tour searcher__btn--onlydesktop\">Tours</button>
                        </div>
                    </div>
                </div>
            </div>
\t</div>
</section>", "themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--banner-home-slider.html.twig", "/var/www/web/themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--banner-home-slider.html.twig");
    }
}
