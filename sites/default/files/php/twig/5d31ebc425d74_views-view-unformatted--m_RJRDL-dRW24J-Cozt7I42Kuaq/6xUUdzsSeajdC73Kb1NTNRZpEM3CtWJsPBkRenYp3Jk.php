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

/* themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--map-route-list.html.twig */
class __TwigTemplate_79028d6a8dda6aced0c8f606c33ffb9f7e75e3d77afae04c9922236cebf85e82 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["for" => 18, "set" => 19, "if" => 56];
        $filters = ["split" => 19, "raw" => 35, "sort" => 55, "escape" => 58, "lower" => 58, "merge" => 59, "length" => 89, "first" => 107];
        $functions = ["active_theme_path" => 101];

        try {
            $this->sandbox->checkSecurity(
                ['for', 'set', 'if'],
                ['split', 'raw', 'sort', 'escape', 'lower', 'merge', 'length', 'first'],
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
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 19
            $context["originCoords"] = twig_split_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_coords_origin", []), "value", [])), ",");
            // line 20
            $context["destinyCoords"] = twig_split_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_coords_destiny", []), "value", [])), ",");
            // line 21
            $context["origin"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_city_destiny", []), "value", []);
            // line 22
            $context["destiny"] = $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_city_origin", []), "value", []);
            // line 23
            echo "
";
            // line 24
            $context["lat1"] = $this->getAttribute(($context["originCoords"] ?? null), 0, [], "array");
            // line 25
            $context["lon1"] = $this->getAttribute(($context["originCoords"] ?? null), 1, [], "array");
            // line 26
            $context["lat2"] = $this->getAttribute(($context["destinyCoords"] ?? null), 0, [], "array");
            // line 27
            $context["lon2"] = $this->getAttribute(($context["destinyCoords"] ?? null), 1, [], "array");
            // line 28
            echo "


<section class=\"wrapper__100\">
    <div id=\"rutas\" class=\"\">
        <div class=\"buscador container-fluid\">
            <!--<div class=\"row\">
                <div class=\"col-md-12 col-lg-12 text-center big_text\">";
            // line 35
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_title", []), "value", [])));
            echo "</div>
                <div class=\"col-md-12 col-lg-3 origen mb-2\">
                    <p>Origen</p>
                    <input type=\"text\" value=\"Bogotá\">
                </div>
                <div class=\"col-md-12 col-lg-3 ubicacion mb-4\">
                    <img src=\"images/misc/target.png\" alt=\"\"> Cerca de mi ubicación
                </div>
                <div class=\"col-md-12 col-lg-3 destino\">
                    <p>Destino</p>
                    <input type=\"text\" value=\"Cali\">
                </div>
            </div> -->
            <div class=\"row\">
              <div class=\"col col-4 col-md-6 text-center big_text\">";
            // line 49
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_title", []), "value", [])));
            echo "</div>
              <div class=\"col-sm-3 col-md-2\">
                  <p>Origen</p>
                  <select id=\"origin_filter\">
                      <option value=\"0\">-Todas-</option>
                  ";
            // line 54
            $context["newCities"] = [];
            // line 55
            echo "                  ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_sort_filter(($context["cities"] ?? null)));
            foreach ($context['_seq'] as $context["_key"] => $context["city"]) {
                // line 56
                echo "                      ";
                if (!twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($context["city"], 0.0, []), 0, []), "value", []), ($context["newCities"] ?? null))) {
                    // line 57
                    echo "                      ";
                    $context["cityOrigin"] = twig_split_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($context["city"], 0.0, []), 0, []), "value", [])), ",");
                    // line 58
                    echo "                          <option value=\"";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_lower_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["cityOrigin"] ?? null), 0, [], "array"))), "html", null, true);
                    echo "\">";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["cityOrigin"] ?? null), 0, [], "array")), "html", null, true);
                    echo "</option>
                      ";
                    // line 59
                    $context["newCities"] = twig_array_merge(twig_sort_filter($this->sandbox->ensureToStringAllowed(($context["newCities"] ?? null))), [0 => $this->getAttribute($this->getAttribute($this->getAttribute($context["city"], 0.0, []), 0, []), "value", [])]);
                    // line 60
                    echo "                      ";
                }
                echo "    
                  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['city'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 62
            echo "                  </select>
              </div>
              <div class=\"col-sm-3 col-md-2 destino\">
                  <p>Destino</p>
                  <select id=\"destiny_filter\">
                      <option value=\"0\">-Todas-</option>
                  ";
            // line 68
            $context["newCities"] = [];
            // line 69
            echo "                  ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_sort_filter(($context["cities"] ?? null)));
            foreach ($context['_seq'] as $context["_key"] => $context["city"]) {
                // line 70
                echo "                      ";
                if (!twig_in_filter($this->getAttribute($this->getAttribute($this->getAttribute($context["city"], 1.1, []), 0, []), "value", []), ($context["newCities"] ?? null))) {
                    // line 71
                    echo "                      ";
                    $context["cityDestiny"] = twig_split_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($context["city"], 1.1, []), 0, []), "value", [])), ",");
                    // line 72
                    echo "                          <option value=\"";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, twig_lower_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["cityDestiny"] ?? null), 0, [], "array"))), "html", null, true);
                    echo "\">";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["cityDestiny"] ?? null), 0, [], "array")), "html", null, true);
                    echo "</option>
                      ";
                    // line 73
                    $context["newCities"] = twig_array_merge(twig_sort_filter($this->sandbox->ensureToStringAllowed(($context["newCities"] ?? null))), [0 => $this->getAttribute($this->getAttribute($this->getAttribute($context["city"], 1.1, []), 0, []), "value", [])]);
                    // line 74
                    echo "                      ";
                }
                echo "    
                  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['city'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 76
            echo "                  </select>    
              </div>
              <div class=\"col col-sm-3 col-md-2 text-center big_text\"><button id=\"filter_routes\" class=\"btn btn--secondary\" style=\"font-size: 18px;\">Filtrar</button></div>
              
          </div>
        </div>
        <div class=\"\">
            <div id=\"map_route\" class=\"map_route\" style=\"height: 800px;\"></div>
        </div>
    </div> 
</section>
<div class=\"w-100\">
    <div class=\"container-fluid bg-light-blue\">
        ";
            // line 89
            $context["count"] = twig_length_filter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_transits", [])));
            // line 90
            echo "        ";
            if ((($context["count"] ?? null) <= 4)) {
                // line 91
                echo "        ";
                $context["count"] = (($context["count"] ?? null) * 2);
                // line 92
                echo "        <div class=\"container mb-4 pb-4\">
            <div class=\"row pt-4\">
                <div class=\"col-lg-4 pt-4\">
                    <h3>Ruta: ";
                // line 95
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_title", []), "value", [])));
                echo "</h3>
                    <ul class=\"mt-4\">
                        <li><b>Distancia: </b>";
                // line 97
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_distance", []), "value", [])));
                echo "</li>
                        <li><b>Tiempo estimado: </b>";
                // line 98
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_time_estimated", []), "value", [])));
                echo "</li>
                        <li><b>Estado de la vía: </b>";
                // line 99
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_status", []), "value", [])), "html", null, true);
                echo "</li>
                    </ul>
                    <h6><img src=\"";
                // line 101
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null)), "html", null, true);
                echo "/";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getActiveThemePath(), "html", null, true);
                echo "/images/misc/pin_near.png\"> Agencias cercanas a la ruta enunciada. <br> No significa parada en la agencia.</h6>
                </div>

                <div class=\"col-lg-";
                // line 104
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["count"] ?? null)), "html", null, true);
                echo " pt-4\">
                    <div id=\"timeline-rutas\">
                        <ul class=\"d-flex w-100 justify-content-between\">
                            ";
                // line 107
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_transits", []));
                foreach ($context['_seq'] as $context["key"] => $context["item"]) {
                    if ((twig_first($this->env, $context["key"]) != "#")) {
                        // line 108
                        echo "                            <li>
                                <span></span>
                                <div class=\"info\">
                                   ";
                        // line 111
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "value", [])));
                        echo "
                                </div>
                            </li>
                            ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 115
                echo "                        </ul>
                    </div>
                </div>
            </div>
        </div>
        ";
            } elseif (((            // line 120
($context["count"] ?? null) > 4) && (($context["count"] ?? null) < 6))) {
                // line 121
                echo "        ";
                $context["count"] = 8;
                // line 122
                echo "        <div class=\"container mb-4 pb-4\">
            <div class=\"row pt-4\">
                <div class=\"col-lg-4 pt-4\">
                    <h3>Ruta: ";
                // line 125
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_title", []), "value", [])));
                echo "</h3>
                    <ul class=\"mt-4\">
                        <li><b>Distancia: </b>";
                // line 127
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_distance", []), "value", [])));
                echo "</li>
                        <li><b>Tiempo estimado: </b>";
                // line 128
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_time_estimated", []), "value", [])));
                echo "</li>
                        <li><b>Estado de la vía: </b>";
                // line 129
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_status", []), "value", [])), "html", null, true);
                echo "</li>
                    </ul>
                    <h6><img src=\"";
                // line 131
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null)), "html", null, true);
                echo "/";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getActiveThemePath(), "html", null, true);
                echo "/images/misc/pin_near.png\"> Agencias cercanas a la ruta enunciada. <br> No significa parada en la agencia.</h6>
                </div>

                <div class=\"col-lg-";
                // line 134
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["count"] ?? null)), "html", null, true);
                echo " pt-4\">
                    <div id=\"timeline-rutas\">
                        <ul class=\"d-flex w-100 justify-content-between\">
                            ";
                // line 137
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_transits", []));
                foreach ($context['_seq'] as $context["key"] => $context["item"]) {
                    if ((twig_first($this->env, $context["key"]) != "#")) {
                        // line 138
                        echo "                            <li>
                                <span></span>
                                <div class=\"info\">
                                   ";
                        // line 141
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "value", [])));
                        echo "
                                </div>
                            </li>
                            ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 145
                echo "                        </ul>
                    </div>
                </div>
            </div>
        </div>
        ";
            } else {
                // line 151
                echo "        ";
                $context["count"] = ($context["count"] ?? null);
                // line 152
                echo "            <div class=\"row pt-4\">
                <div class=\"col-lg-1 pt-4\"></div>
                <div class=\"col-lg-3 pt-4\">
                    <h3>Ruta: ";
                // line 155
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_title", []), "value", [])));
                echo "</h3>
                    <ul class=\"mt-4\">
                        <li><b>Distancia: </b>";
                // line 157
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_distance", []), "value", [])));
                echo "</li>
                        <li><b>Tiempo estimado: </b>";
                // line 158
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_time_estimated", []), "value", [])));
                echo "</li>
                        <li><b>Estado de la vía: </b>";
                // line 159
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_status", []), "value", [])), "html", null, true);
                echo "</li>
                    </ul>
                    <h6><img src=\"";
                // line 161
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null)), "html", null, true);
                echo "/";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getActiveThemePath(), "html", null, true);
                echo "/images/misc/pin_near.png\"> Agencias cercanas a la ruta enunciada. <br> No significa parada en la agencia.</h6>
                </div>

                <div class=\"col-lg-";
                // line 164
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["count"] ?? null)), "html", null, true);
                echo " pt-4\">
                    <div id=\"timeline-rutas\">
                        <ul class=\"d-flex w-100 justify-content-between\">
                            ";
                // line 167
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_transits", []));
                foreach ($context['_seq'] as $context["key"] => $context["item"]) {
                    if ((twig_first($this->env, $context["key"]) != "#")) {
                        // line 168
                        echo "                            <li>
                                <span></span>
                                <div class=\"info\">
                                   ";
                        // line 171
                        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "value", [])));
                        echo "
                                </div>
                            </li>
                            ";
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 175
                echo "                        </ul>
                
                    </div>

                </div>
            </div>
        ";
            }
            // line 182
            echo "    </div>
