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

/* themes/bootstrap_barrio/templates/navigation/breadcrumb.html.twig */
class __TwigTemplate_3d97f6d192d8d227572dbffe97c9cbd802c29f78d4604be2285ba4d2eaede8f0 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 12, "for" => 16];
        $filters = ["escape" => 10];
        $functions = ["attach_library" => 10];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for'],
                ['escape'],
                ['attach_library']
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
        // line 10
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->attachLibrary("bootstrap_barrio/breadcrumb"), "html", null, true);
        echo "

";
        // line 12
        if (($context["breadcrumb"] ?? null)) {
            // line 13
            echo "    <div class=\"container-fluid\">
      <div class=\"row\">
        <div class=\"col col-md-4 col-lg-4 \">
        ";
            // line 16
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["breadcrumb"] ?? null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 17
                echo "        ";
                if ($this->getAttribute($context["loop"], "last", [])) {
                    // line 18
                    echo "          <span>";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "text", [])), "html", null, true);
                    echo "</span>
        ";
                }
                // line 20
                echo "        ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 21
            echo "        </div>  
        <div class=\"col col-md-8 col-lg-8\">
          <ul>
          <!--<ol class=\"breadcrumb\">-->
          ";
            // line 25
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["breadcrumb"] ?? null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 26
                echo "            ";
                if (($this->getAttribute($context["item"], "text", []) != ">")) {
                    // line 27
                    echo "              ";
                    if ($this->getAttribute($context["loop"], "first", [])) {
                        // line 28
                        echo "                <li>
                  <a href=\"";
                        // line 29
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "url", [])), "html", null, true);
                        echo "\">";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "text", [])), "html", null, true);
                        echo "</a>
                </li>
              ";
                    } elseif ($this->getAttribute(                    // line 31
$context["loop"], "last", [])) {
                        // line 32
                        echo "                <li class=\"active\">
                  <a href=\"";
                        // line 33
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "url", [])), "html", null, true);
                        echo "\">";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "text", [])), "html", null, true);
                        echo "</a>
                </li>
              ";
                    } else {
                        // line 36
                        echo "                <li>
                  <a href=\"";
                        // line 37
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "url", [])), "html", null, true);
                        echo "\">";
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "text", [])), "html", null, true);
                        echo "</a>
                </li>  
              ";
                    }
                    // line 40
                    echo "            ";
                }
                // line 41
                echo "          ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 42
            echo "          <!--</ol>-->
        </ul>
      </div>
    </div>
  </div>  
";
        }
    }

    public function getTemplateName()
    {
        return "themes/bootstrap_barrio/templates/navigation/breadcrumb.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  187 => 42,  173 => 41,  170 => 40,  162 => 37,  159 => 36,  151 => 33,  148 => 32,  146 => 31,  139 => 29,  136 => 28,  133 => 27,  130 => 26,  113 => 25,  107 => 21,  93 => 20,  87 => 18,  84 => 17,  67 => 16,  62 => 13,  60 => 12,  55 => 10,);
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
 * Theme override for a breadcrumb trail.
 *
 * Available variables:
 * - breadcrumb: Breadcrumb trail items.
 */
#}
{{ attach_library('bootstrap_barrio/breadcrumb') }}

{% if breadcrumb %}
    <div class=\"container-fluid\">
      <div class=\"row\">
        <div class=\"col col-md-4 col-lg-4 \">
        {% for item in breadcrumb %}
        {% if loop.last %}
          <span>{{ item.text }}</span>
        {% endif %}
        {% endfor %}
        </div>  
        <div class=\"col col-md-8 col-lg-8\">
          <ul>
          <!--<ol class=\"breadcrumb\">-->
          {% for item in breadcrumb %}
            {% if item.text != '>' %}
              {% if loop.first %}
                <li>
                  <a href=\"{{ item.url }}\">{{ item.text }}</a>
                </li>
              {% elseif loop.last %}
                <li class=\"active\">
                  <a href=\"{{ item.url }}\">{{ item.text }}</a>
                </li>
              {% else %}
                <li>
                  <a href=\"{{ item.url }}\">{{ item.text }}</a>
                </li>  
              {% endif %}
            {% endif %}
          {% endfor %}
          <!--</ol>-->
        </ul>
      </div>
    </div>
  </div>  
{% endif %}
", "themes/bootstrap_barrio/templates/navigation/breadcrumb.html.twig", "/var/www/web/themes/bootstrap_barrio/templates/navigation/breadcrumb.html.twig");
    }
}
