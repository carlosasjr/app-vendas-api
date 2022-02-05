<?php

namespace App\Services;

use App\Models\Seller;

class SellerService
{
    public function __construct(private Seller $repository)
    {
    }

    public function all()
    {
        return $this->repository->get();
    }
}
