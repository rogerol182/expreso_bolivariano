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
class __TwigTemplate_68ae827b6c77655e06b99e112433ef83cb564e11e1c3d108c849ba7f8c3a18ce extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["for" => 3, "set" => 4, "if" => 5];
        $filters = ["capitalize" => 12, "trim" => 14, "number_format" => 19];
        $functions = ["cycle" => 4, "active_theme_path" => 10];

        try {
            $this->sandbox->checkSecurity(
                ['for', 'set', 'if'],
                ['capitalize', 'trim', 'number_format'],
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
    ";
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
                echo "        \t<article class=\"col-6 col-md-3 cards__item cards__item--yellow\">
    \t";
            } else {
                // line 8
                echo "        \t<article class=\"col-6 col-md-3 cards__item cards__item--blue\">
    \t";
            }
            // line 10
            echo "\t\t        <img class=\"cards__image\" src=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null)), "html", null, true);
            echo "/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getActiveThemePath(), "html", null, true);
            echo "/images/bg/cocora.jpg\" alt=\"\">
\t            <div class=\"cards__wrapper\">
\t                <h3 class=\"cards__title\">";
            // line 12
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_capitalize_string_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["items"], "agencyDestinationName", []))), "html", null, true);
            echo "</h3>
\t                <div class=\"cards__description\">
\t                    <img src=\"";
            // line 14
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null)), "html", null, true);
            echo "/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getActiveThemePath(), "html", null, true);
            echo "/images/label/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_trim_filter($this->sandbox->ensureToStringAllowed($this->getAttribute($context["items"], "busServiceName", []))), "html", null, true);
            echo ".png\" alt=\"\" class=\"cards__type\">
\t                    <img src=\"";
            // line 15
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null)), "html", null, true);
            echo "/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getActiveThemePath(), "html", null, true);
            echo "/images/bus/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_trim_filter($this->sandbox->ensureToStringAllowed($this->getAttribute($context["items"], "busServiceName", []))), "html", null, true);
            echo "-vehicle.png\" alt=\"\" class=\"cards__bus\">
\t                    <h4 class=\"cards__cities\">";
            // line 16
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_capitalize_string_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["items"], "agencyOriginName", []))), "html", null, true);
            echo " - ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_capitalize_string_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["items"], "agencyDestinationName", []))), "html", null, true);
            echo "</h4>
\t                    <p class=\"cards__prizes\">
\t                        <span class=\"cards__infoprice\">Desde:</span>
\t                        <span class=\"cards__value\">\$";
            // line 19
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_number_format_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["items"], "tripRate", [])), 0, "", "."), "html", null, true);
            echo "</span>
\t                    </p>
\t                </div>
\t            </div>
\t        </article>\t\t
\t";
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
        echo "
    </div>
    <div class=\"row no-gutters mt-4\">
        <div class=\"col-12 text-center\">
            <a href=\"#\" class=\"cards__anchor\">Más rutas <i class=\"cards__anchor-ico fa fa-angle-down \" aria-hidden=\"true\"></i></a>
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
        return array (  147 => 25,  127 => 19,  119 => 16,  111 => 15,  103 => 14,  98 => 12,  90 => 10,  86 => 8,  82 => 6,  79 => 5,  76 => 4,  59 => 3,  55 => 1,);
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
    {% for items in promotionsData %}
    \t{% set oddOrEven = cycle(['odd', 'even'], loop.index0) %}
    \t{% if oddOrEven == 'odd' %}
        \t<article class=\"col-6 col-md-3 cards__item cards__item--yellow\">
    \t{% else %}
        \t<article class=\"col-6 col-md-3 cards__item cards__item--blue\">
    \t{% endif %}
\t\t        <img class=\"cards__image\" src=\"{{ base_path }}/{{ active_theme_path() }}/images/bg/cocora.jpg\" alt=\"\">
\t            <div class=\"cards__wrapper\">
\t                <h3 class=\"cards__title\">{{ (items.agencyDestinationName)|capitalize }}</h3>
\t                <div class=\"cards__description\">
\t                    <img src=\"{{ base_path }}/{{ active_theme_path() }}/images/label/{{ (items.busServiceName)|trim }}.png\" alt=\"\" class=\"cards__type\">
\t                    <img src=\"{{ base_path }}/{{ active_theme_path() }}/images/bus/{{ (items.busServiceName)|trim }}-vehicle.png\" alt=\"\" class=\"cards__bus\">
\t                    <h4 class=\"cards__cities\">{{ (items.agencyOriginName)|capitalize }} - {{ (items.agencyDestinationName)|capitalize }}</h4>
\t                    <p class=\"cards__prizes\">
\t                        <span class=\"cards__infoprice\">Desde:</span>
\t                        <span class=\"cards__value\">\${{ (items.tripRate)|number_format(0, '', '.') }}</span>
\t                    </p>
\t                </div>
\t            </div>
\t        </article>\t\t
\t{% endfor %}

    </div>
    <div class=\"row no-gutters mt-4\">
        <div class=\"col-12 text-center\">
            <a href=\"#\" class=\"cards__anchor\">Más rutas <i class=\"cards__anchor-ico fa fa-angle-down \" aria-hidden=\"true\"></i></a>
        </div>
    </div>
</section>", "modules/custom/expreso_bolivariano_blocks/templates/block--promotions-home-grid.html.twig", "/var/www/web/modules/custom/expreso_bolivariano_blocks/templates/block--promotions-home-grid.html.twig");
    }
}
