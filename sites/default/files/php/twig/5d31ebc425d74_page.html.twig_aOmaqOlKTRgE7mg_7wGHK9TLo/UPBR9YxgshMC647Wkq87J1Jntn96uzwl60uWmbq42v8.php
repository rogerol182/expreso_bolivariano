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

/* themes/bootstrap_barrio/templates/layout/page.html.twig */
class __TwigTemplate_fee0c47d17be01eeeec1f8aa2978bb9304b09c957f7f1f719bf4ae44d8985ae5 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'head' => [$this, 'block_head'],
            'featured' => [$this, 'block_featured'],
            'content' => [$this, 'block_content'],
            'footer' => [$this, 'block_footer'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["block" => 73, "if" => 117];
        $filters = ["t" => 72, "escape" => 119];
        $functions = ["active_theme_path" => 188];

        try {
            $this->sandbox->checkSecurity(
                ['block', 'if'],
                ['t', 'escape'],
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
        // line 70
        echo "<!--<div id=\"page-wrapper\">
  <div id=\"page\">-->
    <header id=\"header\" class=\"header\" role=\"banner\" aria-label=\"";
        // line 72
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Site header"));
        echo "\">
      ";
        // line 73
        $this->displayBlock('head', $context, $blocks);
        // line 116
        echo "    </header>
    ";
        // line 117
        if ($this->getAttribute(($context["page"] ?? null), "breadcrumb", [])) {
            // line 118
            echo "    <div class=\"wrapper__breadcrump\">
      ";
            // line 119
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "breadcrumb", [])), "html", null, true);
            echo "
    </div>
    ";
        }
        // line 122
        echo "    ";
        if ($this->getAttribute(($context["page"] ?? null), "banner_top", [])) {
            // line 123
            echo "    
        ";
            // line 124
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "banner_top", [])), "html", null, true);
            echo "
        
    ";
        }
        // line 127
        echo "    ";
        if ($this->getAttribute(($context["page"] ?? null), "highlighted", [])) {
            // line 128
            echo "      <div class=\"highlighted\">
        <aside class=\"";
            // line 129
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["container"] ?? null)), "html", null, true);
            echo " section clearfix\" role=\"complementary\">
          ";
            // line 130
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "highlighted", [])), "html", null, true);
            echo "
        </aside>
      </div>
    ";
        }
        // line 134
        echo "    ";
        if ($this->getAttribute(($context["page"] ?? null), "featured_top", [])) {
            // line 135
            echo "      ";
            $this->displayBlock('featured', $context, $blocks);
            // line 142
            echo "    ";
        }
        // line 143
        echo "
    <div id=\"main-wrapper\" class=\"layout-main-wrapper clearfix\">

      ";
        // line 146
        $this->displayBlock('content', $context, $blocks);
        // line 173
        echo "    </div>
    ";
        // line 174
        if ((($this->getAttribute(($context["page"] ?? null), "featured_bottom_first", []) || $this->getAttribute(($context["page"] ?? null), "featured_bottom_second", [])) || $this->getAttribute(($context["page"] ?? null), "featured_bottom_third", []))) {
            // line 175
            echo "      <div class=\"featured-bottom\">
        <aside class=\"";
            // line 176
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["container"] ?? null)), "html", null, true);
            echo " clearfix\" role=\"complementary\">
          ";
            // line 177
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "featured_bottom_first", [])), "html", null, true);
            echo "
          ";
            // line 178
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "featured_bottom_second", [])), "html", null, true);
            echo "
          ";
            // line 179
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "featured_bottom_third", [])), "html", null, true);
            echo "
        </aside>
      </div>
    ";
        }
        // line 183
        echo "    <!--<footer class=\"site-footer\">-->
      <footer class=\"container-fluid footer\">
        <div class=\"row footer__row footer__row--hidden footer__icons\">
            <div class=\"col-4 footer__col footer__col--border\">
                <a href=\"#\">
                    <img class=\"footer__icon\" src=\"/";
        // line 188
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getActiveThemePath(), "html", null, true);
        echo "/images/misc/map-icon.png\" alt=\"Destinos\">
                    <p>Destinos</p>
                </a>
            </div>
            <div class=\"col-4 footer__col footer__col--border\">
                <a href=\"#\">
                    <img class=\"footer__icon\" src=\"/";
        // line 194
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getActiveThemePath(), "html", null, true);
        echo "/images/misc/discount.png\" alt=\"Promociones\">
                    <p>Promociones</p>
                </a>
            </div>
            <div class=\"col-4 footer__col footer__col--border\">
                <a href=\"#\">
                    <img class=\"footer__icon\" src=\"/";
        // line 200
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getActiveThemePath(), "html", null, true);
        echo "/images/misc/tickets.png\" alt=\"Vive hoy\">
                    <p>Vive hoy</p>
                </a>
            </div>
        </div>
      ";
        // line 205
        $this->displayBlock('footer', $context, $blocks);
        // line 227
        echo "
    </footer>
    ";
        // line 229
        if ($this->getAttribute(($context["page"] ?? null), "footer_fifth", [])) {
            // line 230
            echo "      <!--<div class=\"site-footer__bottom\">-->
        <div class=\"footer__media\">
        ";
            // line 232
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer_fifth", [])), "html", null, true);
            echo "
      </div>
    ";
        }
        // line 235
        echo " <!--</div>
