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

/* modules/custom/expreso_bolivariano_blocks/templates/block--promotions-home-grid.html.twig */
class __TwigTemplate_6a53b1a595d0da96cbc3cd71f1d61649656771360c8730479554d0d0379f7f6f extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["for" => 3, "set" => 4, "if" => 5];
        $filters = ["escape" => 10, "lower" => 10, "trim" => 10, "capitalize" => 12, "number_format" => 19, "replace" => 19];
        $functions = ["cycle" => 4, "active_theme_path" => 10];

        try {
            $this->sandbox->checkSecurity(
                ['for', 'set', 'if'],
                ['escape', 'lower', 'trim', 'capitalize', 'number_format', 'replace'],
                ['cycle', 'active_theme_path']
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
        echo "<section class=\"container-fluid cards\">
\t<div class=\"row no-gutters cards__container\">
    \t";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["promotionsData"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["items"]) {
            // line 4
            echo "    \t";
            $context["oddOrEven"] = twig_cycle([0 => "odd", 1 => "even"], $this->sandbox->ensureToStringAllowed($this->getAttribute($context["loop"], "index0", [])));
            // line 5
            echo "    \t";
            if ((($context["oddOrEven"] ?? null) == "odd")) {
                // line 6
                echo "        <article class=\"col-6 col-md-3 cards__item cards__item--yellow\">
    \t";
            } else {
                // line 8
                echo "        <article class=\"col-6 col-md-3 cards__item cards__item--blue\">
    \t";
            }
            // line 9
            echo "   
\t        <img class=\"cards__image\" src=\"";
            // line 10
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null)), "html", null, true);
            echo "/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getActiveThemePath(), "html", null, true);
            echo "/images/promotions/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_lower_filter($this->env, twig_trim_filter($this->sandbox->ensureToStringAllowed($this->getAttribute($context["items"], "agencyDestinationName", [])))), "html", null, true);
            echo ".jpg\" alt=\"\">
            <div class=\"cards__wrapper\">
                <h3 class=\"cards__title\">";
            // line 12
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_capitalize_string_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["items"], "agencyDestinationName", []))), "html", null, true);
            echo "</h3>
                <div class=\"cards__description\">
                    <img src=\"";
            // line 14
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null)), "html", null, true);
            echo "/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getActiveThemePath(), "html", null, true);
            echo "/images/label/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_trim_filter($this->sandbox->ensureToStringAllowed($this->getAttribute($context["items"], "busServiceName", []))), "html", null, true);
            echo "-Left.png\" alt=\"\" class=\"cards__type\">
                    <img src=\"";
            // line 15
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null)), "html", null, true);
            echo "/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getActiveThemePath(), "html", null, true);
            echo "/images/bus/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_trim_filter($this->sandbox->ensureToStringAllowed($this->getAttribute($context["items"], "busServiceName", []))), "html", null, true);
            echo "-Vehicle.png\" alt=\"\" class=\"cards__bus\">
                    <h4 class=\"cards__cities\">";
            // line 16
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_capitalize_string_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["items"], "agencyOriginName", []))), "html", null, true);
            echo " - ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_capitalize_string_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["items"], "agencyDestinationName", []))), "html", null, true);
            echo "</h4>
                    <p class=\"cards__prizes\">
                        <span class=\"cards__infoprice\">Desde:</span>
                        <span class=\"cards__value\"><a  style=\"color: #FFF;\" class=\"linkNew\" href=\"/pages/reservation/";
            // line 19
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_number_format_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["items"], "agencyOriginId", []))), "html", null, true);
            echo "/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_trim_filter(twig_capitalize_string_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["items"], "agencyOriginName", [])))), "html", null, true);
            echo "/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_number_format_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["items"], "agencyDestinationId", []))), "html", null, true);
            echo "/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_trim_filter(twig_capitalize_string_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["items"], "agencyDestinationName", [])))), "html", null, true);
            echo "/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_replace_filter($this->sandbox->ensureToStringAllowed($this->getAttribute($context["items"], "tripDate", [])), ["/" => "-"]), "html", null, true);
            echo "/0\">\$";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_number_format_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["items"], "tripRate", [])), 0, "", "."), "html", null, true);
            echo "</a></span>
                    </p>
                </div>
            </div>
        </article>
\t    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['items'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "\t</div>
\t<div id=\"more\" style=\"display: none;\">
\t\t<div class=\"row no-gutters cards__container\">
\t\t";
        // line 28
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["promotionsMoreData"] ?? null));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["itemsMore"]) {
            // line 29
            echo "\t\t";
            $context["oddOrEvenMore"] = twig_cycle([0 => "odd", 1 => "even"], $this->sandbox->ensureToStringAllowed($this->getAttribute($context["loop"], "index0", [])));
            // line 30
            echo "\t    \t";
            if ((($context["oddOrEvenMore"] ?? null) == "odd")) {
                // line 31
                echo "\t    \t<article class=\"col-6 col-md-3 cards__item cards__item--yellow\">
\t\t\t";
            } else {
                // line 33
                echo "\t    \t<article class=\"col-6 col-md-3 cards__item cards__item--blue\">
\t\t\t";
            }
            // line 35
            echo "\t\t        <img class=\"cards__image\" src=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null)), "html", null, true);
            echo "/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getActiveThemePath(), "html", null, true);
            echo "/images/promotions/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_lower_filter($this->env, twig_trim_filter($this->sandbox->ensureToStringAllowed($this->getAttribute($context["itemsMore"], "agencyDestinationName", [])))), "html", null, true);
            echo ".jpg\" alt=\"\">
\t            <div class=\"cards__wrapper\">
\t                <h3 class=\"cards__title\">";
            // line 37
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_capitalize_string_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["itemsMore"], "agencyDestinationName", []))), "html", null, true);
            echo "</h3>
