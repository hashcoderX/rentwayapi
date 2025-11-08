<?php

namespace App\Http\Controllers\Api\V1\Traits;

use Illuminate\Support\Facades\Auth;

trait AuthorizesCompany
{
    protected function companyId(): ?int
    {
        return Auth::user()->company_id ?? null;
    }
}
