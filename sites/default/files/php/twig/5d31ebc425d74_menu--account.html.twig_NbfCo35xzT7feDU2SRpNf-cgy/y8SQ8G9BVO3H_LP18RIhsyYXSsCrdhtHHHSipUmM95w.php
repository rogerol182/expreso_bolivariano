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

/* themes/bootstrap_barrio/subtheme/templates/menu--account.html.twig */
class __TwigTemplate_33806ada3ff18f0d3ba09ed7ec769b17b38198be63ee1b0c198cdf847f0d74f3 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["import" => 21, "if" => 27, "set" => 29, "for" => 34];
        $filters = ["escape" => 53];
        $functions = ["active_theme_path" => 57];

        try {
            $this->sandbox->checkSecurity(
                ['import', 'if', 'set', 'for'],
                ['escape'],
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
        // line 26
        echo "<div class=\"header__login\">
";
        // line 27
        if ((($context["logged_in"] ?? null) == 1)) {
            // line 28
            echo "
    ";
            // line 29
            $context["namePerson"] = "";
            // line 30
            echo "    ";
            $context["idPerson"] = "";
            // line 31
            echo "    ";
            $context["mailPerson"] = "";
            // line 32
            echo "    ";
            $context["pointsPerson"] = "";
            // line 33
            echo "    ";
            $context["reservationsPerson"] = "";
            // line 34
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["personData"] ?? null));
            foreach ($context['_seq'] as $context["key"] => $context["data"]) {
                // line 35
                echo "    ";
                if (($context["key"] == "userNamePerson")) {
                    // line 36
                    echo "        ";
                    $context["namePerson"] = $context["data"];
                    // line 37
                    echo "    ";
                }
                // line 38
                echo "    ";
                if (($context["key"] == "idPerson")) {
                    // line 39
                    echo "        ";
                    $context["idPerson"] = $context["data"];
                    // line 40
                    echo "    ";
                }
                // line 41
                echo "    ";
                if (($context["key"] == "mailPerson")) {
                    // line 42
                    echo "        ";
                    $context["mailPerson"] = $context["data"];
                    // line 43
                    echo "    ";
                }
                // line 44
                echo "    ";
                if (($context["key"] == "pointsPerson")) {
                    // line 45
                    echo "        ";
                    $context["pointsPerson"] = $context["data"];
                    // line 46
                    echo "    ";
                }
                // line 47
                echo "    ";
                if (($context["key"] == "reservationsPerson")) {
                    // line 48
                    echo "        ";
                    $context["reservationsPerson"] = $context["data"];
                    // line 49
                    echo "    ";
                }
                // line 50
                echo "    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['data'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 51
            echo "    <div class=\"logged_wrapper\">
        <div class=\"logged\">
            <p class=\"header__user\"><a href=\"/pages/user/";
            // line 53
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["idPerson"] ?? null)), "html", null, true);
            echo "\" class=\"header__loginactions\"><span class=\"header__linkuser\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["namePerson"] ?? null)), "html", null, true);
            echo "</span></a></p>
            <div class=\"mobile-only\">
                <a href=\"\">
                    <div class=\"header__close-session\">
                        <img src=\"";
            // line 57
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
            <a class=\"header__loginactions\" href=\"/pages/express_traveler\">
                <span class=\"header__linkuser\">Puntos</span> 
                <span class=\"header__icon header__icon--points\"></span>
                <span class=\"header__linkuser ml-2\">";
            // line 68
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["pointsPerson"] ?? null)), "html", null, true);
            echo "</span> 
            </a>
            <a class=\"header__loginactions\" href=\"/pages/user/";
            // line 70
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["idPerson"] ?? null)), "html", null, true);
            echo "\"><span class=\"header__linkuser\">Reservas</span> <span class=\"header__icon header__icon--booking\">";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["reservationsPerson"] ?? null)), "html", null, true);
            echo "</span></a>
        </div>
    </div>
    <div class=\"logged\">
        <div class=\"desktop-only\">
            <a href=\"/user/logout\">
                <div class=\"header__close-session\">
                    <img src=\"";
            // line 77
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
        } else {
            // line 85
            echo "<div class=\"notlogged\">
    <a href=\"/user/login\"><button>Iniciar sesión</button></a>
    <a href=\"/user/register\"><button>Registrarse</button></a> 
</div>
";
        }
        // line 90
        echo "</div>
</nav>";
    }

    public function getTemplateName()
    {
        return "themes/bootstrap_barrio/subtheme/templates/menu--account.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  201 => 90,  194 => 85,  181 => 77,  169 => 70,  164 => 68,  148 => 57,  139 => 53,  135 => 51,  129 => 50,  126 => 49,  123 => 48,  120 => 47,  117 => 46,  114 => 45,  111 => 44,  108 => 43,  105 => 42,  102 => 41,  99 => 40,  96 => 39,  93 => 38,  90 => 37,  87 => 36,  84 => 35,  79 => 34,  76 => 33,  73 => 32,  70 => 31,  67 => 30,  65 => 29,  62 => 28,  60 => 27,  57 => 26,  55 => 21,);
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

    {% set namePerson = '' %}
    {% set idPerson = '' %}
    {% set mailPerson = '' %}
    {% set pointsPerson = '' %}
    {% set reservationsPerson = '' %}
    {% for key,data in personData %}
    {% if key == 'userNamePerson' %}
        {% set namePerson = data %}
    {% endif %}
    {% if key == 'idPerson' %}
        {% set idPerson = data %}
    {% endif %}
    {% if key == 'mailPerson' %}
        {% set mailPerson = data %}
    {% endif %}
    {% if key == 'pointsPerson' %}
        {% set pointsPerson = data %}
    {% endif %}
    {% if key == 'reservationsPerson' %}
        {% set reservationsPerson = data %}
    {% endif %}
    {% endfor %}
    <div class=\"logged_wrapper\">
        <div class=\"logged\">
            <p class=\"header__user\"><a href=\"/pages/user/{{ idPerson }}\" class=\"header__loginactions\"><span class=\"header__linkuser\">{{ namePerson }}</span></a></p>
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
            <a class=\"header__loginactions\" href=\"/pages/express_traveler\">
                <span class=\"header__linkuser\">Puntos</span> 
                <span class=\"header__icon header__icon--points\"></span>
                <span class=\"header__linkuser ml-2\">{{ pointsPerson }}</span> 
            </a>
            <a class=\"header__loginactions\" href=\"/pages/user/{{ idPerson }}\"><span class=\"header__linkuser\">Reservas</span> <span class=\"header__icon header__icon--booking\">{{ reservationsPerson }}</span></a>
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
{% else %}
<div class=\"notlogged\">
    <a href=\"/user/login\"><button>Iniciar sesión</button></a>
    <a href=\"/user/register\"><button>Registrarse</button></a> 
</div>
{% endif %}
</div>
</nav>", "themes/bootstrap_barrio/subtheme/templates/menu--account.html.twig", "/var/www/web/themes/bootstrap_barrio/subtheme/templates/menu--account.html.twig");
    }
}
