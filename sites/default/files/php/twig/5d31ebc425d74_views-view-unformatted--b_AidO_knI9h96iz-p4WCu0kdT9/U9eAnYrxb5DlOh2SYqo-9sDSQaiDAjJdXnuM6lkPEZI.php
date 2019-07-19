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

/* themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--banner-home-slider.html.twig */
class __TwigTemplate_1ca3f50c7b3c68fddaabf2743fced3c46315d761f8d54fe1bdeed424d283af58 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["for" => 24, "set" => 25];
        $filters = ["escape" => 22];
        $functions = ["active_theme_path" => 22, "file_url" => 25];

        try {
            $this->sandbox->checkSecurity(
                ['for', 'set'],
                ['escape'],
                ['active_theme_path', 'file_url']
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
        echo "<section class=\"container-fluid searcher\">
    <div class=\"row searcher__wrapper\">
        <!-- Slider Rotative -->
        <video class=\"searcher__video\" width=\"320\" height=\"240\" autoplay=\"\" muted=\"\" loop=\"\">
            <source src=\"";
        // line 22
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null)), "html", null, true);
        echo "/";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getActiveThemePath(), "html", null, true);
        echo "/images/video/video_home.mp4\" type=\"video/mp4\">
        </video>
        ";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 25
            echo "        ";
            $context["photo"] = call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_image", []), "entity", []), "fileuri", []))]);
            // line 26
            echo "        <img class=\"searcher__videobackup\" src=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["photo"] ?? null)), "html", null, true);
            echo "\" alt=\"First slide\">
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "        <div class=\"col\">
            <h1 class=\"searcher__title\">Viajemos Juntos</h1>
            <svg class=\"searcher__svg\">
                <path d=\"M0 25 L1500 25 Z\"></path>
            </svg>
            <div class=\"container-fluid searcher__toolbar\">
                <div class=\"row\">
                    <div class=\"col\">
                        <h2 class=\"searcher__subtitle\">¿Cual es tu siguiente viaje?</h2>
                        <h2 class=\"searcher__subtitle searcher__subtitle--right\">Experiencias</h2>
                    </div>
                </div>
                <!-- Begins Search Block -->
                ";
        // line 41
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["blockSearchTrip"] ?? null)), "html", null, true);
        echo "
                <!-- End Search Block -->
            </div>
        </div>
    </div>
</section>

<script type=\"text/javascript\">

    /* 
    Inicio
    Script para validar el comportamiento si el home tiene Video.
    */

    \"use strict\";
    function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }

    function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

    function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

    var Buscador =
    function () {
      function Buscador() {
        _classCallCheck(this, Buscador);

        this.parent = null;
        this.video = null;
        this.image = null;
      }

      _createClass(Buscador, [{
        key: \"loadComps\",
        value: function loadComps(comp1, comp2) {
          this.parent = comp1.parentNode;
          this.video = comp1;
          this.image = comp2;
        }
      }, {
        key: \"detectmob\",
        value: function detectmob() {
          if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i)) {
            return true;
          } else {
            return false;
          }
        }
      }, {
        key: \"manupulateDOM\",
        value: function manupulateDOM() {
          var value = this.detectmob();

          if (value) {
            this.video.classList.add('hide');
            this.image.classList.remove('hide');
          } else {
            this.video.classList.remove('hide');
            this.image.classList.add('hide');
          }
        }
      }]);

      return Buscador;
    }();

    

    (function (myClass) {
      var searcher = new myClass();
      window.addEventListener('load', function () {
        searcher.loadComps(document.querySelector('.searcher__video'), document.querySelector('.searcher__videobackup'));
        searcher.manupulateDOM();
      });
      window.addEventListener('resize', function () {
        return searcher.manupulateDOM();
      });
    })(Buscador);

    /*
    Fin - Script para validar el comportamiento si el home tiene Video.
    */

</script>";
    }

    public function getTemplateName()
    {
        return "themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--banner-home-slider.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 41,  84 => 28,  75 => 26,  72 => 25,  68 => 24,  61 => 22,  55 => 18,);
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
<section class=\"container-fluid searcher\">
    <div class=\"row searcher__wrapper\">
        <!-- Slider Rotative -->
        <video class=\"searcher__video\" width=\"320\" height=\"240\" autoplay=\"\" muted=\"\" loop=\"\">
            <source src=\"{{ base_path }}/{{ active_theme_path() }}/images/video/video_home.mp4\" type=\"video/mp4\">
        </video>
        {% for row in rows %}
        {% set photo = file_url(row['content']['#row']._entity.field_image.entity.fileuri) %}
        <img class=\"searcher__videobackup\" src=\"{{ photo }}\" alt=\"First slide\">
        {% endfor %}
        <div class=\"col\">
            <h1 class=\"searcher__title\">Viajemos Juntos</h1>
            <svg class=\"searcher__svg\">
                <path d=\"M0 25 L1500 25 Z\"></path>
            </svg>
            <div class=\"container-fluid searcher__toolbar\">
                <div class=\"row\">
                    <div class=\"col\">
                        <h2 class=\"searcher__subtitle\">¿Cual es tu siguiente viaje?</h2>
                        <h2 class=\"searcher__subtitle searcher__subtitle--right\">Experiencias</h2>
                    </div>
                </div>
                <!-- Begins Search Block -->
                {{ blockSearchTrip }}
                <!-- End Search Block -->
            </div>
        </div>
    </div>
</section>

<script type=\"text/javascript\">

    /* 
    Inicio
    Script para validar el comportamiento si el home tiene Video.
    */

    \"use strict\";
    function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError(\"Cannot call a class as a function\"); } }

    function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if (\"value\" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

    function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

    var Buscador =
    function () {
      function Buscador() {
        _classCallCheck(this, Buscador);

        this.parent = null;
        this.video = null;
        this.image = null;
      }

      _createClass(Buscador, [{
        key: \"loadComps\",
        value: function loadComps(comp1, comp2) {
          this.parent = comp1.parentNode;
          this.video = comp1;
          this.image = comp2;
        }
      }, {
        key: \"detectmob\",
        value: function detectmob() {
          if (navigator.userAgent.match(/Android/i) || navigator.userAgent.match(/webOS/i) || navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPad/i) || navigator.userAgent.match(/iPod/i) || navigator.userAgent.match(/BlackBerry/i) || navigator.userAgent.match(/Windows Phone/i)) {
            return true;
          } else {
            return false;
          }
        }
      }, {
        key: \"manupulateDOM\",
        value: function manupulateDOM() {
          var value = this.detectmob();

          if (value) {
            this.video.classList.add('hide');
            this.image.classList.remove('hide');
          } else {
            this.video.classList.remove('hide');
            this.image.classList.add('hide');
          }
        }
      }]);

      return Buscador;
    }();

    

    (function (myClass) {
      var searcher = new myClass();
      window.addEventListener('load', function () {
        searcher.loadComps(document.querySelector('.searcher__video'), document.querySelector('.searcher__videobackup'));
        searcher.manupulateDOM();
      });
      window.addEventListener('resize', function () {
        return searcher.manupulateDOM();
      });
    })(Buscador);

    /*
    Fin - Script para validar el comportamiento si el home tiene Video.
    */

</script>", "themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--banner-home-slider.html.twig", "/var/www/web/themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--banner-home-slider.html.twig");
    }
}
