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

/* server/binlog/log_row.twig */
class __TwigTemplate_9cf820c46be2722bf22280384933c5058b549d34effb00df412cf49470327997 extends \Twig\Template
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
        echo "<tr class=\"noclick\">
    <td>";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute(($context["value"] ?? null), "Log_name", [], "array"), "html", null, true);
        echo "</td>
    <td class=\"right\">";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute(($context["value"] ?? null), "Pos", [], "array"), "html", null, true);
        echo "</td>
    <td>";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute(($context["value"] ?? null), "Event_type", [], "array"), "html", null, true);
        echo "</td>
    <td class=\"right\">";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute(($context["value"] ?? null), "Server_id", [], "array"), "html", null, true);
        echo "</td>
    <td class=\"right\">";
        // line 7
        echo twig_escape_filter($this->env, (($this->getAttribute(($context["value"] ?? null), "Orig_log_pos", [], "array", true, true)) ? ($this->getAttribute(($context["value"] ?? null), "Orig_log_pos", [], "array")) : ($this->getAttribute(($context["value"] ?? null), "End_log_pos", [], "array"))), "html", null, true);
        // line 8
        echo "</td>
    <td>";
        // line 9
        echo PhpMyAdmin\Util::formatSql($this->getAttribute(($context["value"] ?? null), "Info", [], "array"),  !($context["dontlimitchars"] ?? null));
        echo "</td>
</tr>
";
    }

    public function getTemplateName()
    {
        return "server/binlog/log_row.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 9,  51 => 8,  49 => 7,  45 => 5,  41 => 4,  37 => 3,  33 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "server/binlog/log_row.twig", "/home/shaheen/public_html/phpmyadmin/templates/server/binlog/log_row.twig");
    }
}
