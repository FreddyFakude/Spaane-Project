<?php

namespace App\Repository;

use App\Models\Address;

class AddressRepository
{
    public function __construct()
    {
        //
    }

    public function insert($data, $id, $type)
    {
        $addressPayload = [
            "street_number" => $data['street_number'],
            "street_name" => $data['street_name'],
            "suburb" => $data['suburb'],
            "city" => $data['city'],
            "state" => $data['state'],
            "zip_code" => $data['zip_code'],
            "country" => "South Africa",
            "addressable_id" => $id,
            "addressable_type" => $type
        ];
        return Address::create($addressPayload);
    }

}