</div>
<script>

      var map;
      function initMap() {
        map = new google.maps.Map(
            document.getElementById('map_route'),
            {center: new google.maps.LatLng(4.010614, -75.975973), zoom: 9, disableDefaultUI: true});

        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer({
            suppressMarkers: true,
            polylineOptions: { strokeColor: '#2C3B99' },
            map: map
        });
        displayRoute('";
            // line 198
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["origin"] ?? null)), "html", null, true);
            echo "', '";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["destiny"] ?? null)), "html", null, true);
            echo "', directionsService,directionsDisplay);

        var iconBase = '";
            // line 200
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["base_path"] ?? null)), "html", null, true);
            echo "/";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getActiveThemePath(), "html", null, true);
            echo "/images/misc/';

        var icons = {
          transit: {
            icon: iconBase + 'pin_near.png'
          },
          stop: {
            icon: iconBase + 'pin_map.png'
          }
        };

        var features = [
          {
            position: new google.maps.LatLng( ";
            // line 213
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["lat1"] ?? null)), "html", null, true);
            echo ", ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["lon1"] ?? null)), "html", null, true);
            echo " ),
            type: 'stop'
          },
            ";
            // line 216
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_transit_agency", []));
            foreach ($context['_seq'] as $context["key"] => $context["item"]) {
                if ((twig_first($this->env, $context["key"]) != "#")) {
                    // line 217
                    echo "            { 
              position: new google.maps.LatLng( ";
                    // line 218
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->sandbox->ensureToStringAllowed($this->getAttribute($context["item"], "value", [])));
                    echo " ),
              type: 'transit'
            },
           ";
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 222
            echo "          {
            position: new google.maps.LatLng( ";
            // line 223
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["lat2"] ?? null)), "html", null, true);
            echo ", ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["lon2"] ?? null)), "html", null, true);
            echo " ),
            type: 'stop'
          }
        ];

        // Create markers.
        for (var i = 0; i < features.length; i++) {
          var marker = new google.maps.Marker({
            position: features[i].position,
            icon: icons[features[i].type].icon,
            map: map
          });
        };

      }

      function displayRoute(origin, destination, service, display) {
          service.route({
            origin:  new google.maps.LatLng( ";
            // line 241
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["lat1"] ?? null)), "html", null, true);
            echo ", ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["lon1"] ?? null)), "html", null, true);
            echo " ),
            destination:  new google.maps.LatLng( ";
            // line 242
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["lat2"] ?? null)), "html", null, true);
            echo ", ";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["lon2"] ?? null)), "html", null, true);
            echo " ),
            /*waypoints: [
              ";
            // line 244
            $context["waypnt"] = "";
            // line 245
            echo "              ";
            $context["location"] = "location: ";
            // line 246
            echo "              ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["row"], "content", [], "array"), "#row", [], "array"), "_entity", []), "field_route_transit_agency", []), "getSetting", [0 => "allowed_values"], "method"));
            foreach ($context['_seq'] as $context["items"] => $context["value"]) {
                // line 247
                echo "
                 { ";
                // line 248
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["location"] ?? null)), "html", null, true);
                echo " ' ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["items"]), "html", null, true);
                echo " ' },
              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['items'], $context['value'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 250
            echo "            ],*/
            travelMode: 'DRIVING'//,
            //avoidTolls: true
          }, function(response, status) {
            if (status === 'OK') {
              display.setDirections(response);
            } else {
              alert('Could not display directions due to: ' + status);
            }
          });
        }


