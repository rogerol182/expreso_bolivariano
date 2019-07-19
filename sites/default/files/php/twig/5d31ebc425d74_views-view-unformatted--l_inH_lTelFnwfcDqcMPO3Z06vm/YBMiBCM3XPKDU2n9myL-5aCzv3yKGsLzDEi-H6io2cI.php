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

/* themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--live-today-list.html.twig */
class __TwigTemplate_4c78513cb2022599f316b1e935fa74a183bb090b2a12fcb5f231cbe782f17bfd extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 18, "for" => 24, "if" => 31];
        $filters = ["date" => 18, "escape" => 45, "raw" => 62];
        $functions = ["file_url" => 25];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'for', 'if'],
                ['date', 'escape', 'raw'],
                ['file_url']
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
        $context["now"] = twig_date_format_filter($this->env, "now", "d-m-Y");
        // line 19
        echo "<div class=\"wrapper__body pb-4\">
    <h3 class=\"wrapper__lead\">Ultimas noticias</h3>
    <div class=\"wrapper__container container-fluid mb-4\">
        <div class=\"row\">
            <div class=\"col-sm-12 col-lg-8\">
                ";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 25
            echo "                ";
            $context["photo"] = call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_image", []), "entity", []), "fileuri", []))]);
            // line 26
            echo "                ";
            $context["dateCreated"] = twig_date_format_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "created", []), "value", [])), "d-m-Y");
            // line 27
            echo "                ";
            $context["dayCreated"] = twig_date_format_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["dateCreated"] ?? null)), "d");
            // line 28
            echo "                ";
            $context["monthCreated"] = twig_date_format_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["dateCreated"] ?? null)), "F");
            // line 29
            echo "                ";
            $context["yearCreated"] = twig_date_format_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["dateCreated"] ?? null)), "Y");
            // line 30
            echo "
                ";
            // line 31
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_type", []), "value", []) == "big_news")) {
                // line 32
                echo "                ";
                $context["cityOrigin"] = "";
                // line 33
                echo "                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_city_origin_cod", []), "getSetting", [0 => "allowed_values"], "method"));
                foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                    // line 34
                    echo "                    ";
                    if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_city_origin_cod", []), "value", []) == $context["key"])) {
                        // line 35
                        echo "                    ";
                        $context["cityOrigin"] = $context["value"];
                        // line 36
                        echo "                    ";
                    }
                    // line 37
                    echo "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 38
                echo "                ";
                $context["cityDestiny"] = "";
                // line 39
                echo "                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_city_destiny_co", []), "getSetting", [0 => "allowed_values"], "method"));
                foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                    // line 40
                    echo "                    ";
                    if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_city_destiny_co", []), "value", []) == $context["key"])) {
                        // line 41
                        echo "                    ";
                        $context["cityDestiny"] = $context["value"];
                        // line 42
                        echo "                    ";
                    }
                    // line 43
                    echo "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 44
                echo "                <div class=\"big_news\">
                    <div class=\"date\">publicado ";
                // line 45
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["dayCreated"] ?? null)), "html", null, true);
                echo " de ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["monthCreated"] ?? null)), "html", null, true);
                echo ", ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["yearCreated"] ?? null)), "html", null, true);
                echo "</div>
                    <div class=\"title\">";
                // line 46
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_title", []), "value", [])), "html", null, true);
                echo "</div>
                    <picture><img src=\"";
                // line 47
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["photo"] ?? null)), "html", null, true);
                echo "\" alt=\"\"></picture>
                    <div class=\"row\">
                        <div class=\"col-md-12 link\">
                            <div class=\"salida-regreso d-flex align-items-center justify-content-center mb-2\">
                                <div class=\"trip__salida\" style=\"font-size: 0.8em;\">
                                    <p>Fecha Inicio</p>
                                    <p>";
                // line 53
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_start_date", []), "value", [])), "html", null, true);
                echo "</p>
                                </div>
                                <div class=\"trip__regreso\" style=\"font-size: 0.8em;\">
                                    <p>Fecha Fin</p>
                                    <p>";
                // line 57
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_end_date", []), "value", [])), "html", null, true);
                echo "</p>
                                </div>
                            </div>
                        </div>
                        <div class=\"col-md-12 paragraph\">
                            <p>";
                // line 62
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_resume", []), "value", [])));
                echo "</p>
                        </div>
                        <div><a href=\"/pages/reservation/";
                // line 64
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_city_origin_cod", []), "value", [])), "html", null, true);
                echo "/";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cityOrigin"] ?? null)), "html", null, true);
                echo "/";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_city_destiny_co", []), "value", [])), "html", null, true);
                echo "/";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cityDestiny"] ?? null)), "html", null, true);
                echo "/";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["now"] ?? null)), "html", null, true);
                echo "/0\"><button class=\"btn dark\">Viaja Ahora!</button></a></div>
                    </div>
                </div>
                ";
            } elseif (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(            // line 67
$context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_type", []), "value", []) == "regular_news")) {
                // line 68
                echo "                ";
                $context["cityOrigin"] = "";
                // line 69
                echo "                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_city_origin_cod", []), "getSetting", [0 => "allowed_values"], "method"));
                foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                    // line 70
                    echo "                    ";
                    if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_city_origin_cod", []), "value", []) == $context["key"])) {
                        // line 71
                        echo "                    ";
                        $context["cityOrigin"] = $context["value"];
                        // line 72
                        echo "                    ";
                    }
                    // line 73
                    echo "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 74
                echo "                ";
                $context["cityDestiny"] = "";
                // line 75
                echo "                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_city_destiny_co", []), "getSetting", [0 => "allowed_values"], "method"));
                foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                    // line 76
                    echo "                    ";
                    if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_city_destiny_co", []), "value", []) == $context["key"])) {
                        // line 77
                        echo "                    ";
                        $context["cityDestiny"] = $context["value"];
                        // line 78
                        echo "                    ";
                    }
                    // line 79
                    echo "                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 80
                echo "                <div class=\"regular_news\">
                    <div class=\"date\">publicado ";
                // line 81
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["dayCreated"] ?? null)), "html", null, true);
                echo " de ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["monthCreated"] ?? null)), "html", null, true);
                echo ", ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["yearCreated"] ?? null)), "html", null, true);
                echo "</div>
                    <div class=\"title\">";
                // line 82
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_title", []), "value", [])), "html", null, true);
                echo "</div>
                    <div class=\"row\">
                        <div class=\"col-md-6\">
                            <div class=\"paragraph\">
                                <p>";
                // line 86
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_resume", []), "value", [])));
                echo "</p>
                            </div>
                        </div>
                        <div class=\"col-md-6\">
                            <picture><img src=\"";
                // line 90
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["photo"] ?? null)), "html", null, true);
                echo "\" alt=\"\"></picture>
                            <div class=\"link\">
                                <div class=\"salida-regreso d-flex align-items-center justify-content-center mb-2\">
                                    <div class=\"trip__salida\" style=\"font-size: 0.8em;\">
                                        <p>Fecha Inicio</p>
                                        <p>";
                // line 95
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_start_date", []), "value", [])), "html", null, true);
                echo "</p>
                                    </div>
                                    <div class=\"trip__regreso\" style=\"font-size: 0.8em;\">
                                        <p>Fecha Fin</p>
                                        <p>";
                // line 99
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_end_date", []), "value", [])), "html", null, true);
                echo "</p>
                                    </div>
                                </div>
                            </div>
                            <div style=\"text-align: right;\"><a href=\"/pages/reservation/";
                // line 103
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_city_origin_cod", []), "value", [])), "html", null, true);
                echo "/";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cityOrigin"] ?? null)), "html", null, true);
                echo "/";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_city_destiny_co", []), "value", [])), "html", null, true);
                echo "/";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cityDestiny"] ?? null)), "html", null, true);
                echo "/";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["now"] ?? null)), "html", null, true);
                echo "/0\"><button class=\"btn dark\">Viaja Ahora!</button></a></div>
                        </div>
                    </div>
                </div>
                ";
            }
            // line 108
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 109
        echo "            </div>
            <div class=\"col-sm-12 col-lg-4\">
                <div class=\"wrapper__side_news\">
                ";
        // line 112
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 113
            echo "                    ";
            $context["photo"] = call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_image", []), "entity", []), "fileuri", []))]);
            // line 114
            echo "                    ";
            $context["dateCreated"] = twig_date_format_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "created", []), "value", [])), "d-m-Y");
            // line 115
            echo "                    ";
            $context["dayCreated"] = twig_date_format_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["dateCreated"] ?? null)), "d");
            // line 116
            echo "                    ";
            $context["monthCreated"] = twig_date_format_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["dateCreated"] ?? null)), "F");
            // line 117
            echo "                    ";
            $context["yearCreated"] = twig_date_format_filter($this->env, $this->sandbox->ensureToStringAllowed(($context["dateCreated"] ?? null)), "Y");
            // line 118
            echo "                    ";
            if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_type", []), "value", []) == "side_news")) {
                // line 119
                echo "                    ";
                $context["cityOrigin"] = "";
                // line 120
                echo "                    ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_city_origin_cod", []), "getSetting", [0 => "allowed_values"], "method"));
                foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                    // line 121
                    echo "                        ";
                    if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_city_origin_cod", []), "value", []) == $context["key"])) {
                        // line 122
                        echo "                        ";
                        $context["cityOrigin"] = $context["value"];
                        // line 123
                        echo "                        ";
                    }
                    // line 124
                    echo "                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 125
                echo "                    ";
                $context["cityDestiny"] = "";
                // line 126
                echo "                    ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_city_destiny_co", []), "getSetting", [0 => "allowed_values"], "method"));
                foreach ($context['_seq'] as $context["key"] => $context["value"]) {
                    // line 127
                    echo "                        ";
                    if (($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_city_destiny_co", []), "value", []) == $context["key"])) {
                        // line 128
                        echo "                        ";
                        $context["cityDestiny"] = $context["value"];
                        // line 129
                        echo "                        ";
                    }
                    // line 130
                    echo "                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 131
                echo "                    <div class=\"side_news\">
                        <div class=\"date\">publicado ";
                // line 132
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["dayCreated"] ?? null)), "html", null, true);
                echo " de ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["monthCreated"] ?? null)), "html", null, true);
                echo ", ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["yearCreated"] ?? null)), "html", null, true);
                echo "</div>
                        <div class=\"title\" style=\"text-align: center;\">";
                // line 133
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_title", []), "value", [])), "html", null, true);
                echo "</div>
                        <picture class=\"\">
                            <img src=\"";
                // line 135
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["photo"] ?? null)), "html", null, true);
                echo "\" alt=\"\">
                        </picture>
                        <div class=\"paragraph\" style=\"text-align: justify;\">
                            <p>";
                // line 138
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_resume", []), "value", [])));
                echo "</p>
                        </div>
                        <div class=\"col-md-12 link\">
                            <div class=\"salida-regreso d-flex align-items-center justify-content-center mb-2\">
                                <div class=\"trip__salida\" style=\"font-size: 0.8em;\">
                                    <p>Fecha Inicio</p>
                                    <p>";
                // line 144
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_start_date", []), "value", [])), "html", null, true);
                echo "</p>
                                </div>
                                <div class=\"trip__regreso\" style=\"font-size: 0.8em;\">
                                    <p>Fecha Fin</p>
                                    <p>";
                // line 148
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_end_date", []), "value", [])), "html", null, true);
                echo "</p>
                                </div>
                            </div>
                            <div style=\"text-align: right;\"><a href=\"/pages/reservation/";
                // line 151
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_city_origin_cod", []), "value", [])), "html", null, true);
                echo "/";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cityOrigin"] ?? null)), "html", null, true);
                echo "/";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_live_today_city_destiny_co", []), "value", [])), "html", null, true);
                echo "/";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["cityDestiny"] ?? null)), "html", null, true);
                echo "/";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["now"] ?? null)), "html", null, true);
                echo "/0\"><button class=\"btn dark\">Viaja Ahora!</button></a></div>
                        </div>
                    </div>
                ";
            }
            // line 155
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 156
        echo "                </div>
            </div>   
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--live-today-list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  447 => 156,  441 => 155,  426 => 151,  420 => 148,  413 => 144,  404 => 138,  398 => 135,  393 => 133,  385 => 132,  382 => 131,  376 => 130,  373 => 129,  370 => 128,  367 => 127,  362 => 126,  359 => 125,  353 => 124,  350 => 123,  347 => 122,  344 => 121,  339 => 120,  336 => 119,  333 => 118,  330 => 117,  327 => 116,  324 => 115,  321 => 114,  318 => 113,  314 => 112,  309 => 109,  303 => 108,  287 => 103,  280 => 99,  273 => 95,  265 => 90,  258 => 86,  251 => 82,  243 => 81,  240 => 80,  234 => 79,  231 => 78,  228 => 77,  225 => 76,  220 => 75,  217 => 74,  211 => 73,  208 => 72,  205 => 71,  202 => 70,  197 => 69,  194 => 68,  192 => 67,  178 => 64,  173 => 62,  165 => 57,  158 => 53,  149 => 47,  145 => 46,  137 => 45,  134 => 44,  128 => 43,  125 => 42,  122 => 41,  119 => 40,  114 => 39,  111 => 38,  105 => 37,  102 => 36,  99 => 35,  96 => 34,  91 => 33,  88 => 32,  86 => 31,  83 => 30,  80 => 29,  77 => 28,  74 => 27,  71 => 26,  68 => 25,  64 => 24,  57 => 19,  55 => 18,);
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
{% set now = \"now\"|date(\"d-m-Y\") %}
<div class=\"wrapper__body pb-4\">
    <h3 class=\"wrapper__lead\">Ultimas noticias</h3>
    <div class=\"wrapper__container container-fluid mb-4\">
        <div class=\"row\">
            <div class=\"col-sm-12 col-lg-8\">
                {% for row in rows %}
                {% set photo = file_url(row['content']['#row']._entity.field_live_today_image.entity.fileuri) %}
                {% set dateCreated = row['content']['#row']._entity.created.value|date(\"d-m-Y\") %}
                {% set dayCreated = dateCreated|date('d') %}
                {% set monthCreated = dateCreated|date('F') %}
                {% set yearCreated = dateCreated|date('Y') %}

                {% if row['content']['#row']._entity.field_live_today_type.value == 'big_news' %}
                {% set cityOrigin = '' %}
                {% for key,value in row['content']['#row']._entity.field_live_today_city_origin_cod.getSetting('allowed_values') %}
                    {% if(row['content']['#row']._entity.field_live_today_city_origin_cod.value == key) %}
                    {% set cityOrigin = value %}
                    {% endif %}
                {% endfor %}
                {% set cityDestiny = '' %}
                {% for key,value in row['content']['#row']._entity.field_live_today_city_destiny_co.getSetting('allowed_values') %}
                    {% if(row['content']['#row']._entity.field_live_today_city_destiny_co.value == key) %}
                    {% set cityDestiny = value %}
                    {% endif %}
                {% endfor %}
                <div class=\"big_news\">
                    <div class=\"date\">publicado {{ dayCreated }} de {{ monthCreated }}, {{ yearCreated }}</div>
                    <div class=\"title\">{{ row['content']['#row']._entity.field_live_today_title.value }}</div>
                    <picture><img src=\"{{ photo }}\" alt=\"\"></picture>
                    <div class=\"row\">
                        <div class=\"col-md-12 link\">
                            <div class=\"salida-regreso d-flex align-items-center justify-content-center mb-2\">
                                <div class=\"trip__salida\" style=\"font-size: 0.8em;\">
                                    <p>Fecha Inicio</p>
                                    <p>{{ row['content']['#row']._entity.field_live_today_start_date.value }}</p>
                                </div>
                                <div class=\"trip__regreso\" style=\"font-size: 0.8em;\">
                                    <p>Fecha Fin</p>
                                    <p>{{ row['content']['#row']._entity.field_live_today_end_date.value }}</p>
                                </div>
                            </div>
                        </div>
                        <div class=\"col-md-12 paragraph\">
                            <p>{{ row['content']['#row']._entity.field_live_today_resume.value|raw }}</p>
                        </div>
                        <div><a href=\"/pages/reservation/{{ row['content']['#row']._entity.field_live_today_city_origin_cod.value }}/{{ cityOrigin }}/{{ row['content']['#row']._entity.field_live_today_city_destiny_co.value }}/{{ cityDestiny }}/{{ now }}/0\"><button class=\"btn dark\">Viaja Ahora!</button></a></div>
                    </div>
                </div>
                {% elseif row['content']['#row']._entity.field_live_today_type.value == 'regular_news' %}
                {% set cityOrigin = '' %}
                {% for key,value in row['content']['#row']._entity.field_live_today_city_origin_cod.getSetting('allowed_values') %}
                    {% if(row['content']['#row']._entity.field_live_today_city_origin_cod.value == key) %}
                    {% set cityOrigin = value %}
                    {% endif %}
                {% endfor %}
                {% set cityDestiny = '' %}
                {% for key,value in row['content']['#row']._entity.field_live_today_city_destiny_co.getSetting('allowed_values') %}
                    {% if(row['content']['#row']._entity.field_live_today_city_destiny_co.value == key) %}
                    {% set cityDestiny = value %}
                    {% endif %}
                {% endfor %}
                <div class=\"regular_news\">
                    <div class=\"date\">publicado {{ dayCreated }} de {{ monthCreated }}, {{ yearCreated }}</div>
                    <div class=\"title\">{{ row['content']['#row']._entity.field_live_today_title.value }}</div>
                    <div class=\"row\">
                        <div class=\"col-md-6\">
                            <div class=\"paragraph\">
                                <p>{{ row['content']['#row']._entity.field_live_today_resume.value|raw }}</p>
                            </div>
                        </div>
                        <div class=\"col-md-6\">
                            <picture><img src=\"{{ photo }}\" alt=\"\"></picture>
                            <div class=\"link\">
                                <div class=\"salida-regreso d-flex align-items-center justify-content-center mb-2\">
                                    <div class=\"trip__salida\" style=\"font-size: 0.8em;\">
                                        <p>Fecha Inicio</p>
                                        <p>{{ row['content']['#row']._entity.field_live_today_start_date.value }}</p>
                                    </div>
                                    <div class=\"trip__regreso\" style=\"font-size: 0.8em;\">
                                        <p>Fecha Fin</p>
                                        <p>{{ row['content']['#row']._entity.field_live_today_end_date.value }}</p>
                                    </div>
                                </div>
                            </div>
                            <div style=\"text-align: right;\"><a href=\"/pages/reservation/{{ row['content']['#row']._entity.field_live_today_city_origin_cod.value }}/{{ cityOrigin }}/{{ row['content']['#row']._entity.field_live_today_city_destiny_co.value }}/{{ cityDestiny }}/{{ now }}/0\"><button class=\"btn dark\">Viaja Ahora!</button></a></div>
                        </div>
                    </div>
                </div>
                {% endif %}
                {% endfor %}
            </div>
            <div class=\"col-sm-12 col-lg-4\">
                <div class=\"wrapper__side_news\">
                {% for row in rows %}
                    {% set photo = file_url(row['content']['#row']._entity.field_live_today_image.entity.fileuri) %}
                    {% set dateCreated = row['content']['#row']._entity.created.value|date(\"d-m-Y\") %}
                    {% set dayCreated = dateCreated|date('d') %}
                    {% set monthCreated = dateCreated|date('F') %}
                    {% set yearCreated = dateCreated|date('Y') %}
                    {% if row['content']['#row']._entity.field_live_today_type.value == 'side_news' %}
                    {% set cityOrigin = '' %}
                    {% for key,value in row['content']['#row']._entity.field_live_today_city_origin_cod.getSetting('allowed_values') %}
                        {% if(row['content']['#row']._entity.field_live_today_city_origin_cod.value == key) %}
                        {% set cityOrigin = value %}
                        {% endif %}
                    {% endfor %}
                    {% set cityDestiny = '' %}
                    {% for key,value in row['content']['#row']._entity.field_live_today_city_destiny_co.getSetting('allowed_values') %}
                        {% if(row['content']['#row']._entity.field_live_today_city_destiny_co.value == key) %}
                        {% set cityDestiny = value %}
                        {% endif %}
                    {% endfor %}
                    <div class=\"side_news\">
                        <div class=\"date\">publicado {{ dayCreated }} de {{ monthCreated }}, {{ yearCreated }}</div>
                        <div class=\"title\" style=\"text-align: center;\">{{ row['content']['#row']._entity.field_live_today_title.value }}</div>
                        <picture class=\"\">
                            <img src=\"{{ photo }}\" alt=\"\">
                        </picture>
                        <div class=\"paragraph\" style=\"text-align: justify;\">
                            <p>{{ row['content']['#row']._entity.field_live_today_resume.value|raw }}</p>
                        </div>
                        <div class=\"col-md-12 link\">
                            <div class=\"salida-regreso d-flex align-items-center justify-content-center mb-2\">
                                <div class=\"trip__salida\" style=\"font-size: 0.8em;\">
                                    <p>Fecha Inicio</p>
                                    <p>{{ row['content']['#row']._entity.field_live_today_start_date.value }}</p>
                                </div>
                                <div class=\"trip__regreso\" style=\"font-size: 0.8em;\">
                                    <p>Fecha Fin</p>
                                    <p>{{ row['content']['#row']._entity.field_live_today_end_date.value }}</p>
                                </div>
                            </div>
                            <div style=\"text-align: right;\"><a href=\"/pages/reservation/{{ row['content']['#row']._entity.field_live_today_city_origin_cod.value }}/{{ cityOrigin }}/{{ row['content']['#row']._entity.field_live_today_city_destiny_co.value }}/{{ cityDestiny }}/{{ now }}/0\"><button class=\"btn dark\">Viaja Ahora!</button></a></div>
                        </div>
                    </div>
                {% endif %}
                {% endfor %}
                </div>
            </div>   
        </div>
    </div>
</div>", "themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--live-today-list.html.twig", "/var/www/web/themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--live-today-list.html.twig");
    }
}
