<?php

namespace App\Service;

use App\Models\Link;
use Illuminate\Support\Facades\DB;

class LinkService
{

    public function store($data)
    {
        $shortLink = $this->makeShortLink($data);
        try {
            DB::beginTransaction();
            Link::create([
                'full_link' => $data['full_link'],
                'short_link' => $shortLink['shortLink'],
                'pattern' => $shortLink['pattern'],
            ]);
            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            abort('500');
        }
        return Link::latest()->take(10)->orderBy('id', 'DESC' )->get(['id', 'full_link', 'short_link']);
    }

    public function makeShortLink($data)
    {
        $shorting = explode('/', $data['full_link']);
        $pattern = $this->alphabetParts();
        $short = array('https:/', $shorting[2], $pattern);
        $shortLink = implode('/', $short);
        return compact('shortLink', 'pattern');
    }

    public function alphabetParts()
    {
        $lastPattern = Link::latest()->value('pattern');
        if (!isset($lastPattern)) return 'a';
        else {
            if (explode('z', $lastPattern)) {
                $nextPattern = ++$lastPattern;
            }
        }

        return $nextPattern;
    }
}