</script>
<!-- Replace the value of the key parameter with your own API key. -->
<script async defer
src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyAyWmzmaeGyLXQpJmbE_oUHxSwOxdS1Xtk&callback=initMap\">
</script>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--map-route-list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  543 => 250,  533 => 248,  530 => 247,  525 => 246,  522 => 245,  520 => 244,  513 => 242,  507 => 241,  484 => 223,  481 => 222,  470 => 218,  467 => 217,  462 => 216,  454 => 213,  436 => 200,  429 => 198,  411 => 182,  402 => 175,  391 => 171,  386 => 168,  381 => 167,  375 => 164,  367 => 161,  362 => 159,  358 => 158,  354 => 157,  349 => 155,  344 => 152,  341 => 151,  333 => 145,  322 => 141,  317 => 138,  312 => 137,  306 => 134,  298 => 131,  293 => 129,  289 => 128,  285 => 127,  280 => 125,  275 => 122,  272 => 121,  270 => 120,  263 => 115,  252 => 111,  247 => 108,  242 => 107,  236 => 104,  228 => 101,  223 => 99,  219 => 98,  215 => 97,  210 => 95,  205 => 92,  202 => 91,  199 => 90,  197 => 89,  182 => 76,  173 => 74,  171 => 73,  164 => 72,  161 => 71,  158 => 70,  153 => 69,  151 => 68,  143 => 62,  134 => 60,  132 => 59,  125 => 58,  122 => 57,  119 => 56,  114 => 55,  112 => 54,  104 => 49,  87 => 35,  78 => 28,  76 => 27,  74 => 26,  72 => 25,  70 => 24,  67 => 23,  65 => 22,  63 => 21,  61 => 20,  59 => 19,  55 => 18,);
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
{% for row in rows %}
{% set originCoords = row['content']['#row']._entity.field_route_coords_origin.value|split(',') %}
{% set destinyCoords = row['content']['#row']._entity.field_route_coords_destiny.value|split(',') %}
{% set origin = row['content']['#row']._entity.field_route_city_destiny.value  %}
{% set destiny = row['content']['#row']._entity.field_route_city_origin.value  %}

