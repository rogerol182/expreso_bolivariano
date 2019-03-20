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

/* themes/bootstrap_barrio/templates/navigation/menu--main.html.twig */
class __TwigTemplate_bd7deec1a110be10114b0d0b63838e5fc588d9cc9388e47477a4d2852a2e27d2 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["import" => 21, "macro" => 34, "if" => 36, "for" => 44, "set" => 46];
        $filters = [];
        $functions = ["link" => 63];

        try {
            $this->sandbox->checkSecurity(
                ['import', 'macro', 'if', 'for', 'set'],
                [],
                ['link']
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
        // line 21
        $context["menus"] = $this;
        // line 22
        echo "
";
        // line 27
        echo "<button class=\"navbar-toggler header__btntoggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarNavDropdown\">
  <span class=\"navbar-toggler-icon header__toggler\"></span>
  <span class=\"navbar-toggler-icon header__toggler\"></span>
  <span class=\"navbar-toggler-icon header__toggler\"></span>
</button>
";
        // line 32
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($context["menus"]->getmenu_links(($context["items"] ?? null), ($context["attributes"] ?? null), 0));
        echo "

";
    }

    // line 34
    public function getmenu_links($__items__ = null, $__attributes__ = null, $__menu_level__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals([
            "items" => $__items__,
            "attributes" => $__attributes__,
            "menu_level" => $__menu_level__,
            "varargs" => $__varargs__,
        ]);

        $blocks = [];

        ob_start();
        try {
            // line 35
            echo "  ";
            $context["menus"] = $this;
            // line 36
            echo "  ";
            if (($context["items"] ?? null)) {
                // line 37
                echo "    ";
                if ((($context["menu_level"] ?? null) == 0)) {
                    // line 38
                    echo "      <!--<ul";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["attributes"] ?? null), "addClass", [0 => "nav navbar-nav"], "method")), "html", null, true);
                    echo ">-->
      <div class=\"collapse navbar-collapse header__items\" id=\"navbarNavDropdown\">
      <ul class=\"navbar-nav\">
    ";
                } else {
                    // line 42
                    echo "      <ul class=\"dropdown-menu\">
    ";
                }
                // line 44
                echo "    ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                    // line 45
                    echo "      ";
                    // line 46
                    $context["classes"] = [0 => ((                    // line 47
($context["menu_level"] ?? null)) ? ("dropdown-item") : ("header__item hvr-grow")), 1 => (($this->getAttribute(                    // line 48
$context["item"], "is_expanded", [])) ? ("menu-item--expanded") : ("")), 2 => (($this->getAttribute(                    // line 49
$context["item"], "is_collapsed", [])) ? ("menu-item--collapsed") : (""))];
                    // line 52
                    echo "
      <li ";
                    // line 53
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($context["item"], "attributes", []), "addClass", [0 => ($context["classes"] ?? null)], "method")), "html", null, true);
                    echo ">
      
        ";
                    // line 56
                    $context["link_classes"] = [0 => (( !                    // line 57
($context["menu_level"] ?? null)) ? ("nav-link header__link") : ("")), 1 => (($this->getAttribute(                    // line 58
$context["item"], "below", [])) ? ("dropdown-toggle") : ("")), 2 => (($this->getAttribute($this->getAttribute($this->getAttribute(                    // line 59
$context["item"], "url", []), "getOption", [0 => "attributes"], "method"), "class", [])) ? ($this->getAttribute($this->getAttribute($this->getAttribute($context["item"], "url", []), "getOption", [0 => "attributes"], "method"), "class", [])) : (""))];
                    // line 62
                    echo "        ";
                    if ($this->getAttribute($context["item"], "below", [])) {
                        // line 63
                        echo "          ";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getLink($this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "title", [])), $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "url", [])), ["class" => ($context["link_classes"] ?? null), "data-toggle" => "dropdown", "aria-expanded" => "false", "aria-haspopup" => "true"]), "html", null, true);
                        echo "
          ";
                        // line 64
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($context["menus"]->getmenu_links($this->getAttribute($context["item"], "below", []), ($context["attributes"] ?? null), (($context["menu_level"] ?? null) + 1)));
                        echo "
        ";
                    } else {
                        // line 66
                        echo "          ";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getLink($this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "title", [])), $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "url", [])), ["class" => ($context["link_classes"] ?? null)]), "html", null, true);
                        echo "
        ";
                    }
                    // line 68
                    echo "        
         <span class=\"sr-only\">(current)</span>
        
      </li>
    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 73
                echo "    </ul>
  
  ";
            }
        } catch (\Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (\Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "themes/bootstrap_barrio/templates/navigation/menu--main.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  163 => 73,  153 => 68,  147 => 66,  142 => 64,  137 => 63,  134 => 62,  132 => 59,  131 => 58,  130 => 57,  129 => 56,  124 => 53,  121 => 52,  119 => 49,  118 => 48,  117 => 47,  116 => 46,  114 => 45,  109 => 44,  105 => 42,  97 => 38,  94 => 37,  91 => 36,  88 => 35,  74 => 34,  67 => 32,  60 => 27,  57 => 22,  55 => 21,);
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
 * Bootstrap Barrio's override to display a menu.
 *
 * Available variables:
 * - menu_name: The machine name of the menu.
 * - items: A nested list of menu items. Each menu item contains:
 *   - attributes: HTML attributes for the menu item.
 *   - below: The menu item child items.
 *   - title: The menu link title.
 *   - url: The menu link url, instance of \\Drupal\\Core\\Url
 *   - localized_options: Menu link localized options.
 *   - is_expanded: TRUE if the link has visible children within the current
 *     menu tree.
 *   - is_collapsed: TRUE if the link has children within the current menu tree
 *     that are not currently visible.
 *   - in_active_trail: TRUE if the link is in the active trail.
 */
#}
{% import _self as menus %}

{#
  We call a macro which calls itself to render the full tree.
  @see http://twig.sensiolabs.org/doc/tags/macro.html
#}
<button class=\"navbar-toggler header__btntoggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarNavDropdown\">
  <span class=\"navbar-toggler-icon header__toggler\"></span>
  <span class=\"navbar-toggler-icon header__toggler\"></span>
  <span class=\"navbar-toggler-icon header__toggler\"></span>
</button>
{{ menus.menu_links(items, attributes, 0) }}

{% macro menu_links(items, attributes, menu_level) %}
  {% import _self as menus %}
  {% if items %}
    {% if menu_level == 0 %}
      <!--<ul{{ attributes.addClass('nav navbar-nav') }}>-->
      <div class=\"collapse navbar-collapse header__items\" id=\"navbarNavDropdown\">
      <ul class=\"navbar-nav\">
    {% else %}
      <ul class=\"dropdown-menu\">
    {% endif %}
    {% for item in items %}
      {%
        set classes = [
          menu_level ? 'dropdown-item' : 'header__item hvr-grow',
          item.is_expanded ? 'menu-item--expanded',
          item.is_collapsed ? 'menu-item--collapsed',
        ]
      %}

      <li {{ item.attributes.addClass(classes) }}>
      
        {%
          set link_classes = [
            not menu_level ? 'nav-link header__link',
            item.below ? 'dropdown-toggle',
            item.url.getOption('attributes').class ? item.url.getOption('attributes').class,
          ]
        %}
        {% if item.below %}
          {{ link(item.title, item.url, {'class': link_classes, 'data-toggle': 'dropdown', 'aria-expanded': 'false', 'aria-haspopup': 'true' }) }}
          {{ menus.menu_links(item.below, attributes, menu_level + 1) }}
        {% else %}
          {{ link(item.title, item.url, {'class': link_classes}) }}
        {% endif %}
        
         <span class=\"sr-only\">(current)</span>
        
      </li>
    {% endfor %}
    </ul>
  
  {% endif %}
{% endmacro %}
", "themes/bootstrap_barrio/templates/navigation/menu--main.html.twig", "/var/www/web/themes/bootstrap_barrio/templates/navigation/menu--main.html.twig");
    }
}
