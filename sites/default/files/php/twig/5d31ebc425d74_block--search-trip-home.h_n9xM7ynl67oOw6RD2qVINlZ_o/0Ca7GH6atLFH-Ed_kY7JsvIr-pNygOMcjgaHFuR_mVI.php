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

/* modules/custom/expreso_bolivariano_blocks/templates/block--search-trip-home.html.twig */
class __TwigTemplate_2951a18e7e2c3b25a0a630e5ac8012067b24c87f6d376b8af9a137c9d3851dd2 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 1, "for" => 6, "if" => 7];
        $filters = ["date" => 1, "escape" => 12, "title" => 12, "trim" => 12];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'for', 'if'],
                ['date', 'escape', 'title', 'trim'],
                []
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
        // line 1
        $context["now"] = twig_date_format_filter($this->env, "now", "Y-m-d");
        // line 2
        echo "<div class=\"row searcher__row searcher__row--filler\">
    <div class=\"col-6 col-md-2 searcher__col\">
        <p class=\"searcher__label\">Origen</p>
        <select class=\"searcher__select __select--bluedark\" name=\"origin\" id=\"originCity\">
            ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["citiesGoData"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["itemsGo"]) {
            // line 7
            echo "            ";
            if (($this->getAttribute($context["itemsGo"], "agencyId", []) == 1)) {
                // line 8
                echo "            ";
                $context["selected"] = "selected=\"selected\"";
                // line 9
                echo "            ";
            } else {
                // line 10
                echo "            ";
                $context["selected"] = "";
                // line 11
                echo "            ";
            }
            // line 12
            echo "            <option value=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["itemsGo"], "agencyId", [])), "html", null, true);
            echo "\" ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["selected"] ?? null)), "html", null, true);
            echo " >";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_title_string_filter($this->env, twig_trim_filter($this->sandbox->ensureToStringAllowed($this->getAttribute($context["itemsGo"], "agencyName", [])))), "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['itemsGo'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "        </select>
    </div>
    <div class=\"col-6 col-md-2 searcher__col searcher__col--line\">
        <p class=\"searcher__label\">Destino</p>
        <select class=\"searcher__select __select--siena\" name=\"destiny\" id=\"destinyCity\">
            ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["citiesBackData"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["itemsBack"]) {
            // line 20
            echo "            ";
            if (($this->getAttribute($context["itemsBack"], "agencyId", []) == 2)) {
                // line 21
                echo "            ";
                $context["selectedBack"] = "selected=\"selected\"";
                // line 22
                echo "            ";
            } else {
                // line 23
                echo "            ";
                $context["selectedBack"] = "";
                // line 24
                echo "            ";
            }
            // line 25
            echo "            <option value=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["itemsBack"], "agencyId", [])), "html", null, true);
            echo "\" ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["selectedBack"] ?? null)), "html", null, true);
            echo ">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_title_string_filter($this->env, twig_trim_filter($this->sandbox->ensureToStringAllowed($this->getAttribute($context["itemsBack"], "agencyName", [])))), "html", null, true);
            echo "</option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['itemsBack'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "        </select>
    </div>
    <div class=\"col-6 col-md-2 searcher__col\">
        <p class=\"searcher__label searcher__label--nomobile\">Ida</p>
        <input type=\"date\" class=\"searcher__input searcher__input--date searcher__input--blue\" name=\"fromof\" id=\"fromof\" value=\"";
        // line 31
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["now"] ?? null)), "html", null, true);
        echo "\">
    </div>
    <div class=\"col-6 col-md-2 searcher__col\">
        <p class=\"searcher__label searcher__label--nomobile\">Regreso (opcional)</p>
        <input type=\"date\" class=\"searcher__input searcher__input--date searcher__input--yellow\" name=\"cameof\" id=\"cameof\">
    </div>
    <div class=\"col-12 col-md-2 searcher__col justify-content-center d-flex\">
        <button class=\"hvr-pulse-shrink searcher__btn searcher__btn--search\" id=\"buttonSearchTrip\">Buscar</button>
        <button class=\"hvr-pulse-shrink searcher__btn searcher__btn--tour d-inline-block d-sm-none\" id=\"buttonSearchTour\">Tours</button>
    </div>
    <div class=\"col-12 col-md-2 searcher__col searcher__col--last\">
        <button class=\"hvr-pulse-shrink searcher__btn searcher__btn--tour searcher__btn--onlydesktop\" id=\"buttonSearchTourM\">Tours</button>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "modules/custom/expreso_bolivariano_blocks/templates/block--search-trip-home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  140 => 31,  134 => 27,  121 => 25,  118 => 24,  115 => 23,  112 => 22,  109 => 21,  106 => 20,  102 => 19,  95 => 14,  82 => 12,  79 => 11,  76 => 10,  73 => 9,  70 => 8,  67 => 7,  63 => 6,  57 => 2,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% set now = \"now\"|date(\"Y-m-d\") %}
