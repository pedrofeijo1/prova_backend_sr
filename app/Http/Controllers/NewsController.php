<?php

namespace App\Http\Controllers;

use App\Http\Resources\NewsCollection;
use App\Services\NewsService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function __construct(
        protected NewsService $newsService
    ) {}

    public function index()
    {
        return NewsCollection::collection($this->newsService->index());
    }
}
