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

/* prefs_twofactor_configure.twig */
class __TwigTemplate_8bfd7ba8fd5c2f61259b620afaae9e380f13648f596644069d4e15a8dfd39aaa extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<div class=\"group\">
<h2>";
        // line 2
        echo _gettext("Configure two-factor authentication");
        echo "</h2>
<div class=\"group-cnt\">
<form method=\"POST\" action=\"prefs_twofactor.php\">
";
        // line 5
        echo PhpMyAdmin\Url::getHiddenInputs();
        echo "
<input type=\"hidden\" name=\"2fa_configure\" value=\"";
        // line 6
        echo twig_escape_filter($this->env, ($context["configure"] ?? null), "html", null, true);
        echo "\" />
";
        // line 7
        echo ($context["form"] ?? null);
        echo "
<input type=\"submit\" value=\"";
        // line 8
        echo _gettext("Enable two-factor authentication");
        echo "\" />
</form>
</div>
</div>


";
    }

    public function getTemplateName()
    {
        return "prefs_twofactor_configure.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 8,  47 => 7,  43 => 6,  39 => 5,  33 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "prefs_twofactor_configure.twig", "/home/shaheen/public_html/phpmyadmin/templates/prefs_twofactor_configure.twig");
    }
}
