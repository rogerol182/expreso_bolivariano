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

/* themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--map-agencies-list-home.html.twig */
class __TwigTemplate_d8818c8b7d34b8b2f82f84d343108d2d8bc1e7b242b2704c4bcd2aea0c37eae7 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 9, "for" => 10, "if" => 11];
        $filters = ["escape" => 12, "raw" => 12, "merge" => 13, "sort" => 13, "split" => 69];
        $functions = ["active_theme_path" => 51];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'for', 'if'],
                ['escape', 'raw', 'merge', 'sort', 'split'],
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
        // line 1
        echo "<div id=\"rutas\" class=\"mt-0\">
    <div class=\"buscador container-fluid\">
        <div class=\"row\">
            <div class=\"col col-4 col-md-6 text-center big_text\">Mapa de sucursales</div>
            <div class=\"col-sm-3 col-md-2\">
                <p>Departamento</p>
                <select id=\"department_filter\">
                    <option value=\"0\">-Todos-</option>
                ";
        // line 9
        $context["newDepts"] = [];
        // line 10
        echo "                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["depts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["department"]) {
            // line 11
            echo "                    ";
            if (!twig_in_filter($this->getAttribute($this->getAttribute($context["department"], 0.0, []), "value", []), ($context["newDepts"] ?? null))) {
                // line 12
                echo "                        <option value=\"";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($context["department"], 0.0, []), "value", [])), "html", null, true);
                echo "\">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($context["department"], 0.0, []), "value", [])));
                echo "</option>
                    ";
                // line 13
                $context["newDepts"] = twig_array_merge(twig_sort_filter($this->sandbox->ensureToStringAllowed(($context["newDepts"] ?? null))), [0 => $this->getAttribute($this->getAttribute($context["department"], 0.0, []), "value", [])]);
                // line 14
                echo "                    ";
            }
            echo "    
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['department'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 16
        echo "                </select>
            </div>
            <div class=\"col-sm-3 col-md-2 destino\">
                <p>Ciudad</p>
                <select id=\"city_filter\" style=\"display: none;\">
                    <option value=\"0\">-Todas-</option>
                ";
        // line 22
        $context["newCities"] = [];
        // line 23
        echo "                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["cities"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["city"]) {
            // line 24
            echo "                    ";
            if (!twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($context["city"], 1.0, []), 0, []), "value", []), ($context["newCities"] ?? null))) {
                // line 25
                echo "                        <option value=\"";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($context["city"], 0.0, []), 0, []), "value", [])), "html", null, true);
                echo "\">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($context["city"], 1.0, []), 0, []), "value", [])));
                echo "</option>
                    ";
                // line 26
                $context["newCities"] = twig_array_merge(twig_sort_filter($this->sandbox->ensureToStringAllowed(($context["newCities"] ?? null))), [0 => $this->getAttribute($this->getAttribute($this->getAttribute($context["city"], 1.0, []), 0, []), "value", [])]);
                // line 27
                echo "                    ";
            }
            echo "    
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['city'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "                </select>
                <div id=\"div_city_filter_department\" style=\"display: none;\">
                    <select id=\"city_filter_department\">
                        <option value=\"0\">-Todas-</option>
                    </select>
                </div>    
            </div>
            <div class=\"col col-sm-3 col-md-2 text-center big_text\"><button id=\"filter_agencies\" class=\"btn btn--secondary\" style=\"font-size: 18px;\">Filtrar</button></div>
            
        </div>
    </div>
    <div id=\"map_agencies\" style=\"height: 800px;\"></div>
</div>
<div class=\"division\"></div>
<script>
  var map;
  var markers = [];
  function initMap() {
    map = new google.maps.Map(
            document.getElementById('map_agencies'),
            {center: new google.maps.LatLng(4.010614, -75.975973), zoom: 6, disableDefaultUI: true});

    var iconBase = '";
        // line 51
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null)), "html", null, true);
        echo "/";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getActiveThemePath(), "html", null, true);
        echo "/images/misc/';

    var icons = {
      M: {
        icon: iconBase + 'pin_blue.png'
      },
      A: {
        icon: iconBase + 'pin_map.png'
      },
      T: {
        icon: iconBase + 'pin_map.png'
      }
    };
      
    var features = [
      
        ";
        // line 67
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["locations"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["items"]) {
            // line 68
            echo "        ";
            $context["i"] = 0;
            // line 69
            echo "        ";
            $context["coords"] = twig_split_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($context["items"], 0.0, []), 0, []), "value", [])), ",");
            // line 70
            echo "        ";
            $context["lat"] = $this->getAttribute(($context["coords"] ?? null), 0, [], "array");
            // line 71
            echo "        ";
            $context["lon"] = $this->getAttribute(($context["coords"] ?? null), 1, [], "array");
            // line 72
            echo "        ";
            $context["mapType"] = $this->getAttribute($this->getAttribute($this->getAttribute($context["items"], 1.0, []), 0, []), "value", []);
            // line 73
            echo "        ";
            $context["nameCity"] = $this->getAttribute($this->getAttribute($this->getAttribute($context["items"], 2.0, []), 0, []), "value", []);
            // line 74
            echo "        ";
            $context["nameDepartment"] = $this->getAttribute($this->getAttribute($this->getAttribute($context["items"], 3.0, []), 0, []), "value", []);
            // line 75
            echo "        ";
            $context["urlAgency"] = $this->getAttribute($this->getAttribute($this->getAttribute($context["items"], 4.0, []), 0, []), "value", []);
            // line 76
            echo "        {
            position: new google.maps.LatLng( ";
            // line 77
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["lat"] ?? null)), "html", null, true);
            echo ", ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["lon"] ?? null)), "html", null, true);
            echo " ),
            type: '";
            // line 78
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["mapType"] ?? null)), "html", null, true);
            echo "',
            nameCity: '";
            // line 79
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["nameCity"] ?? null)), "html", null, true);
            echo "',
            nameDepartment: '";
            // line 80
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["nameDepartment"] ?? null)), "html", null, true);
            echo "',
            urlAgency: '";
            // line 81
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["urlAgency"] ?? null)), "html", null, true);
            echo "',
        },
        ";
            // line 83
            $context["i"] = (($context["i"] ?? null) + 1);
            // line 84
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['items'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 85
        echo "      
    ];

    var marker, i;
            var infowindow = new google.maps.InfoWindow();
    
    
            google.maps.event.addListener(map, 'click', function() {
                infowindow.close();
            });
    
    // Create markers.
    for (var i = 0; i < features.length; i++) {
      

        marker = new google.maps.Marker({
                    position: features[i].position,
                    map: map,
                    icon: icons[features[i].type].icon
                });
    
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        var html = '<div class=\"row\" style=\"margin-left: 0; margin-right: 0;\"><div class=\"col-md-3 text-right\" style=\"padding: 0;\"><img src=\"/themes/bootstrap_barrio/subtheme/images/misc/map-icon-info.svg\" style=\"width: 35%;\"></div><div class=\"col-md-6 text-center\" style=\"padding: 0; padding-top: 8px;\"><span style=\"color: #1B1464;font-size: 15px;\">'+features[i].nameDepartment+' - '+features[i].nameCity+'</span></div><div class=\"col-md-3 text-left\" style=\"padding: 0; padding-top: 8px;\"><button class=\"btn w-30 p-30 dark\"><a href=\"'+features[i].urlAgency+'\" style=\"color: #fff;\">Ver</a></button></div></div>';
                        infowindow.setContent(html);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
        
                markers.push(marker);
      
    };

  }
