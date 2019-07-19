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

/* modules/custom/expreso_bolivariano_blocks/templates/block--newsletter-home.html.twig */
class __TwigTemplate_2d180ac8d61cce1b88f513cfc4999326032c44b8998399e7512e4806cc838df6 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["for" => 3, "if" => 4];
        $filters = ["escape" => 1, "first" => 3];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['for', 'if'],
                ['escape', 'first'],
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
        echo "<form class=\"formsubs__wrapper mb-4\" ";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null)), "html", null, true);
        echo " class=\"newsletter_form btncito\" data-drupal-selector=\"newsletter_form\" action=\"\" method=\"post\" id=\"newsletter_form\" accept-charset=\"UTF-8\">
    <div class=\"row no-gutters text-orange\">
        ";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["formData"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["child"]) {
            if ((twig_first($this->env, $context["key"]) != "#")) {
                // line 4
                echo "        ";
                if (($context["key"] == "interestingNewsletter")) {
                    // line 5
                    echo "        <div class=\"col-12\">
\t        <label class=\"formsubs__label\">Selecciona uno
\t            ";
                    // line 7
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["child"]), "html", null, true);
                    echo "
\t        </label>
        </div>
        ";
                } elseif ((                // line 10
$context["key"] == "nameNewsletter")) {
                    // line 11
                    echo "        <div class=\"col-12 col-sm-5\">
            <label class=\"formsubs__label\">Nombre Completo *
                ";
                    // line 13
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["child"]), "html", null, true);
                    echo "
            </label>
        </div>
        ";
                } elseif ((                // line 16
$context["key"] == "mailNewsletter")) {
                    // line 17
                    echo "        <div class=\"col-12 col-sm-7\">
            <label class=\"formsubs__label\">Correo Electrónico *
                ";
                    // line 19
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["child"]), "html", null, true);
                    echo "
            </label>
        </div>
        ";
                } elseif ((                // line 22
$context["key"] == "submit")) {
                    // line 23
                    echo "\t\t<div class=\"col-12\">
            ";
                    // line 24
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["child"]), "html", null, true);
                    echo "
        </div>
        ";
                } elseif ((                // line 26
$context["key"] == "form_build_id")) {
                    // line 27
                    echo "            ";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["child"]), "html", null, true);
                    echo "
        ";
                } elseif ((                // line 28
$context["key"] == "form_id")) {
                    // line 29
                    echo "            ";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["child"]), "html", null, true);
                    echo "    
        ";
                } elseif ((                // line 30
$context["key"] == "form_token")) {
                    // line 31
                    echo "            ";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["child"]), "html", null, true);
                    echo "
        ";
                } else {
                    // line 33
                    echo "            ";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["child"]), "html", null, true);
                    echo " 
        ";
                }
                // line 35
                echo "        ";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        echo " 
    </div>
</form>";
    }

    public function getTemplateName()
    {
        return "modules/custom/expreso_bolivariano_blocks/templates/block--newsletter-home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  141 => 35,  135 => 33,  129 => 31,  127 => 30,  122 => 29,  120 => 28,  115 => 27,  113 => 26,  108 => 24,  105 => 23,  103 => 22,  97 => 19,  93 => 17,  91 => 16,  85 => 13,  81 => 11,  79 => 10,  73 => 7,  69 => 5,  66 => 4,  61 => 3,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<form class=\"formsubs__wrapper mb-4\" {{ attributes }} class=\"newsletter_form btncito\" data-drupal-selector=\"newsletter_form\" action=\"\" method=\"post\" id=\"newsletter_form\" accept-charset=\"UTF-8\">
    <div class=\"row no-gutters text-orange\">
        {% for key, child in formData if key|first != '#' %}
        {% if key == 'interestingNewsletter' %}
        <div class=\"col-12\">
\t        <label class=\"formsubs__label\">Selecciona uno
\t            {{ child }}
\t        </label>
        </div>
        {% elseif key == 'nameNewsletter' %}
        <div class=\"col-12 col-sm-5\">
            <label class=\"formsubs__label\">Nombre Completo *
                {{ child }}
            </label>
        </div>
        {% elseif key == 'mailNewsletter' %}
        <div class=\"col-12 col-sm-7\">
            <label class=\"formsubs__label\">Correo Electrónico *
                {{ child }}
            </label>
        </div>
        {% elseif key == 'submit' %}
\t\t<div class=\"col-12\">
            {{ child }}
        </div>
        {% elseif key == 'form_build_id' %}
            {{ child }}
        {% elseif key == 'form_id' %}
            {{ child }}    
        {% elseif key == 'form_token' %}
            {{ child }}
        {% else %}
            {{ child }} 
        {% endif %}
        {% endfor %} 
    </div>
</form>", "modules/custom/expreso_bolivariano_blocks/templates/block--newsletter-home.html.twig", "/var/www/web/modules/custom/expreso_bolivariano_blocks/templates/block--newsletter-home.html.twig");
    }
}