{% set lat1 = originCoords[0] %}
{% set lon1 = originCoords[1] %}
{% set lat2 = destinyCoords[0] %}
{% set lon2 = destinyCoords[1] %}



<section class=\"wrapper__100\">
    <div id=\"rutas\" class=\"\">
        <div class=\"buscador container-fluid\">
            <!--<div class=\"row\">
                <div class=\"col-md-12 col-lg-12 text-center big_text\">{{ row['content']['#row']._entity.field_route_title.value|raw }}</div>
                <div class=\"col-md-12 col-lg-3 origen mb-2\">
                    <p>Origen</p>
                    <input type=\"text\" value=\"Bogotá\">
                </div>
                <div class=\"col-md-12 col-lg-3 ubicacion mb-4\">
                    <img src=\"images/misc/target.png\" alt=\"\"> Cerca de mi ubicación
                </div>
                <div class=\"col-md-12 col-lg-3 destino\">
                    <p>Destino</p>
                    <input type=\"text\" value=\"Cali\">
                </div>
            </div> -->
            <div class=\"row\">
              <div class=\"col col-4 col-md-6 text-center big_text\">{{ row['content']['#row']._entity.field_route_title.value|raw }}</div>
              <div class=\"col-sm-3 col-md-2\">
                  <p>Origen</p>
                  <select id=\"origin_filter\">
                      <option value=\"0\">-Todas-</option>
                  {% set newCities = [] %}
                  {% for city in cities|sort %}
                      {% if city.0.0.0.value not in newCities %}
                      {% set cityOrigin = city.0.0.0.value|raw|split(',') %}
                          <option value=\"{{ cityOrigin[0]|lower }}\">{{ cityOrigin[0] }}</option>
                      {% set newCities = newCities|sort|merge([city.0.0.0.value]) %}
                      {% endif %}    
                  {% endfor %}
                  </select>
              </div>
              <div class=\"col-sm-3 col-md-2 destino\">
                  <p>Destino</p>
                  <select id=\"destiny_filter\">
                      <option value=\"0\">-Todas-</option>
                  {% set newCities = [] %}
                  {% for city in cities|sort %}
                      {% if city.1.1.0.value not in newCities %}
                      {% set cityDestiny = city.1.1.0.value|raw|split(',') %}
                          <option value=\"{{ cityDestiny[0]|lower }}\">{{ cityDestiny[0] }}</option>
                      {% set newCities = newCities|sort|merge([city.1.1.0.value]) %}
                      {% endif %}    
                  {% endfor %}
                  </select>    
              </div>
              <div class=\"col col-sm-3 col-md-2 text-center big_text\"><button id=\"filter_routes\" class=\"btn btn--secondary\" style=\"font-size: 18px;\">Filtrar</button></div>
              
          </div>
        </div>
        <div class=\"\">
            <div id=\"map_route\" class=\"map_route\" style=\"height: 800px;\"></div>
        </div>
    </div> 