</script>

<!-- Replace the value of the key parameter with your own API key. -->
<script async defer src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyAyWmzmaeGyLXQpJmbE_oUHxSwOxdS1Xtk&callback=initMap\">
</script>";
    }

    public function getTemplateName()
    {
        return "themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--map-agencies-list-home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  236 => 85,  230 => 84,  228 => 83,  223 => 81,  219 => 80,  215 => 79,  211 => 78,  205 => 77,  202 => 76,  199 => 75,  196 => 74,  193 => 73,  190 => 72,  187 => 71,  184 => 70,  181 => 69,  178 => 68,  174 => 67,  153 => 51,  129 => 29,  120 => 27,  118 => 26,  111 => 25,  108 => 24,  103 => 23,  101 => 22,  93 => 16,  84 => 14,  82 => 13,  75 => 12,  72 => 11,  67 => 10,  65 => 9,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<div id=\"rutas\" class=\"mt-0\">
    <div class=\"buscador container-fluid\">
        <div class=\"row\">
            <div class=\"col col-4 col-md-6 text-center big_text\">Mapa de sucursales</div>
            <div class=\"col-sm-3 col-md-2\">
                <p>Departamento</p>
                <select id=\"department_filter\">
                    <option value=\"0\">-Todos-</option>
                {% set newDepts = [] %}
                {% for department in depts %}
                    {% if department.0.0.value not in newDepts %}
                        <option value=\"{{ department.0.0.value }}\">{{ department.0.0.value|raw }}</option>
                    {% set newDepts = newDepts|sort|merge([department.0.0.value]) %}
                    {% endif %}    
                {% endfor %}
                </select>
            </div>
            <div class=\"col-sm-3 col-md-2 destino\">
                <p>Ciudad</p>
                <select id=\"city_filter\" style=\"display: none;\">
                    <option value=\"0\">-Todas-</option>
                {% set newCities = [] %}
                {% for city in cities %}
                    {% if city.1.0.0.value not in newCities %}
                        <option value=\"{{ city.0.0.0.value }}\">{{ city.1.0.0.value|raw }}</option>
                    {% set newCities = newCities|sort|merge([city.1.0.0.value]) %}
                    {% endif %}    
                {% endfor %}
                </select>
                <div id=\"div_city_filter_department\" style=\"display: none;\">
                    <select id=\"city_filter_department\">
                        <option value=\"0\">-Todas-</option>
                    </select>
                </div>    
            </div>
            <div class=\"col col-sm-3 col-md-2 text-center big_text\"><button id=\"filter_agencies\" class=\"btn btn--secondary\" style=\"font-size: 18px;\">Filtrar</button></div>
            
        </div>
    </div>
    <div id=\"map_agencies\" style=\"height: 800px;\"></div>
</div>
<div class=\"division\"></div>
<script>
  var map;
  var markers = [];
  function initMap() {
    map = new google.maps.Map(
            document.getElementById('map_agencies'),
            {center: new google.maps.LatLng(4.010614, -75.975973), zoom: 6, disableDefaultUI: true});

    var iconBase = '{{ base_path }}/{{ active_theme_path() }}/images/misc/';

    var icons = {
      M: {
        icon: iconBase + 'pin_blue.png'
      },
      A: {
        icon: iconBase + 'pin_map.png'
      },
      T: {
        icon: iconBase + 'pin_map.png'
      }
    };
      
    var features = [
      
        {% for items in locations %}
        {% set i = 0 %}
        {% set coords  = items.0.0.0.value|split(',') %}
        {% set lat = coords[0] %}
        {% set lon = coords[1] %}
        {% set mapType = items.1.0.0.value %}
        {% set nameCity = items.2.0.0.value %}
        {% set nameDepartment = items.3.0.0.value %}
        {% set urlAgency = items.4.0.0.value %}
        {
            position: new google.maps.LatLng( {{ lat }}, {{ lon }} ),
            type: '{{ mapType }}',
            nameCity: '{{ nameCity }}',
            nameDepartment: '{{ nameDepartment }}',
            urlAgency: '{{ urlAgency }}',
        },
        {% set i = i+1 %}
        {% endfor %}
      
    ];

    var marker, i;
            var infowindow = new google.maps.InfoWindow();
    
    
            google.maps.event.addListener(map, 'click', function() {
                infowindow.close();
            });
    
    // Create markers.
    for (var i = 0; i < features.length; i++) {
      

        marker = new google.maps.Marker({
                    position: features[i].position,
                    map: map,
                    icon: icons[features[i].type].icon
                });
    
                google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        var html = '<div class=\"row\" style=\"margin-left: 0; margin-right: 0;\"><div class=\"col-md-3 text-right\" style=\"padding: 0;\"><img src=\"/themes/bootstrap_barrio/subtheme/images/misc/map-icon-info.svg\" style=\"width: 35%;\"></div><div class=\"col-md-6 text-center\" style=\"padding: 0; padding-top: 8px;\"><span style=\"color: #1B1464;font-size: 15px;\">'+features[i].nameDepartment+' - '+features[i].nameCity+'</span></div><div class=\"col-md-3 text-left\" style=\"padding: 0; padding-top: 8px;\"><button class=\"btn w-30 p-30 dark\"><a href=\"'+features[i].urlAgency+'\" style=\"color: #fff;\">Ver</a></button></div></div>';
                        infowindow.setContent(html);
                        infowindow.open(map, marker);
                    }
                })(marker, i));
        
                markers.push(marker);
      
    };

  }
</script>

<!-- Replace the value of the key parameter with your own API key. -->
<script async defer src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyAyWmzmaeGyLXQpJmbE_oUHxSwOxdS1Xtk&callback=initMap\">
</script>", "themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--map-agencies-list-home.html.twig", "/var/www/web/themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--map-agencies-list-home.html.twig");
    }
}
