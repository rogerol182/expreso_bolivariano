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

/* themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--express-traveler-info-list.html.twig */
class __TwigTemplate_17f026718f7a2c1848e03d8d45c67e9cffc8a8fdf1a2d785f018c9d1aeb628d9 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 6, "for" => 7];
        $filters = ["escape" => 3, "raw" => 19];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'for'],
                ['escape', 'raw'],
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
        echo "<div class=\"wrapper__body pb-4\">
    <h3 class=\"wrapper__lead\">Viajero Expreso</h3>
    ";
        // line 3
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["blockExpressTravelerP"] ?? null)), "html", null, true);
        echo "
    ";
        // line 4
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["blockExpressTraveler"] ?? null)), "html", null, true);
        echo "
    <div class=\"accordion mb-4\" id=\"accordionpf\">
        ";
        // line 6
        $context["j"] = 0;
        // line 7
        echo "        ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 8
            echo "        ";
            $context["j"] = (($context["j"] ?? null) + 1);
            // line 9
            echo "        <div class=\"card panel-shadow\">
            <div class=\"card-header\" id=\"heading";
            // line 10
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["j"] ?? null)), "html", null, true);
            echo "\">
            <h5 class=\"mb-0\">
                <b>";
            // line 12
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_express_traveler_title", []), "value", [])), "html", null, true);
            echo "</b>
                <button class=\"btn btn-link collapsed\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapse";
            // line 13
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["j"] ?? null)), "html", null, true);
            echo "\" aria-expanded=\"false\" aria-controls=\"collapse";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["j"] ?? null)), "html", null, true);
            echo "\">
                </button>
            </h5>
            </div>
            <div id=\"collapse";
            // line 17
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["j"] ?? null)), "html", null, true);
            echo "\" class=\"collapse\" aria-labelledby=\"heading";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["j"] ?? null)), "html", null, true);
            echo "\" data-parent=\"#accordionpf\" style=\"\">
            <div class=\"card-body text-blue\">
                ";
            // line 19
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_express_traveler_text", []), "value", [])));
            echo "
            </div>
            </div>
        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--express-traveler-info-list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 24,  106 => 19,  99 => 17,  90 => 13,  86 => 12,  81 => 10,  78 => 9,  75 => 8,  70 => 7,  68 => 6,  63 => 4,  59 => 3,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"wrapper__body pb-4\">
    <h3 class=\"wrapper__lead\">Viajero Expreso</h3>
    {{ blockExpressTravelerP }}
    {{ blockExpressTraveler }}
    <div class=\"accordion mb-4\" id=\"accordionpf\">
        {% set j = 0 %}
        {% for row in rows %}
        {% set j = j+1 %}
        <div class=\"card panel-shadow\">
            <div class=\"card-header\" id=\"heading{{ j }}\">
            <h5 class=\"mb-0\">
                <b>{{ row['content']['#row']._entity.field_express_traveler_title.value }}</b>
                <button class=\"btn btn-link collapsed\" type=\"button\" data-toggle=\"collapse\" data-target=\"#collapse{{ j }}\" aria-expanded=\"false\" aria-controls=\"collapse{{ j }}\">
                </button>
            </h5>
            </div>
            <div id=\"collapse{{ j }}\" class=\"collapse\" aria-labelledby=\"heading{{ j }}\" data-parent=\"#accordionpf\" style=\"\">
            <div class=\"card-body text-blue\">
                {{ row['content']['#row']._entity.field_express_traveler_text.value|raw }}
            </div>
            </div>
        </div>
        {% endfor %}
    </div>
</div>", "themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--express-traveler-info-list.html.twig", "/var/www/web/themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--express-traveler-info-list.html.twig");
    }
}
