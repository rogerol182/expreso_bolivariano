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

/* themes/bootstrap_barrio/subtheme/templates/pager.html.twig */
class __TwigTemplate_69eaf22ed3e95a7de800921d6ca1ef8f87f7c084a17797fff4a9586f98be8e96 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 36, "for" => 63];
        $filters = ["t" => 38, "escape" => 43, "without" => 43, "default" => 45];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for'],
                ['t', 'escape', 'without', 'default'],
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
        // line 32
        echo "<div  class=\"col col-lg-12 mx-auto mt-4\">
<div class=\"row no-gutters text-center\">
<div  class=\"col-12 col-md-5\"></div>
<div  class=\"col-12 col-md-3\">
";
        // line 36
        if (($context["items"] ?? null)) {
            // line 37
            echo "  <nav aria-label=\"Page navigation\">
    <h4 id=\"pagination-heading\" class=\"visually-hidden\">";
            // line 38
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Pagination"));
            echo "</h4>
    <ul class=\"pagination js-pager__items\">
      ";
            // line 41
            echo "      ";
            if ($this->getAttribute(($context["items"] ?? null), "first", [])) {
                // line 42
                echo "        <li class=\"page-item\">
          <a href=\"";
                // line 43
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["items"] ?? null), "first", []), "href", [])), "html", null, true);
                echo "\" title=\"";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Go to first page"));
                echo "\"";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->withoutFilter($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["items"] ?? null), "first", []), "attributes", [])), "href", "title"), "html", null, true);
                echo " class=\"page-link\">
            <span aria-hidden=\"true\">«</span>
            <span class=\"sr-only\">";
                // line 45
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (($this->getAttribute($this->getAttribute(($context["items"] ?? null), "first", [], "any", false, true), "text", [], "any", true, true)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["items"] ?? null), "first", [], "any", false, true), "text", [])), t("First"))) : (t("First"))), "html", null, true);
                echo "</span>
          </a>
        </li>
      ";
            }
            // line 49
            echo "      ";
            // line 50
            echo "      ";
            if ($this->getAttribute(($context["items"] ?? null), "previous", [])) {
                // line 51
                echo "        <li class=\"page-item\">
          <a href=\"";
                // line 52
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["items"] ?? null), "previous", []), "href", [])), "html", null, true);
                echo "\" title=\"";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Go to previous page"));
                echo "\" rel=\"prev\"";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->withoutFilter($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["items"] ?? null), "previous", []), "attributes", [])), "href", "title", "rel"), "html", null, true);
                echo " class=\"page-link\">
            <span aria-hidden=\"true\">‹</span>
            <span class=\"sr-only\">";
                // line 54
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (($this->getAttribute($this->getAttribute(($context["items"] ?? null), "previous", [], "any", false, true), "text", [], "any", true, true)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["items"] ?? null), "previous", [], "any", false, true), "text", [])), t("Previous"))) : (t("Previous"))), "html", null, true);
                echo "</span>
          </a>
        </li>
      ";
            }
            // line 58
            echo "      ";
            // line 59
            echo "      ";
            if ($this->getAttribute(($context["ellipses"] ?? null), "previous", [])) {
                // line 60
                echo "        <li class=\"page-item\" role=\"presentation\">&hellip;</li>
      ";
            }
            // line 62
            echo "      ";
            // line 63
            echo "      ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["items"] ?? null), "pages", []));
            foreach ($context['_seq'] as $context["key"] => $context["item"]) {
                // line 64
                echo "        <li class=\"page-item ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar((((($context["current"] ?? null) == $context["key"])) ? ("active") : ("")));
                echo "\">
          ";
                // line 65
                if ((($context["current"] ?? null) == $context["key"])) {
                    // line 66
                    echo "            <span class=\"page-link\">";
                    // line 67
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["key"]), "html", null, true);
                    // line 68
                    echo "</span>
          ";
                } else {
                    // line 70
                    echo "            <a href=\"";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "href", [])), "html", null, true);
                    echo "\" title=\"";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null)), "html", null, true);
                    echo "\"";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->withoutFilter($this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "attributes", [])), "href", "title"), "html", null, true);
                    echo " class=\"page-link\">";
                    // line 71
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["key"]), "html", null, true);
                    // line 72
                    echo "</a>
          ";
                }
                // line 74
                echo "        </li>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 76
            echo "      ";
            // line 77
            echo "      ";
            if ($this->getAttribute(($context["ellipses"] ?? null), "next", [])) {
                // line 78
                echo "        <li class=\"page-item\" role=\"presentation\">&hellip;</li>
      ";
            }
            // line 80
            echo "      ";
            // line 81
            echo "      ";
            if ($this->getAttribute(($context["items"] ?? null), "next", [])) {
                // line 82
                echo "        <li class=\"pager__item--next\">
          <a href=\"";
                // line 83
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["items"] ?? null), "next", []), "href", [])), "html", null, true);
                echo "\" title=\"";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Go to next page"));
                echo "\" rel=\"next\"";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->withoutFilter($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["items"] ?? null), "next", []), "attributes", [])), "href", "title", "rel"), "html", null, true);
                echo " class=\"page-link\">
            <span aria-hidden=\"true\">›</span>
            <span class=\"sr-only\">";
                // line 85
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (($this->getAttribute($this->getAttribute(($context["items"] ?? null), "next", [], "any", false, true), "text", [], "any", true, true)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["items"] ?? null), "next", [], "any", false, true), "text", [])), t("Next"))) : (t("Next"))), "html", null, true);
                echo "</span>
          </a>
        </li>
      ";
            }
            // line 89
            echo "      ";
            // line 90
            echo "      ";
            if ($this->getAttribute(($context["items"] ?? null), "last", [])) {
                // line 91
                echo "        <li class=\"page-item\">
          <a href=\"";
                // line 92
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["items"] ?? null), "last", []), "href", [])), "html", null, true);
                echo "\" title=\"";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Go to last page"));
                echo "\"";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->withoutFilter($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["items"] ?? null), "last", []), "attributes", [])), "href", "title"), "html", null, true);
                echo " class=\"page-link\">
            <span aria-hidden=\"true\">»</span>
            <span class=\"sr-only\">";
                // line 94
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (($this->getAttribute($this->getAttribute(($context["items"] ?? null), "last", [], "any", false, true), "text", [], "any", true, true)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["items"] ?? null), "last", [], "any", false, true), "text", [])), t("Last"))) : (t("Last"))), "html", null, true);
                echo "</span>
          </a>
        </li>
      ";
            }
            // line 98
            echo "    </ul>
  </nav>
