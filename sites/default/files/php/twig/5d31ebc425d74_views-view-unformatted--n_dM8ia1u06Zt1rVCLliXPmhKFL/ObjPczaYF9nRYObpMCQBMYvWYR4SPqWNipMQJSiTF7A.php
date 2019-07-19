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

/* themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--newsletter.html.twig */
class __TwigTemplate_d8365733002ca770f367d3ca109b34b2e5f63be69de77949bdda4afacf5a71a6 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["for" => 20, "set" => 21];
        $filters = ["escape" => 23];
        $functions = ["file_url" => 21, "active_theme_path" => 28];

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
        echo "<div class=\"container\">
    <div class=\"row\">
    \t";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 21
            echo "\t\t";
            $context["photo"] = call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_newsletter_image", []), "entity", []), "fileuri", []))]);
            // line 22
            echo "        <div class=\"col-12 col-md-4 col-lg-6 formsubs__flex formsubs__flex--bottom\">
            <img width=\"100%\" src=\"";
            // line 23
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["photo"] ?? null)), "html", null, true);
            echo "\" class=\"formsubs__people\" alt=\"\">
        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 26
        echo "        <div class=\"col-12 col-md-8 col-lg-6 pb-4\">
            <h2 class=\"formsubs__title\">Suscribete para <br> promociones especiales 
                <img src=\"";
        // line 28
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null)), "html", null, true);
        echo "/";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getActiveThemePath(), "html", null, true);
        echo "/images/misc/discount.png\" class=\"formsubs__discount\" alt=\"\">
            </h2>
            <hr class=\"formsubs__separator\">
            <!-- Begins Newsletter Block -->
                ";
        // line 32
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["blockNewsletter"] ?? null)), "html", null, true);
        echo "
            <!-- End Newsletter Block -->
        </div>
    </div>
</div>
<div class=\"division\"></div>";
    }

    public function getTemplateName()
    {
        return "themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--newsletter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  91 => 32,  82 => 28,  78 => 26,  69 => 23,  66 => 22,  63 => 21,  59 => 20,  55 => 18,);
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
<div class=\"container\">
    <div class=\"row\">
    \t{% for row in rows %}
\t\t{% set photo = file_url(row['content']['#row']._entity.field_newsletter_image.entity.fileuri) %}
        <div class=\"col-12 col-md-4 col-lg-6 formsubs__flex formsubs__flex--bottom\">
            <img width=\"100%\" src=\"{{ photo }}\" class=\"formsubs__people\" alt=\"\">
        </div>
        {% endfor %}
        <div class=\"col-12 col-md-8 col-lg-6 pb-4\">
            <h2 class=\"formsubs__title\">Suscribete para <br> promociones especiales 
                <img src=\"{{ base_path }}/{{ active_theme_path() }}/images/misc/discount.png\" class=\"formsubs__discount\" alt=\"\">
            </h2>
            <hr class=\"formsubs__separator\">
            <!-- Begins Newsletter Block -->
                {{ blockNewsletter }}
            <!-- End Newsletter Block -->
        </div>
    </div>
</div>
<div class=\"division\"></div>", "themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--newsletter.html.twig", "/var/www/web/themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--newsletter.html.twig");
    }
}
