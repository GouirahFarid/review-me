<?php

namespace App\Actions\Address;

use App\Models\Place;

class AttachAddressesToPlace
{
    public function handle(Place $place, array $addresses): void
    {
        foreach ($addresses as $addressData) {
            $place->addresses()->updateOrCreate(
                ['id' => $addressData['id'] ?? null],
                $addressData
            );
        }
    }
}
