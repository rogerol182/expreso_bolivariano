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

/* modules/custom/expreso_bolivariano_pages/templates/page-agencies.html.twig */
class __TwigTemplate_341be50c23316f6ec7c52f37c4b5bf9c69a5c46ee2aac65774a3e0d2caba03d9 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 15, "for" => 16, "if" => 17];
        $filters = ["sort" => 16, "escape" => 18, "raw" => 18, "merge" => 19, "split" => 77];
        $functions = ["active_theme_path" => 59];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'for', 'if'],
                ['sort', 'escape', 'raw', 'merge', 'split'],
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
        echo "<div class=\"wrapper__top bg-image\">
    <img src=\"/sites/default/files/inline-images/agencies.jpg\" alt=\"\" class=\"\">
    <div class=\"wrapper__topwrap\">
        <h2 class=\"wrapper__title wrapper__title--cities\">Agencias</h2>
    </div>
</div>
<div id=\"rutas\" class=\"mt-0\">
    <div class=\"buscador container-fluid\">
        <div class=\"row\">
            <div class=\"col col-4 col-md-6 text-center big_text\">Mapa de sucursales</div>
            <div class=\"col-sm-3 col-md-2\">
                <p>Departamento</p>
                <select id=\"department_filter\">
                    <option value=\"0\">-Todos-</option>
                ";
        // line 15
        $context["newDepts"] = [];
        // line 16
        echo "                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_sort_filter(($context["depts"] ?? null)));
        foreach ($context['_seq'] as $context["_key"] => $context["department"]) {
            // line 17
            echo "                    ";
            if (!twig_in_filter($this->getAttribute($this->getAttribute($context["department"], 0.0, []), "value", []), ($context["newDepts"] ?? null))) {
                // line 18
                echo "                        <option value=\"";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($context["department"], 0.0, []), "value", [])), "html", null, true);
                echo "\">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($context["department"], 0.0, []), "value", [])));
                echo "</option>
                    ";
                // line 19
                $context["newDepts"] = twig_array_merge(twig_sort_filter($this->sandbox->ensureToStringAllowed(($context["newDepts"] ?? null))), [0 => $this->getAttribute($this->getAttribute($context["department"], 0.0, []), "value", [])]);
                // line 20
                echo "                    ";
            }
            echo "    
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['department'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "                </select>
            </div>
            <div class=\"col-sm-3 col-md-2 destino\">
                <p>Ciudad</p>
                <select id=\"city_filter\" style=\"display: none;\">
                    <option value=\"0\">-Todas-</option>
                ";
        // line 28
        $context["newCities"] = [];
        // line 29
        echo "                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_sort_filter(($context["cities"] ?? null)));
        foreach ($context['_seq'] as $context["_key"] => $context["city"]) {
            // line 30
            echo "                    ";
            if (!twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($context["city"], 1.0, []), 0, []), "value", []), ($context["newCities"] ?? null))) {
                // line 31
                echo "                        <option value=\"";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($context["city"], 0.0, []), 0, []), "value", [])), "html", null, true);
                echo "\">";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($context["city"], 1.0, []), 0, []), "value", [])));
                echo "</option>
                    ";
                // line 32
                $context["newCities"] = twig_array_merge(twig_sort_filter($this->sandbox->ensureToStringAllowed(($context["newCities"] ?? null))), [0 => $this->getAttribute($this->getAttribute($this->getAttribute($context["city"], 1.0, []), 0, []), "value", [])]);
                // line 33
                echo "                    ";
            }
            echo "    
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['city'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
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
";
        // line 48
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["blockAgencies"] ?? null)), "html", null, true);
        echo "
";
        // line 49
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["blockMultiservices"] ?? null)), "html", null, true);
        echo "
