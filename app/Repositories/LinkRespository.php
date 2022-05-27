<?php

namespace App\Repositories;

use App\Models\Link;

class LinkRespository
{
    public function findOrFail(int $id): ?Link
    {
        return Link::findOrFail($id);
    }

    public function firstOrCreate(string $url): Link
    {
        return Link::firstOrCreate(['url' => $url]);
    }
}
