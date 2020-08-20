<?php

namespace Ant\Core\Traits;

trait DateRelatedQuery {
    public function scopeWhereOverlapped($builder, $startsAt, $endsAt, $startsAtColumnName = 'starts_at', $endsAtColumnName = 'ends_at') {
        $builder->where(function($q) use ($startsAt,  $endsAtColumnName) {
            $q->whereNull($endsAtColumnName)
                ->orWhere($endsAtColumnName, '>=', $startsAt);
        })->where(function($q) use($endsAt, $startsAtColumnName) {
            $q->whereNull($startsAtColumnName)
                ->orWhere($startsAtColumnName, '<=', $endsAt);
        });
    }
}