<!-- Begins Map -->
<script>
  var map;
  var markers = [];
  function initMap() {
    map = new google.maps.Map(
            document.getElementById('map_agencies'),
            {center: new google.maps.LatLng(4.010614, -75.975973), zoom: 6, disableDefaultUI: true});

    var iconBase = '";
        // line 59
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
        // line 75
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["locations"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["items"]) {
            // line 76
            echo "        ";
            $context["i"] = 0;
            // line 77
            echo "        ";
            $context["coords"] = twig_split_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($context["items"], 0.0, []), 0, []), "value", [])), ",");
            // line 78
            echo "        ";
            $context["lat"] = $this->getAttribute(($context["coords"] ?? null), 0, [], "array");
            // line 79
            echo "        ";
            $context["lon"] = $this->getAttribute(($context["coords"] ?? null), 1, [], "array");
            // line 80
            echo "        ";
            $context["mapType"] = $this->getAttribute($this->getAttribute($this->getAttribute($context["items"], 1.0, []), 0, []), "value", []);
            // line 81
            echo "        ";
            $context["nameCity"] = $this->getAttribute($this->getAttribute($this->getAttribute($context["items"], 2.0, []), 0, []), "value", []);
            // line 82
            echo "        ";
            $context["nameDepartment"] = $this->getAttribute($this->getAttribute($this->getAttribute($context["items"], 3.0, []), 0, []), "value", []);
            // line 83
            echo "        ";
            $context["urlAgency"] = $this->getAttribute($this->getAttribute($this->getAttribute($context["items"], 4.0, []), 0, []), "value", []);
            // line 84
            echo "        {
            position: new google.maps.LatLng( ";
            // line 85
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["lat"] ?? null)), "html", null, true);
            echo ", ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["lon"] ?? null)), "html", null, true);
            echo " ),
            type: '";
            // line 86
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["mapType"] ?? null)), "html", null, true);
            echo "',
            nameCity: '";
            // line 87
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["nameCity"] ?? null)), "html", null, true);
            echo "',
            nameDepartment: '";
            // line 88
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["nameDepartment"] ?? null)), "html", null, true);
            echo "',
            urlAgency: '";
            // line 89
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["urlAgency"] ?? null)), "html", null, true);
            echo "',
        },
        ";
            // line 91
            $context["i"] = (($context["i"] ?? null) + 1);
            // line 92
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['items'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 93
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
        return "modules/custom/expreso_bolivariano_pages/templates/page-agencies.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  250 => 93,  244 => 92,  242 => 91,  237 => 89,  233 => 88,  229 => 87,  225 => 86,  219 => 85,  216 => 84,  213 => 83,  210 => 82,  207 => 81,  204 => 80,  201 => 79,  198 => 78,  195 => 77,  192 => 76,  188 => 75,  167 => 59,  154 => 49,  150 => 48,  135 => 35,  126 => 33,  124 => 32,  117 => 31,  114 => 30,  109 => 29,  107 => 28,  99 => 22,  90 => 20,  88 => 19,  81 => 18,  78 => 17,  73 => 16,  71 => 15,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"wrapper__top bg-image\">
    <img src=\"/sites/default/files/inline-images/agencies.jpg\" alt=\"\" class=\"\">
    <div class=\"wrapper__topwrap\">
        <h2 class=\"wrapper__title wrapper__title--cities\">Agencias</h2>
    </div>
</div>
<div id=\"rutas\" class=\"mt-0\">
    <div class=\"buscador container-fluid\">
        <div class=\"row\">
            <div class=\"col col-4 col-md-6 text-center big_text\">Mapa de sucursales</div>
            <div class=\"col-sm-3 col-md-2\">
                <p>Departamento</p>
                <select id=\"department_filter\">
                    <option value=\"0\">-Todos-</option>
                {% set newDepts = [] %}
                {% for department in depts|sort %}
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
                {% for city in cities|sort %}
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
{{ blockAgencies }}
{{ blockMultiservices }}
<!-- Begins Map -->
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
</script>", "modules/custom/expreso_bolivariano_pages/templates/page-agencies.html.twig", "/var/www/web/modules/custom/expreso_bolivariano_pages/templates/page-agencies.html.twig");
    }
}
