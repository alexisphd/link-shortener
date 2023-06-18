<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinkRequest;
use App\Models\Link;
use App\Service\LinkService;

class LinkController extends Controller
{
    public $service;

    public function __construct(LinkService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return view('index_ajax');
    }

    public function showLinks()
    {
        $shortedLinks = Link::latest()->take(10)->orderBy('id', 'DESC' )->get(['id', 'full_link', 'short_link']) ?? null;
        return $shortedLinks;
    }

    public function store(LinkRequest $linkRequest)
    {
        $data = $linkRequest->validated();
        $link = $this->service->store($data);

        return $link;
    }


}