\t                <div class=\"cards__description\">
\t                    <img src=\"";
            // line 39
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null)), "html", null, true);
            echo "/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getActiveThemePath(), "html", null, true);
            echo "/images/label/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_trim_filter($this->sandbox->ensureToStringAllowed($this->getAttribute($context["itemsMore"], "busServiceName", []))), "html", null, true);
            echo "-Left.png\" alt=\"\" class=\"cards__type\">
\t                    <img src=\"";
            // line 40
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null)), "html", null, true);
            echo "/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getActiveThemePath(), "html", null, true);
            echo "/images/bus/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_trim_filter($this->sandbox->ensureToStringAllowed($this->getAttribute($context["itemsMore"], "busServiceName", []))), "html", null, true);
            echo "-Vehicle.png\" alt=\"\" class=\"cards__bus\">
\t                    <h4 class=\"cards__cities\">";
            // line 41
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_capitalize_string_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["itemsMore"], "agencyOriginName", []))), "html", null, true);
            echo " - ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_capitalize_string_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["itemsMore"], "agencyDestinationName", []))), "html", null, true);
            echo "</h4>
\t                    <p class=\"cards__prizes\">
\t                        <span class=\"cards__infoprice\">Desde:</span>
\t                         <span class=\"cards__value\"><a  style=\"color: #FFF;\" class=\"linkNew\" href=\"/pages/reservation/";
            // line 44
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_number_format_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["itemsMore"], "agencyOriginId", []))), "html", null, true);
            echo "/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_trim_filter(twig_capitalize_string_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["itemsMore"], "agencyOriginName", [])))), "html", null, true);
            echo "/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_number_format_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["itemsMore"], "agencyDestinationId", []))), "html", null, true);
            echo "/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_trim_filter(twig_capitalize_string_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["itemsMore"], "agencyDestinationName", [])))), "html", null, true);
            echo "/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_replace_filter($this->sandbox->ensureToStringAllowed($this->getAttribute($context["itemsMore"], "tripDate", [])), ["/" => "-"]), "html", null, true);
            echo "/0\">\$";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_number_format_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["itemsMore"], "tripRate", [])), 0, "", "."), "html", null, true);
            echo "</a></span>