</div>-->
";
    }

    // line 73
    public function block_head($context, array $blocks = [])
    {
        // line 74
        echo "        <!--";
        if ((($this->getAttribute(($context["page"] ?? null), "secondary_menu", []) || $this->getAttribute(($context["page"] ?? null), "top_header", [])) || $this->getAttribute(($context["page"] ?? null), "top_header_form", []))) {
            // line 75
            echo "          <nav";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["navbar_top_attributes"] ?? null)), "html", null, true);
            echo ">
          ";
            // line 76
            if (($context["container_navbar"] ?? null)) {
                // line 77
                echo "          <div class=\"container\">
          ";
            }
            // line 79
            echo "              ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "secondary_menu", [])), "html", null, true);
            echo "
              ";
            // line 80
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "top_header", [])), "html", null, true);
            echo "
              ";
            // line 81
            if ($this->getAttribute(($context["page"] ?? null), "top_header_form", [])) {
                // line 82
                echo "                <div class=\"form-inline navbar-form float-right\">
                  ";
                // line 83
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "top_header_form", [])), "html", null, true);
                echo "
                </div>
              ";
            }
            // line 86
            echo "          ";
            if (($context["container_navbar"] ?? null)) {
                // line 87
                echo "          </div>
          ";
            }
            // line 89
            echo "          </nav>
        ";
        }
        // line 90
        echo "-->
        <!--<nav";
        // line 91
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["navbar_attributes"] ?? null)), "html", null, true);
        echo ">
          ";
        // line 92
        if (($context["container_navbar"] ?? null)) {
            // line 93
            echo "          <div class=\"container\">
          ";
        }
        // line 94
        echo "-->
            ";
        // line 95
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "header", [])), "html", null, true);
        echo "
            ";
        // line 96
        if (($this->getAttribute(($context["page"] ?? null), "primary_menu", []) || $this->getAttribute(($context["page"] ?? null), "header_form", []))) {
            // line 97
            echo "              <button class=\"navbar-toggler navbar-toggler-right\" type=\"button\" data-toggle=\"collapse\" data-target=\"#CollapsingNavbar\" aria-controls=\"CollapsingNavbar\" aria-expanded=\"false\" aria-label=\"Toggle navigation\"><span class=\"navbar-toggler-icon\"></span></button>
              <div class=\"collapse navbar-collapse\" id=\"CollapsingNavbar\">
                ";
            // line 99
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "primary_menu", [])), "html", null, true);
            echo "
                ";
            // line 100
            if ($this->getAttribute(($context["page"] ?? null), "header_form", [])) {
                // line 101
                echo "                  <div class=\"form-inline navbar-form float-right\">
                    ";
                // line 102
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "header_form", [])), "html", null, true);
                echo "
                  </div>
                ";
            }
            // line 105
            echo "            </div>
            
            ";
        }
        // line 108
        echo "            <!--";
        if (($context["sidebar_collapse"] ?? null)) {
            // line 109
            echo "              <button class=\"navbar-toggler navbar-toggler-left\" type=\"button\" data-toggle=\"collapse\" data-target=\"#CollapsingLeft\" aria-controls=\"CollapsingLeft\" aria-expanded=\"false\" aria-label=\"Toggle navigation\"></button>
            ";
        }
        // line 111
        echo "          ";
        if (($context["container_navbar"] ?? null)) {
            // line 112
            echo "          </div>
          ";
        }
        // line 114
        echo "        </nav>-->
      ";
    }

    // line 135
    public function block_featured($context, array $blocks = [])
    {
        // line 136
        echo "        <div class=\"featured-top\">
          <aside class=\"featured-top__inner section ";
        // line 137
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["container"] ?? null)), "html", null, true);
        echo " clearfix\" role=\"complementary\">
            ";
        // line 138
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "featured_top", [])), "html", null, true);
        echo "
          </aside>
        </div>
      ";
    }

    // line 146
    public function block_content($context, array $blocks = [])
    {
        // line 147
        echo "        <div id=\"main\">
          
          <div class=\"row row-offcanvas row-offcanvas-left clearfix\">
              <main";
        // line 150
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content_attributes"] ?? null)), "html", null, true);
        echo ">
                <section class=\"section\">
                  <a id=\"main-content\" tabindex=\"-1\"></a>
                  ";
        // line 153
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "content", [])), "html", null, true);
        echo "
                </section>
              </main>
            ";
        // line 156
        if ($this->getAttribute(($context["page"] ?? null), "sidebar_first", [])) {
            // line 157
            echo "              <div";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebar_first_attributes"] ?? null)), "html", null, true);
            echo ">
                <aside class=\"section\" role=\"complementary\">
                  ";
            // line 159
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "sidebar_first", [])), "html", null, true);
            echo "
                </aside>
              </div>
            ";
        }
        // line 163
        echo "            ";
        if ($this->getAttribute(($context["page"] ?? null), "sidebar_second", [])) {
            // line 164
            echo "              <div";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebar_second_attributes"] ?? null)), "html", null, true);
            echo ">
                <aside class=\"section\" role=\"complementary\">
                  ";
            // line 166
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "sidebar_second", [])), "html", null, true);
            echo "
                </aside>
              </div>
            ";
        }
        // line 170
        echo "          </div>
        </div>
      ";
    }

    // line 205
    public function block_footer($context, array $blocks = [])
    {
        // line 206
        echo "        <!--<div class=\"";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["container"] ?? null)), "html", null, true);
        echo "\">-->
          ";
        // line 207
        if (((($this->getAttribute(($context["page"] ?? null), "footer_first", []) || $this->getAttribute(($context["page"] ?? null), "footer_second", [])) || $this->getAttribute(($context["page"] ?? null), "footer_third", [])) || $this->getAttribute(($context["page"] ?? null), "footer_fourth", []))) {
            // line 208
            echo "            <!--<div class=\"site-footer__top clearfix\">-->
              <div class=\"row no-gutters footer__row footer__row--sitemap\">
                <div class=\"col-12 col-md footer__col footer__col--main\">
                ";
            // line 211
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer_first", [])), "html", null, true);
            echo "
                </div>
                <div class=\"col-12 col-md footer__col footer__col--main\">
                ";
            // line 214
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer_second", [])), "html", null, true);
            echo "
                </div>
                <div class=\"col-12 col-md footer__col footer__col--main footer__col--small\">
                ";
            // line 217
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer_third", [])), "html", null, true);
            echo "
                </div>
                <div class=\"col-12 col-md footer__col footer__col--main footer__col--big\">
                ";
            // line 220
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer_fourth", [])), "html", null, true);
            echo "
                </div>
            </div>
          ";
        }
        // line 224
        echo "
        <!--</div>-->
      ";
    }

    public function getTemplateName()
    {
        return "themes/bootstrap_barrio/templates/layout/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  440 => 224,  433 => 220,  427 => 217,  421 => 214,  415 => 211,  410 => 208,  408 => 207,  403 => 206,  400 => 205,  394 => 170,  387 => 166,  381 => 164,  378 => 163,  371 => 159,  365 => 157,  363 => 156,  357 => 153,  351 => 150,  346 => 147,  343 => 146,  335 => 138,  331 => 137,  328 => 136,  325 => 135,  320 => 114,  316 => 112,  313 => 111,  309 => 109,  306 => 108,  301 => 105,  295 => 102,  292 => 101,  290 => 100,  286 => 99,  282 => 97,  280 => 96,  276 => 95,  273 => 94,  269 => 93,  267 => 92,  263 => 91,  260 => 90,  256 => 89,  252 => 87,  249 => 86,  243 => 83,  240 => 82,  238 => 81,  234 => 80,  229 => 79,  225 => 77,  223 => 76,  218 => 75,  215 => 74,  212 => 73,  206 => 235,  200 => 232,  196 => 230,  194 => 229,  190 => 227,  188 => 205,  180 => 200,  171 => 194,  162 => 188,  155 => 183,  148 => 179,  144 => 178,  140 => 177,  136 => 176,  133 => 175,  131 => 174,  128 => 173,  126 => 146,  121 => 143,  118 => 142,  115 => 135,  112 => 134,  105 => 130,  101 => 129,  98 => 128,  95 => 127,  89 => 124,  86 => 123,  83 => 122,  77 => 119,  74 => 118,  72 => 117,  69 => 116,  67 => 73,  63 => 72,  59 => 70,);
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
 * Bootstrap Barrio's theme implementation to display a single page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.html.twig template normally located in the
 * core/modules/system directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - base_path: The base URL path of the Drupal installation. Will usually be
 *   \"/\" unless you have installed Drupal in a sub-directory.
 * - is_front: A flag indicating if the current page is the front page.
 * - logged_in: A flag indicating if the user is registered and signed in.
 * - is_admin: A flag indicating if the user has permission to access
 *   administration pages.
 *
 * Site identity:
 * - front_page: The URL of the front page. Use this instead of base_path when
 *   linking to the front page. This includes the language domain or prefix.
 * - logo: The url of the logo image, as defined in theme settings.
 * - site_name: The name of the site. This is empty when displaying the site
 *   name has been disabled in the theme settings.
 * - site_slogan: The slogan of the site. This is empty when displaying the site
 *   slogan has been disabled in theme settings.

 * Page content (in order of occurrence in the default page.html.twig):
 * - node: Fully loaded node, if there is an automatically-loaded node
 *   associated with the page and the node ID is the second argument in the
 *   page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - page.top_header: Items for the top header region.
 * - page.top_header_form: Items for the top header form region.
 * - page.header: Items for the header region.
 * - page.header_form: Items for the header form region.
 * - page.highlighted: Items for the highlighted region.
 * - page.primary_menu: Items for the primary menu region.
 * - page.secondary_menu: Items for the secondary menu region.
 * - page.featured_top: Items for the featured top region.
 * - page.content: The main content of the current page.
 * - page.sidebar_first: Items for the first sidebar.
 * - page.sidebar_second: Items for the second sidebar.
 * - page.featured_bottom_first: Items for the first featured bottom region.
 * - page.featured_bottom_second: Items for the second featured bottom region.
 * - page.featured_bottom_third: Items for the third featured bottom region.
 * - page.footer_first: Items for the first footer column.
 * - page.footer_second: Items for the second footer column.
 * - page.footer_third: Items for the third footer column.
 * - page.footer_fourth: Items for the fourth footer column.
 * - page.footer_fifth: Items for the fifth footer column.
 * - page.breadcrumb: Items for the breadcrumb region.
 *
 * Theme variables:
 * - navbar_top_attributes: Items for the header region.
 * - navbar_attributes: Items for the header region.
 * - content_attributes: Items for the header region.
 * - sidebar_first_attributes: Items for the highlighted region.
 * - sidebar_second_attributes: Items for the primary menu region.
 * - sidebar_collapse: If the sidebar_first will collapse.
 *
 * @see template_preprocess_page()
 * @see bootstrap_barrio_preprocess_page()
 * @see html.html.twig
 */
#}
<!--<div id=\"page-wrapper\">
  <div id=\"page\">-->
    <header id=\"header\" class=\"header\" role=\"banner\" aria-label=\"{{ 'Site header'|t}}\">
      {% block head %}
        <!--{% if page.secondary_menu or page.top_header or page.top_header_form %}
          <nav{{ navbar_top_attributes }}>
          {% if container_navbar %}
          <div class=\"container\">
          {% endif %}
              {{ page.secondary_menu }}
              {{ page.top_header }}
              {% if page.top_header_form %}
                <div class=\"form-inline navbar-form float-right\">
                  {{ page.top_header_form }}
                </div>
              {% endif %}
          {% if container_navbar %}
          </div>
          {% endif %}
          </nav>
        {% endif %}-->
        <!--<nav{{ navbar_attributes }}>
          {% if container_navbar %}
          <div class=\"container\">
          {% endif %}-->
            {{ page.header }}
            {% if page.primary_menu or page.header_form %}
              <button class=\"navbar-toggler navbar-toggler-right\" type=\"button\" data-toggle=\"collapse\" data-target=\"#CollapsingNavbar\" aria-controls=\"CollapsingNavbar\" aria-expanded=\"false\" aria-label=\"Toggle navigation\"><span class=\"navbar-toggler-icon\"></span></button>
              <div class=\"collapse navbar-collapse\" id=\"CollapsingNavbar\">
                {{ page.primary_menu }}
                {% if page.header_form %}
                  <div class=\"form-inline navbar-form float-right\">
                    {{ page.header_form }}
                  </div>
                {% endif %}
            </div>
            
            {% endif %}
            <!--{% if sidebar_collapse %}
              <button class=\"navbar-toggler navbar-toggler-left\" type=\"button\" data-toggle=\"collapse\" data-target=\"#CollapsingLeft\" aria-controls=\"CollapsingLeft\" aria-expanded=\"false\" aria-label=\"Toggle navigation\"></button>
            {% endif %}
          {% if container_navbar %}
          </div>
          {% endif %}
        </nav>-->
      {% endblock %}
    </header>
    {% if page.breadcrumb %}
    <div class=\"wrapper__breadcrump\">
      {{ page.breadcrumb }}
    </div>
    {% endif %}
    {% if page.banner_top %}
    
        {{ page.banner_top }}
        
    {% endif %}
    {% if page.highlighted %}
      <div class=\"highlighted\">
        <aside class=\"{{ container }} section clearfix\" role=\"complementary\">
          {{ page.highlighted }}
        </aside>
      </div>
    {% endif %}
    {% if page.featured_top %}
      {% block featured %}
        <div class=\"featured-top\">
          <aside class=\"featured-top__inner section {{ container }} clearfix\" role=\"complementary\">
            {{ page.featured_top }}
          </aside>
        </div>
      {% endblock %}
    {% endif %}

    <div id=\"main-wrapper\" class=\"layout-main-wrapper clearfix\">

      {% block content %}
        <div id=\"main\">
          
          <div class=\"row row-offcanvas row-offcanvas-left clearfix\">
              <main{{ content_attributes }}>
                <section class=\"section\">
                  <a id=\"main-content\" tabindex=\"-1\"></a>
                  {{ page.content }}
                </section>
              </main>
            {% if page.sidebar_first %}
              <div{{ sidebar_first_attributes }}>
                <aside class=\"section\" role=\"complementary\">
                  {{ page.sidebar_first }}
                </aside>
              </div>
            {% endif %}
            {% if page.sidebar_second %}
              <div{{ sidebar_second_attributes }}>
                <aside class=\"section\" role=\"complementary\">
                  {{ page.sidebar_second }}
                </aside>
              </div>
            {% endif %}
          </div>
        </div>
      {% endblock %}
    </div>
    {% if page.featured_bottom_first or page.featured_bottom_second or page.featured_bottom_third %}
      <div class=\"featured-bottom\">
        <aside class=\"{{ container }} clearfix\" role=\"complementary\">
          {{ page.featured_bottom_first }}
          {{ page.featured_bottom_second }}
          {{ page.featured_bottom_third }}
        </aside>
      </div>
    {% endif %}
    <!--<footer class=\"site-footer\">-->
      <footer class=\"container-fluid footer\">
        <div class=\"row footer__row footer__row--hidden footer__icons\">
            <div class=\"col-4 footer__col footer__col--border\">
                <a href=\"#\">
                    <img class=\"footer__icon\" src=\"/{{ active_theme_path() }}/images/misc/map-icon.png\" alt=\"Destinos\">
                    <p>Destinos</p>
                </a>
            </div>
            <div class=\"col-4 footer__col footer__col--border\">
                <a href=\"#\">
                    <img class=\"footer__icon\" src=\"/{{ active_theme_path() }}/images/misc/discount.png\" alt=\"Promociones\">
                    <p>Promociones</p>
                </a>
            </div>
            <div class=\"col-4 footer__col footer__col--border\">
                <a href=\"#\">
                    <img class=\"footer__icon\" src=\"/{{ active_theme_path() }}/images/misc/tickets.png\" alt=\"Vive hoy\">
                    <p>Vive hoy</p>
                </a>
            </div>
        </div>
      {% block footer %}
        <!--<div class=\"{{ container }}\">-->
          {% if page.footer_first or page.footer_second or page.footer_third or page.footer_fourth %}
            <!--<div class=\"site-footer__top clearfix\">-->
              <div class=\"row no-gutters footer__row footer__row--sitemap\">
                <div class=\"col-12 col-md footer__col footer__col--main\">
                {{ page.footer_first }}
                </div>
                <div class=\"col-12 col-md footer__col footer__col--main\">
                {{ page.footer_second }}
                </div>
                <div class=\"col-12 col-md footer__col footer__col--main footer__col--small\">
                {{ page.footer_third }}
                </div>
                <div class=\"col-12 col-md footer__col footer__col--main footer__col--big\">
                {{ page.footer_fourth }}
                </div>
            </div>
          {% endif %}

        <!--</div>-->
      {% endblock %}

    </footer>
    {% if page.footer_fifth %}
      <!--<div class=\"site-footer__bottom\">-->
        <div class=\"footer__media\">
        {{ page.footer_fifth }}
      </div>
    {% endif %}
 <!--</div>
</div>-->
", "themes/bootstrap_barrio/templates/layout/page.html.twig", "/var/www/web/themes/bootstrap_barrio/templates/layout/page.html.twig");
    }
}
