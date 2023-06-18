<?php

namespace App\Service;

use App\Models\Link;
use Illuminate\Support\Facades\DB;

class LinkService
{

    /**
     * method to store link
     * @param $data
     * @return mixed
     */
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

    /**
     * method to make link shorter by cutting the long part
     * @param $data
     * @return array
     */
    public function makeShortLink($data)
    {
        $shorting = explode('/', $data['full_link']);
        $pattern = $this->alphabetParts();
        $short = array('https:/', $shorting[2], $pattern);
        $shortLink = implode('/', $short);
        return compact('shortLink', 'pattern');
    }

    /**
     * method to get the next alphabet pattern
     * @return int|string
     */
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