</section>
<div class=\"w-100\">
    <div class=\"container-fluid bg-light-blue\">
        {% set count = row['content']['#row']._entity.field_route_transits|length %}
        {% if count <= 4 %}
        {% set count = (count*2) %}
        <div class=\"container mb-4 pb-4\">
            <div class=\"row pt-4\">
                <div class=\"col-lg-4 pt-4\">
                    <h3>Ruta: {{ row['content']['#row']._entity.field_route_title.value|raw }}</h3>
                    <ul class=\"mt-4\">
                        <li><b>Distancia: </b>{{ row['content']['#row']._entity.field_route_distance.value|raw }}</li>
                        <li><b>Tiempo estimado: </b>{{ row['content']['#row']._entity.field_route_time_estimated.value|raw }}</li>
                        <li><b>Estado de la vía: </b>{{ row['content']['#row']._entity.field_route_status.value }}</li>
                    </ul>
                    <h6><img src=\"{{ base_path }}/{{ active_theme_path() }}/images/misc/pin_near.png\"> Agencias cercanas a la ruta enunciada. <br> No significa parada en la agencia.</h6>
                </div>

                <div class=\"col-lg-{{ count }} pt-4\">
                    <div id=\"timeline-rutas\">
                        <ul class=\"d-flex w-100 justify-content-between\">
                            {% for key, item in row['content']['#row']._entity.field_route_transits if key|first != '#' %}
                            <li>
                                <span></span>
                                <div class=\"info\">
                                   {{ item.value|raw }}
                                </div>
                            </li>
                            {% endfor %}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {% elseif count > 4 and count < 6 %}
        {% set count = 8 %}
        <div class=\"container mb-4 pb-4\">
            <div class=\"row pt-4\">
                <div class=\"col-lg-4 pt-4\">
                    <h3>Ruta: {{ row['content']['#row']._entity.field_route_title.value|raw }}</h3>
                    <ul class=\"mt-4\">
                        <li><b>Distancia: </b>{{ row['content']['#row']._entity.field_route_distance.value|raw }}</li>
                        <li><b>Tiempo estimado: </b>{{ row['content']['#row']._entity.field_route_time_estimated.value|raw }}</li>
                        <li><b>Estado de la vía: </b>{{ row['content']['#row']._entity.field_route_status.value }}</li>
                    </ul>
                    <h6><img src=\"{{ base_path }}/{{ active_theme_path() }}/images/misc/pin_near.png\"> Agencias cercanas a la ruta enunciada. <br> No significa parada en la agencia.</h6>
                </div>

                <div class=\"col-lg-{{ count }} pt-4\">
                    <div id=\"timeline-rutas\">
                        <ul class=\"d-flex w-100 justify-content-between\">
                            {% for key, item in row['content']['#row']._entity.field_route_transits if key|first != '#' %}
                            <li>
                                <span></span>
                                <div class=\"info\">
                                   {{ item.value|raw }}
                                </div>
                            </li>
                            {% endfor %}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {% else %}
        {% set count = count %}
            <div class=\"row pt-4\">
                <div class=\"col-lg-1 pt-4\"></div>
                <div class=\"col-lg-3 pt-4\">
                    <h3>Ruta: {{ row['content']['#row']._entity.field_route_title.value|raw }}</h3>
                    <ul class=\"mt-4\">
                        <li><b>Distancia: </b>{{ row['content']['#row']._entity.field_route_distance.value|raw }}</li>
                        <li><b>Tiempo estimado: </b>{{ row['content']['#row']._entity.field_route_time_estimated.value|raw }}</li>
                        <li><b>Estado de la vía: </b>{{ row['content']['#row']._entity.field_route_status.value }}</li>
                    </ul>
                    <h6><img src=\"{{ base_path }}/{{ active_theme_path() }}/images/misc/pin_near.png\"> Agencias cercanas a la ruta enunciada. <br> No significa parada en la agencia.</h6>
                </div>

                <div class=\"col-lg-{{ count }} pt-4\">
                    <div id=\"timeline-rutas\">
                        <ul class=\"d-flex w-100 justify-content-between\">
                            {% for key, item in row['content']['#row']._entity.field_route_transits if key|first != '#' %}
                            <li>
                                <span></span>
                                <div class=\"info\">
                                   {{ item.value|raw }}
                                </div>
                            </li>
                            {% endfor %}
                        </ul>
                
                    </div>

                </div>
            </div>
        {% endif %}
    </div>
