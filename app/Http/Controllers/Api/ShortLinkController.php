<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LinkRequest;
use App\Models\Link;

class ShortLinkController extends Controller
{
    /**
     * api method for redirection to the full link (web-address)
     *
     * @param LinkRequest $link
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function checkLink(LinkRequest $link)
    {

        $data = $link->validated();
        $fullLink = Link::where('short_link', $data['link'])->value('full_link');
        return view('redirect', compact('fullLink'));
    }
}
