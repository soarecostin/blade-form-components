<?php

namespace SoareCostin\BladeFormComponents\Traits;

trait GluesAttributes
{
    public function glueAttributes($attributesList = null)
    {
        if (is_null($attributesList) && isset($this->attributesList)) {
            $attributesList = $this->attributesList;
        }

        $pairs = [];
        foreach ($attributesList as $attr) {
            if (isset($this->{$attr})) {

                // Edge cases
                if ($attr == 'autocomplete') {
                    $pairs[] = sprintf('%s="%s"', $attr, $this->{$attr} ? 'on' : 'off');
                    continue;
                }

                if ($attr == 'class' && is_array($this->{$attr})) {
                    $pairs[] = sprintf('%s="%s"', $attr, implode(' ', $this->{$attr}));
                    continue;
                }

                // Required, disabled, readonly: true/false
                if (is_bool($this->{$attr})) {
                    if ($this->{$attr} == true) {
                        $pairs[] = $attr;
                    }
                    continue;
                }

                $pairs[] = sprintf('%s="%s"', $attr, $this->{$attr});
            }
        }

        if (isset($this->customAttributes)) {
            foreach ($this->customAttributes as $attrName => $attrVal) {
                $pairs[] = sprintf('%s="%s"', $attrName, $attrVal);
            }
        }

        return implode(' ', $pairs);
    }
}
