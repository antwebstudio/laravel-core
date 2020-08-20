<?php

namespace Ant\Core\Traits;

use Spatie\SchemalessAttributes\SchemalessAttributes;

trait OptionAttribute
{
	public function initializeOptionAttribute() {
        $this->casts['options'] = 'array';
	}

    /**
     * Get options attributes.
     *
     * @return \Spatie\SchemalessAttributes\SchemalessAttributes
     */
    public function getOptionsAttribute(): SchemalessAttributes
    {
        return SchemalessAttributes::createForModel($this, 'options');
    }

    public function scopeWithOptions(): Builder
    {
        return SchemalessAttributes::scopeWithSchemalessAttributes('options');
    }
}
