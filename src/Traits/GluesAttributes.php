<?php

namespace SoareCostin\BladeFormComponents\Traits;

trait GluesAttributes
{
    public function glueAttributes($attributesList = null)
    {
        if (is_null($attributesList)) {
            $attributesList = $this->attributesList();
        }

        // Filter out attributes that are not set against this object or that are boolean and false (eg required)
        $attributes = collect($attributesList)->filter(function ($attr) {
            return isset($this->{$attr}) && ! (is_bool($this->{$attr}) && $this->{$attr} == false);
        });

        // Map attributes from a simple collection to a key="value" format
        $pairs = $attributes->map(function ($attr) {
            if (is_array($this->{$attr})) {
                return sprintf('%s="%s"', $attr, implode(' ', $this->{$attr}));
            }

            if (is_bool($this->{$attr})) {
                return $attr;
            }

            return sprintf('%s="%s"', $attr, $this->{$attr});
        });

        $customAttributes = $this->customAttributes();

        if (! empty($customAttributes)) {
            // Merge custom attributes (v-model)
            $pairs = $pairs->merge(
                collect($customAttributes)->map(function ($attr, $key) {
                    return sprintf('%s="%s"', $key, $attr);
                })
            );
        }

        return $pairs->implode(' ');
    }

    protected function attributesList()
    {
        return [];
    }

    protected function customAttributes()
    {
        return [];
    }
}