</div>
<script>

      var map;
      function initMap() {
        map = new google.maps.Map(
            document.getElementById('map_route'),
            {center: new google.maps.LatLng(4.010614, -75.975973), zoom: 9, disableDefaultUI: true});

        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer({
            suppressMarkers: true,
            polylineOptions: { strokeColor: '#2C3B99' },
            map: map
        });
        displayRoute('{{ origin }}', '{{ destiny }}', directionsService,directionsDisplay);

        var iconBase = '{{ base_path }}/{{ active_theme_path() }}/images/misc/';

        var icons = {
          transit: {
            icon: iconBase + 'pin_near.png'
          },
          stop: {
            icon: iconBase + 'pin_map.png'
          }
        };

        var features = [
          {
            position: new google.maps.LatLng( {{ lat1 }}, {{ lon1 }} ),
            type: 'stop'
          },
            {% for key, item in row['content']['#row']._entity.field_route_transit_agency if key|first != '#' %}
            { 
              position: new google.maps.LatLng( {{ item.value|raw }} ),
              type: 'transit'
            },
           {% endfor %}
          {
            position: new google.maps.LatLng( {{ lat2 }}, {{ lon2 }} ),
            type: 'stop'
          }
        ];

        // Create markers.
        for (var i = 0; i < features.length; i++) {
          var marker = new google.maps.Marker({
            position: features[i].position,
            icon: icons[features[i].type].icon,
            map: map
          });
        };

      }

      function displayRoute(origin, destination, service, display) {
          service.route({
            origin:  new google.maps.LatLng( {{ lat1 }}, {{ lon1 }} ),
            destination:  new google.maps.LatLng( {{ lat2 }}, {{ lon2 }} ),
            /*waypoints: [
              {% set waypnt = '' %}
              {% set location = 'location: ' %}
              {% for items, value in row['content']['#row']._entity.field_route_transit_agency.getSetting('allowed_values') %}

                 { {{ location }} ' {{ items }} ' },
              {% endfor %}
            ],*/
            travelMode: 'DRIVING'//,
            //avoidTolls: true
          }, function(response, status) {
            if (status === 'OK') {
              display.setDirections(response);
            } else {
              alert('Could not display directions due to: ' + status);
            }
          });
        }


</script>
<!-- Replace the value of the key parameter with your own API key. -->
<script async defer
src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyAyWmzmaeGyLXQpJmbE_oUHxSwOxdS1Xtk&callback=initMap\">
</script>
{% endfor %}", "themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--map-route-list.html.twig", "/var/www/web/themes/bootstrap_barrio/subtheme/templates/views-view-unformatted--map-route-list.html.twig");
    }
}
