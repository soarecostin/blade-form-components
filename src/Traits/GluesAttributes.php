<?php

namespace SoareCostin\BladeFormComponents\Traits;

trait GluesAttributes
{
    public function glueAttributes($attributesList = null)
    {
        if (is_null($attributesList)) {
            $attributesList = $this->attributesList();
        }

        $pairs = collect($attributesList)->filter(function ($attr, $key) {
            return isset($this->{$attr});
        })
        ->filter(function ($attr, $key) {
            return ! is_bool($this->{$attr}) || $this->{$attr} == true;
        })
        ->map(function ($attr, $key) {
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
