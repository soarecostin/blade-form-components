<?php

namespace SoareCostin\BladeFormComponents;

final class CompileFormDirective
{
    public function __invoke(string $expression)
    {
        $expressionParts = explode(',', $expression, 2);

        $component = trim($expressionParts[0], '\'" ');
        $componentClassName = ucfirst($component).'Component';

        $params = trim($expressionParts[1] ?? '[]');

        $props = "['params' => $params]";

        return "<?php echo app(SoareCostin\\BladeFormComponents\\FormComponents\\$componentClassName::class, {$props})->toHtml(); ?>";
    }
}