";
        }
        // line 101
        echo "</div>
<div  class=\"col-12 col-md-4\"></div>
</div>

</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/bootstrap_barrio/subtheme/templates/pager.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  231 => 101,  226 => 98,  219 => 94,  210 => 92,  207 => 91,  204 => 90,  202 => 89,  195 => 85,  186 => 83,  183 => 82,  180 => 81,  178 => 80,  174 => 78,  171 => 77,  169 => 76,  162 => 74,  158 => 72,  156 => 71,  148 => 70,  144 => 68,  142 => 67,  140 => 66,  138 => 65,  133 => 64,  128 => 63,  126 => 62,  122 => 60,  119 => 59,  117 => 58,  110 => 54,  101 => 52,  98 => 51,  95 => 50,  93 => 49,  86 => 45,  77 => 43,  74 => 42,  71 => 41,  66 => 38,  63 => 37,  61 => 36,  55 => 32,);
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
 * Theme override to display a pager.
 *
 * Available variables:
 * - items: List of pager items.
 *   The list is keyed by the following elements:
 *   - first: Item for the first page; not present on the first page of results.
 *   - previous: Item for the previous page; not present on the first page
 *     of results.
 *   - next: Item for the next page; not present on the last page of results.
 *   - last: Item for the last page; not present on the last page of results.
 *   - pages: List of pages, keyed by page number.
 *   Sub-sub elements:
 *   items.first, items.previous, items.next, items.last, and each item inside
 *   items.pages contain the following elements:
 *   - href: URL with appropriate query parameters for the item.
 *   - attributes: A keyed list of HTML attributes for the item.
 *   - text: The visible text used for the item link, such as \"‹ Previous\"
 *     or \"Next ›\".
 * - current: The page number of the current page.
 * - ellipses: If there are more pages than the quantity allows, then an
 *   ellipsis before or after the listed pages may be present.
 *   - previous: Present if the currently visible list of pages does not start
 *     at the first page.
 *   - next: Present if the visible list of pages ends before the last page.
 *
 * @see template_preprocess_pager()
 */
