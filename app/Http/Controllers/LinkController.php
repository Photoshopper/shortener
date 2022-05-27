<?php

namespace App\Http\Controllers;

use App\Repositories\LinkRespository;
use Illuminate\Http\RedirectResponse;

class LinkController extends Controller
{
    private LinkRespository $linkRespository;

    public function __construct(LinkRespository $linkRespository)
    {
        $this->linkRespository = $linkRespository;
    }

    public function redirect(string $base): RedirectResponse
    {
        $link = $this->linkRespository->findOrFail(base_convert($base, 36, 10));

        return redirect()->away($link->url);
    }
}