\t                    </p>
\t                </div>
\t            </div>
\t        </article>
\t    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['itemsMore'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "\t\t</div>
    </div>
    <div id=\"button_more\" class=\"row no-gutters mt-4\">
        <div class=\"col-12 text-center\">
            <a id=\"more_promotions\" class=\"cards__anchor\">Más Promociones <i class=\"cards__anchor-ico fa fa-angle-down\" aria-hidden=\"true\" style=\"font-size: 80px;\"></i></a>
        </div>
    </div>
    <div id=\"button_less\" class=\"row no-gutters mt-4\" style=\"display: none;\">
        <div class=\"col-12 text-center\">
            <a id=\"less_promotions\" class=\"cards__anchor\">Menos Promociones <i class=\"cards__anchor-ico fa fa-angle-up\" aria-hidden=\"true\" style=\"font-size: 80px;\"></i></a>
        </div>
    </div>
</section>";
    }

    public function getTemplateName()
    {
        return "modules/custom/expreso_bolivariano_blocks/templates/block--promotions-home-grid.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  266 => 50,  236 => 44,  228 => 41,  220 => 40,  212 => 39,  207 => 37,  197 => 35,  193 => 33,  189 => 31,  186 => 30,  183 => 29,  166 => 28,  161 => 25,  131 => 19,  123 => 16,  115 => 15,  107 => 14,  102 => 12,  93 => 10,  90 => 9,  86 => 8,  82 => 6,  79 => 5,  76 => 4,  59 => 3,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<section class=\"container-fluid cards\">
\t<div class=\"row no-gutters cards__container\">
    \t{% for items in promotionsData %}
    \t{% set oddOrEven = cycle(['odd', 'even'], loop.index0) %}
    \t{% if oddOrEven == 'odd' %}
        <article class=\"col-6 col-md-3 cards__item cards__item--yellow\">
    \t{% else %}
        <article class=\"col-6 col-md-3 cards__item cards__item--blue\">
    \t{% endif %}   
\t        <img class=\"cards__image\" src=\"{{ base_path }}/{{ active_theme_path() }}/images/promotions/{{ (items.agencyDestinationName)|trim|lower }}.jpg\" alt=\"\">
            <div class=\"cards__wrapper\">
                <h3 class=\"cards__title\">{{ (items.agencyDestinationName)|capitalize }}</h3>
                <div class=\"cards__description\">
                    <img src=\"{{ base_path }}/{{ active_theme_path() }}/images/label/{{ (items.busServiceName)|trim }}-Left.png\" alt=\"\" class=\"cards__type\">
                    <img src=\"{{ base_path }}/{{ active_theme_path() }}/images/bus/{{ (items.busServiceName)|trim }}-Vehicle.png\" alt=\"\" class=\"cards__bus\">
                    <h4 class=\"cards__cities\">{{ (items.agencyOriginName)|capitalize }} - {{ (items.agencyDestinationName)|capitalize }}</h4>
                    <p class=\"cards__prizes\">
                        <span class=\"cards__infoprice\">Desde:</span>
                        <span class=\"cards__value\"><a  style=\"color: #FFF;\" class=\"linkNew\" href=\"/pages/reservation/{{ (items.agencyOriginId)|number_format }}/{{ (items.agencyOriginName)|capitalize|trim }}/{{ (items.agencyDestinationId)|number_format }}/{{ (items.agencyDestinationName)|capitalize|trim }}/{{ (items.tripDate|replace({'/': '-'})) }}/0\">\${{ (items.tripRate)|number_format(0, '', '.') }}</a></span>
                    </p>
                </div>
            </div>
        </article>
\t    {% endfor %}
\t</div>
\t<div id=\"more\" style=\"display: none;\">
\t\t<div class=\"row no-gutters cards__container\">
\t\t{% for itemsMore in promotionsMoreData %}
\t\t{% set oddOrEvenMore = cycle(['odd', 'even'], loop.index0) %}
\t    \t{% if oddOrEvenMore == 'odd' %}
\t    \t<article class=\"col-6 col-md-3 cards__item cards__item--yellow\">
\t\t\t{% else %}
\t    \t<article class=\"col-6 col-md-3 cards__item cards__item--blue\">
\t\t\t{% endif %}
\t\t        <img class=\"cards__image\" src=\"{{ base_path }}/{{ active_theme_path() }}/images/promotions/{{ (itemsMore.agencyDestinationName)|trim|lower }}.jpg\" alt=\"\">
\t            <div class=\"cards__wrapper\">
\t                <h3 class=\"cards__title\">{{ (itemsMore.agencyDestinationName)|capitalize }}</h3>
\t                <div class=\"cards__description\">
\t                    <img src=\"{{ base_path }}/{{ active_theme_path() }}/images/label/{{ (itemsMore.busServiceName)|trim }}-Left.png\" alt=\"\" class=\"cards__type\">
\t                    <img src=\"{{ base_path }}/{{ active_theme_path() }}/images/bus/{{ (itemsMore.busServiceName)|trim }}-Vehicle.png\" alt=\"\" class=\"cards__bus\">
\t                    <h4 class=\"cards__cities\">{{ (itemsMore.agencyOriginName)|capitalize }} - {{ (itemsMore.agencyDestinationName)|capitalize }}</h4>
\t                    <p class=\"cards__prizes\">
\t                        <span class=\"cards__infoprice\">Desde:</span>
\t                         <span class=\"cards__value\"><a  style=\"color: #FFF;\" class=\"linkNew\" href=\"/pages/reservation/{{ (itemsMore.agencyOriginId)|number_format }}/{{ (itemsMore.agencyOriginName)|capitalize|trim }}/{{ (itemsMore.agencyDestinationId)|number_format }}/{{ (itemsMore.agencyDestinationName)|capitalize|trim }}/{{ (itemsMore.tripDate|replace({'/': '-'})) }}/0\">\${{ (itemsMore.tripRate)|number_format(0, '', '.') }}</a></span>
\t                    </p>
\t                </div>
\t            </div>
\t        </article>
\t    {% endfor %}
\t\t</div>
    </div>
    <div id=\"button_more\" class=\"row no-gutters mt-4\">
        <div class=\"col-12 text-center\">
            <a id=\"more_promotions\" class=\"cards__anchor\">Más Promociones <i class=\"cards__anchor-ico fa fa-angle-down\" aria-hidden=\"true\" style=\"font-size: 80px;\"></i></a>
        </div>
    </div>
    <div id=\"button_less\" class=\"row no-gutters mt-4\" style=\"display: none;\">
        <div class=\"col-12 text-center\">
            <a id=\"less_promotions\" class=\"cards__anchor\">Menos Promociones <i class=\"cards__anchor-ico fa fa-angle-up\" aria-hidden=\"true\" style=\"font-size: 80px;\"></i></a>
        </div>
    </div>
</section>", "modules/custom/expreso_bolivariano_blocks/templates/block--promotions-home-grid.html.twig", "/var/www/web/modules/custom/expreso_bolivariano_blocks/templates/block--promotions-home-grid.html.twig");
    }
}