#}
<div  class=\"col col-lg-12 mx-auto mt-4\">
<div class=\"row no-gutters text-center\">
<div  class=\"col-12 col-md-5\"></div>
<div  class=\"col-12 col-md-3\">
{% if items %}
  <nav aria-label=\"Page navigation\">
    <h4 id=\"pagination-heading\" class=\"visually-hidden\">{{ 'Pagination'|t }}</h4>
    <ul class=\"pagination js-pager__items\">
      {# Print first item if we are not on the first page. #}
      {% if items.first %}
        <li class=\"page-item\">
          <a href=\"{{ items.first.href }}\" title=\"{{ 'Go to first page'|t }}\"{{ items.first.attributes|without('href', 'title') }} class=\"page-link\">
            <span aria-hidden=\"true\">«</span>
            <span class=\"sr-only\">{{ items.first.text|default('First'|t) }}</span>
          </a>
        </li>
      {% endif %}
      {# Print previous item if we are not on the first page. #}
      {% if items.previous %}
        <li class=\"page-item\">
          <a href=\"{{ items.previous.href }}\" title=\"{{ 'Go to previous page'|t }}\" rel=\"prev\"{{ items.previous.attributes|without('href', 'title', 'rel') }} class=\"page-link\">
            <span aria-hidden=\"true\">‹</span>
            <span class=\"sr-only\">{{ items.previous.text|default('Previous'|t) }}</span>
          </a>
        </li>
      {% endif %}
      {# Add an ellipsis if there are further previous pages. #}
      {% if ellipses.previous %}
        <li class=\"page-item\" role=\"presentation\">&hellip;</li>
      {% endif %}
      {# Now generate the actual pager piece. #}
      {% for key, item in items.pages %}
        <li class=\"page-item {{ current == key ? 'active' : '' }}\">
          {% if current == key %}
            <span class=\"page-link\">
              {{- key -}}
            </span>
          {% else %}
            <a href=\"{{ item.href }}\" title=\"{{ title }}\"{{ item.attributes|without('href', 'title') }} class=\"page-link\">
              {{- key -}}
            </a>
          {% endif %}
        </li>
      {% endfor %}
      {# Add an ellipsis if there are further next pages. #}
      {% if ellipses.next %}
        <li class=\"page-item\" role=\"presentation\">&hellip;</li>
      {% endif %}
      {# Print next item if we are not on the last page. #}
      {% if items.next %}
        <li class=\"pager__item--next\">
          <a href=\"{{ items.next.href }}\" title=\"{{ 'Go to next page'|t }}\" rel=\"next\"{{ items.next.attributes|without('href', 'title', 'rel') }} class=\"page-link\">
            <span aria-hidden=\"true\">›</span>
            <span class=\"sr-only\">{{ items.next.text|default('Next'|t) }}</span>
          </a>
        </li>
      {% endif %}
      {# Print last item if we are not on the last page. #}
      {% if items.last %}
        <li class=\"page-item\">
          <a href=\"{{ items.last.href }}\" title=\"{{ 'Go to last page'|t }}\"{{ items.last.attributes|without('href', 'title') }} class=\"page-link\">
            <span aria-hidden=\"true\">»</span>
            <span class=\"sr-only\">{{ items.last.text|default('Last'|t) }}</span>
          </a>
        </li>
      {% endif %}
    </ul>
  </nav>
{% endif %}
</div>
<div  class=\"col-12 col-md-4\"></div>
</div>

</div>
</div>
", "themes/bootstrap_barrio/subtheme/templates/pager.html.twig", "/var/www/web/themes/bootstrap_barrio/subtheme/templates/pager.html.twig");
    }
}