<div class=\"row searcher__row searcher__row--filler\">
    <div class=\"col-6 col-md-2 searcher__col\">
        <p class=\"searcher__label\">Origen</p>
        <select class=\"searcher__select __select--bluedark\" name=\"origin\" id=\"originCity\">
            {% for itemsGo in citiesGoData %}
            {% if itemsGo.agencyId == 1 %}
            {% set selected = 'selected=\"selected\"' %}
            {% else %}
            {% set selected = '' %}
            {% endif %}
            <option value=\"{{ (itemsGo.agencyId) }}\" {{ selected }} >{{ (itemsGo.agencyName)|trim|title }}</option>
            {% endfor %}
        </select>
    </div>
    <div class=\"col-6 col-md-2 searcher__col searcher__col--line\">
        <p class=\"searcher__label\">Destino</p>
        <select class=\"searcher__select __select--siena\" name=\"destiny\" id=\"destinyCity\">
            {% for itemsBack in citiesBackData %}
            {% if itemsBack.agencyId == 2 %}
            {% set selectedBack = 'selected=\"selected\"' %}
            {% else %}
            {% set selectedBack = '' %}
            {% endif %}
            <option value=\"{{ (itemsBack.agencyId) }}\" {{ selectedBack }}>{{ (itemsBack.agencyName)|trim|title }}</option>
            {% endfor %}
        </select>
    </div>
    <div class=\"col-6 col-md-2 searcher__col\">
        <p class=\"searcher__label searcher__label--nomobile\">Ida</p>
        <input type=\"date\" class=\"searcher__input searcher__input--date searcher__input--blue\" name=\"fromof\" id=\"fromof\" value=\"{{ now }}\">
    </div>
    <div class=\"col-6 col-md-2 searcher__col\">
        <p class=\"searcher__label searcher__label--nomobile\">Regreso (opcional)</p>
        <input type=\"date\" class=\"searcher__input searcher__input--date searcher__input--yellow\" name=\"cameof\" id=\"cameof\">
    </div>
    <div class=\"col-12 col-md-2 searcher__col justify-content-center d-flex\">
        <button class=\"hvr-pulse-shrink searcher__btn searcher__btn--search\" id=\"buttonSearchTrip\">Buscar</button>
        <button class=\"hvr-pulse-shrink searcher__btn searcher__btn--tour d-inline-block d-sm-none\" id=\"buttonSearchTour\">Tours</button>
    </div>
    <div class=\"col-12 col-md-2 searcher__col searcher__col--last\">
        <button class=\"hvr-pulse-shrink searcher__btn searcher__btn--tour searcher__btn--onlydesktop\" id=\"buttonSearchTourM\">Tours</button>
    </div>
</div>", "modules/custom/expreso_bolivariano_blocks/templates/block--search-trip-home.html.twig", "/var/www/web/modules/custom/expreso_bolivariano_blocks/templates/block--search-trip-home.html.twig");
    }
}
