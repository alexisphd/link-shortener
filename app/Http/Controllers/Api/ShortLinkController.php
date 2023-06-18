<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LinkRequest;
use App\Models\Link;

class ShortLinkController extends Controller
{
    public function checkLink(LinkRequest $link)
    {

        $data = $link->validated();
        $fullLink = Link::where('short_link', $data['link'])->value('full_link');
        return view('redirect', compact('fullLink'));
    }
}
