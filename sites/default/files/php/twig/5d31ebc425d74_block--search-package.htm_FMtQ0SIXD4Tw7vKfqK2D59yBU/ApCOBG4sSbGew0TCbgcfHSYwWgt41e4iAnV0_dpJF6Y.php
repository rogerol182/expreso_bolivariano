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

/* modules/custom/expreso_bolivariano_blocks/templates/block--search-package.html.twig */
class __TwigTemplate_38e354b08b7fcca417b1977192ce333d1bde23e51ccb3868bfc68034a1357ae3 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = [];
        $filters = [];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                [],
                [],
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
        echo "<div class=\"container mt-4 pb-4\">
    <h2 class=\"block-title blue mt-4\">Seguimiento de envíos</h2>
    <div class=\"col col-lg-12 mx-auto panel-shadow bg-white pb-4 mb-4\">
        <div class=\"row pt-4 pb-4 justify-content-center\">
            <div class=\"col col-lg-11 pt-4\">
                <div class=\"row no-gutters panel seguimiento\">
                    <div class=\"col col-lg-6\">
                        <div class=\"row no-gutters justify-content-between\">
                            <label class=\"col-md-5 text-right text-orange\" for=\"\">Nùmero de guìa </label>
                            <input class=\"col-md-6 input orange pl-2\" type=\"text\" placeholder=\"ingrese número de gúia\">
                        </div>
                        <div class=\"mt-4 row no-gutters justify-content-end\">
                            <button class=\"btn p-30 dark\">Consultar guía</button>
                        </div>
                    </div>
                    <div class=\"col col-lg-6 bg-dark-blue text-orange\">
                        <div>Punto de salida: <span>Pasto (Nariño)</span></div>
                        <div>Destino: <span>Bogotá (Bogotá D.C.)</span></div>
                        <br>
                        <div class=\"mt-4\">Estado: <span>VIAJANDO (hora de salida 06:30 AM)</span></div>
                        <div>
                            <!-- 
                            clases de acuerdo a la ubicación
                            .salida
                            .viajando
                            .destino 
                            -->
                            <div id=\"seguimiento-timeline\" class=\"viajando\">
                                <hr>
                                <hr>
                                <div>
                                    <div><span>
                                        <img src=\"images/misc/ser-caja.png\" alt=\"\">
                                    </span>SALIDA</div>
                                    <div><span>
                                        <img src=\"images/misc/ser-caja.png\" alt=\"\">
                                    </span>VIAJANDO</div>
                                    <div><span>
                                        <img src=\"images/misc/ser-caja.png\" alt=\"\">
                                    </span>DESTINO</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "modules/custom/expreso_bolivariano_blocks/templates/block--search-package.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"container mt-4 pb-4\">
    <h2 class=\"block-title blue mt-4\">Seguimiento de envíos</h2>
    <div class=\"col col-lg-12 mx-auto panel-shadow bg-white pb-4 mb-4\">
        <div class=\"row pt-4 pb-4 justify-content-center\">
            <div class=\"col col-lg-11 pt-4\">
                <div class=\"row no-gutters panel seguimiento\">
                    <div class=\"col col-lg-6\">
                        <div class=\"row no-gutters justify-content-between\">
                            <label class=\"col-md-5 text-right text-orange\" for=\"\">Nùmero de guìa </label>
                            <input class=\"col-md-6 input orange pl-2\" type=\"text\" placeholder=\"ingrese número de gúia\">
                        </div>
                        <div class=\"mt-4 row no-gutters justify-content-end\">
                            <button class=\"btn p-30 dark\">Consultar guía</button>
                        </div>
                    </div>
                    <div class=\"col col-lg-6 bg-dark-blue text-orange\">
                        <div>Punto de salida: <span>Pasto (Nariño)</span></div>
                        <div>Destino: <span>Bogotá (Bogotá D.C.)</span></div>
                        <br>
                        <div class=\"mt-4\">Estado: <span>VIAJANDO (hora de salida 06:30 AM)</span></div>
                        <div>
                            <!-- 
                            clases de acuerdo a la ubicación
                            .salida
                            .viajando
                            .destino 
                            -->
                            <div id=\"seguimiento-timeline\" class=\"viajando\">
                                <hr>
                                <hr>
                                <div>
                                    <div><span>
                                        <img src=\"images/misc/ser-caja.png\" alt=\"\">
                                    </span>SALIDA</div>
                                    <div><span>
                                        <img src=\"images/misc/ser-caja.png\" alt=\"\">
                                    </span>VIAJANDO</div>
                                    <div><span>
                                        <img src=\"images/misc/ser-caja.png\" alt=\"\">
                                    </span>DESTINO</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>", "modules/custom/expreso_bolivariano_blocks/templates/block--search-package.html.twig", "/var/www/web/modules/custom/expreso_bolivariano_blocks/templates/block--search-package.html.twig");
    }
}
