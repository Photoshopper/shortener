<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\LinkRequest;
use App\Http\Resources\API\Link\LinkResource;
use App\Repositories\LinkRespository;

class LinkController extends Controller
{
    private LinkRespository $linkRespository;

    public function __construct(LinkRespository $linkRespository)
    {
        $this->linkRespository = $linkRespository;
    }

    public function add(LinkRequest $request): LinkResource
    {
        $link = $this->linkRespository->firstOrCreate($request->url);

        return new LinkResource($link);
    }
}
