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

/* themes/bootstrap_barrio/templates/navigation/menu--account.html.twig */
class __TwigTemplate_d10c19e8c4f7c8dcdd838657b1279ecdec116dcce84ce694055d0e84e23a3638 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["import" => 21, "if" => 28, "macro" => 31];
        $filters = [];
        $functions = ["active_theme_path" => 42];

        try {
            $this->sandbox->checkSecurity(
                ['import', 'if', 'macro'],
                [],
                ['active_theme_path']
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
        echo "<div class=\"header__login\">
";
        // line 28
        if ((($context["logged_in"] ?? null) == 1)) {
            // line 29
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($context["menus"]->getmenu_links(($context["items"] ?? null), ($context["attributes"] ?? null), 0));
            echo "

";
            // line 72
            echo "
";
        } else {
            // line 74
            echo "<div class=\"notlogged\">
    <a href=\"/user/login\"><button>Iniciar sesión</button></a>
    <a href=\"/user/register\"><button>Registrarse</button></a> 
</div>
";
        }
        // line 79
        echo "</div>
</nav>";
    }

    // line 31
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
            // line 32
            echo "  ";
            $context["menus"] = $this;
            // line 33
            echo "  ";
            if (($context["items"] ?? null)) {
                // line 34
                echo "    ";
                if ((($context["menu_level"] ?? null) == 0)) {
                    // line 35
                    echo "
    <div class=\"logged_wrapper\">
        <div class=\"logged\">
            <p class=\"header__user\">Diego Rodriguez</p>
            <div class=\"mobile-only\">
                <a href=\"\">
                    <div class=\"header__close-session\">
                        <img src=\"";
                    // line 42
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null)), "html", null, true);
                    echo "/";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getActiveThemePath(), "html", null, true);
                    echo "/images/misc/close.png\" alt=\"cerrar\">
                        <hr>
                        <p>Cerrar sesión</p>
                    </div>
                </a>
            </div>
        </div>
        <div class=\"header__actions\">
            <a class=\"header__loginactions\" href=\"/pages/viajero-expreso\">
                <span class=\"header__linkuser\">Puntos</span> 
                <span class=\"header__icon header__icon--points\"></span>
                <span class=\"header__linkuser ml-2\">1700</span> 
            </a>
            <a class=\"header__loginactions\" href=\"/pages/reservas\"><span class=\"header__linkuser\">Reservas</span> <span class=\"header__icon header__icon--booking\">2</span></a>
        </div>
    </div>
    <div class=\"logged\">
        <div class=\"desktop-only\">
            <a href=\"/user/logout\">
                <div class=\"header__close-session\">
                    <img src=\"";
                    // line 62
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null)), "html", null, true);
                    echo "/";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getActiveThemePath(), "html", null, true);
                    echo "/images/misc/close.png\" alt=\"cerrar\">
                    <hr>
                    <p>Cerrar sesión</p>
                </div>
            </a>
        </div>    
    </div> 
      ";
                }
                // line 70
                echo "  ";
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
        return "themes/bootstrap_barrio/templates/navigation/menu--account.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  156 => 70,  143 => 62,  118 => 42,  109 => 35,  106 => 34,  103 => 33,  100 => 32,  86 => 31,  81 => 79,  74 => 74,  70 => 72,  65 => 29,  63 => 28,  60 => 27,  57 => 22,  55 => 21,);
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
 * Bootstrap Barrio's override to display Menu Account.
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
<div class=\"header__login\">
{% if logged_in == 1 %}
{{ menus.menu_links(items, attributes, 0) }}

{% macro menu_links(items, attributes, menu_level) %}
  {% import _self as menus %}
  {% if items %}
    {% if menu_level == 0 %}

    <div class=\"logged_wrapper\">
        <div class=\"logged\">
            <p class=\"header__user\">Diego Rodriguez</p>
            <div class=\"mobile-only\">
                <a href=\"\">
                    <div class=\"header__close-session\">
                        <img src=\"{{ base_path }}/{{ active_theme_path() }}/images/misc/close.png\" alt=\"cerrar\">
                        <hr>
                        <p>Cerrar sesión</p>
                    </div>
                </a>
            </div>
        </div>
        <div class=\"header__actions\">
            <a class=\"header__loginactions\" href=\"/pages/viajero-expreso\">
                <span class=\"header__linkuser\">Puntos</span> 
                <span class=\"header__icon header__icon--points\"></span>
                <span class=\"header__linkuser ml-2\">1700</span> 
            </a>
            <a class=\"header__loginactions\" href=\"/pages/reservas\"><span class=\"header__linkuser\">Reservas</span> <span class=\"header__icon header__icon--booking\">2</span></a>
        </div>
    </div>
    <div class=\"logged\">
        <div class=\"desktop-only\">
            <a href=\"/user/logout\">
                <div class=\"header__close-session\">
                    <img src=\"{{ base_path }}/{{ active_theme_path() }}/images/misc/close.png\" alt=\"cerrar\">
                    <hr>
                    <p>Cerrar sesión</p>
                </div>
            </a>
        </div>    
    </div> 
      {% endif %}
  {% endif %}
{% endmacro %}

{% else %}
<div class=\"notlogged\">
    <a href=\"/user/login\"><button>Iniciar sesión</button></a>
    <a href=\"/user/register\"><button>Registrarse</button></a> 
</div>
{% endif %}
</div>
</nav>", "themes/bootstrap_barrio/templates/navigation/menu--account.html.twig", "/var/www/web/themes/bootstrap_barrio/templates/navigation/menu--account.html.twig");
    }
}
