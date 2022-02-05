<?php

namespace App\Traits;

use DateTime;

trait FilterDataSync
{
    public function scopeDataSync($query, ?string $dataSync = null)
    {
        return $query->where(
            function ($query) use ($dataSync) {
                if ($dataSync) {
                    $query->where('created_at', '>=', $dataSync)
                        ->orWhere('updated_at', '>=', $dataSync);
                }
            }
        );
    }
}
