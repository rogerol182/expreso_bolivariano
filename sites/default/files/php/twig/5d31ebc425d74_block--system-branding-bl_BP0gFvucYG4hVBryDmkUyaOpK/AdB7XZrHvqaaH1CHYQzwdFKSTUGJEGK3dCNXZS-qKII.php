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

/* themes/bootstrap_barrio/templates/block/block--system-branding-block.html.twig */
class __TwigTemplate_25e55ea2051b6926b0385fc62790e53e690d123308f82ece2e8ef9f8260e4ff9 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 16, "if" => 17];
        $filters = ["t" => 18, "escape" => 20];
        $functions = ["path" => 18];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['t', 'escape'],
                ['path']
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
        // line 15
        echo "<nav class=\"navbar navbar-expand-lg header__wrapper\">
";
        // line 16
        $context["attributes"] = $this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => "site-branding"], "method");
        // line 17
        echo "  ";
        if ((($context["site_logo"] ?? null) || ($context["site_name"] ?? null))) {
            // line 18
            echo "    <a href=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\Core\Template\TwigExtension')->getPath("<front>"));
            echo "\" title=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Home"));
            echo "\" rel=\"home\" class=\"navbar-brand\">
      ";
            // line 19
            if (($context["site_logo"] ?? null)) {
                // line 20
                echo "        <!--<img src=\"";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_logo"] ?? null)), "html", null, true);
                echo "\" alt=\"";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Home"));
                echo "\" class=\"img-fluid d-inline-block align-top\" />-->
        <img src=\"";
                // line 21
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_logo"] ?? null)), "html", null, true);
                echo "\" alt=\"";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Home"));
                echo "\" class=\"header__brand\" />
      ";
            }
            // line 23
            echo "      ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null)), "html", null, true);
            echo "
    </a>
  ";
        }
        // line 26
        echo "  ";
        if (($context["site_slogan"] ?? null)) {
            // line 27
            echo "    <div class=\"d-inline-block align-top site-name-slogan\">
      ";
            // line 28
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_slogan"] ?? null)), "html", null, true);
            echo "
    </div>
  ";
        }
        // line 31
        echo "  ";
    }

    public function getTemplateName()
    {
        return "themes/bootstrap_barrio/templates/block/block--system-branding-block.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 31,  99 => 28,  96 => 27,  93 => 26,  86 => 23,  79 => 21,  72 => 20,  70 => 19,  63 => 18,  60 => 17,  58 => 16,  55 => 15,);
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
 * Bootstrap Barrio's theme implementation for a branding block.
 *
 * Each branding element variable (logo, name, slogan) is only available if
 * enabled in the block configuration.
 *
 * Available variables:
 * - site_logo: Logo for site as defined in Appearance or theme settings.
 * - site_name: Name for site as defined in Site information settings.
 * - site_slogan: Slogan for site as defined in Site information settings.
 */
#}
<nav class=\"navbar navbar-expand-lg header__wrapper\">
{% set attributes = attributes.addClass('site-branding') %}
  {% if site_logo or site_name %}
    <a href=\"{{ path('<front>') }}\" title=\"{{ 'Home'|t }}\" rel=\"home\" class=\"navbar-brand\">
      {% if site_logo %}
        <!--<img src=\"{{ site_logo }}\" alt=\"{{ 'Home'|t }}\" class=\"img-fluid d-inline-block align-top\" />-->
        <img src=\"{{ site_logo }}\" alt=\"{{ 'Home'|t }}\" class=\"header__brand\" />
      {% endif %}
      {{ site_name }}
    </a>
  {% endif %}
  {% if site_slogan %}
    <div class=\"d-inline-block align-top site-name-slogan\">
      {{ site_slogan }}
    </div>
  {% endif %}
  ", "themes/bootstrap_barrio/templates/block/block--system-branding-block.html.twig", "/var/www/web/themes/bootstrap_barrio/templates/block/block--system-branding-block.html.twig");
    }
}
