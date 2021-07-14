<?php

namespace App\Services;

use Illuminate\Support\Collection;

class NewsService extends Service
{
    private Collection $itens;

    public function __construct(
        protected RSSService $rssService
    ) {}

    public function index()
    {
        $response = $this->rssService
            ->get(
                $this->rssUrl()
            );

        $this->setItens($response);
        $this->sortItens();

        return $this->itens;
    }

    public function setItens($response)
    {
        $this->itens = collect($response['channel']['item']);
    }

    public function sortItens()
    {
        $this->itens = $this->itens->sortByDesc(function($item) {
            return $item['pubDate'];
        });
    }

    public function rssUrl()
    {
        return 'https://g1.globo.com/rss/g1/economia/';
    }
}
