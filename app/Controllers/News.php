<?php

namespace App\Controllers;

use App\Models\NewsModel;
use App\Controllers\BaseController;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\HTTP\ResponseInterface;

class News extends BaseController
{
    public function index()
    {
        // return view('news');
        $news = new NewsModel();

        $data['newses'] = $news->where('status', 'published')->findAll();

        echo view('news', $data);
    }

    public function viewNews($slug)
    {
        $news = new NewsModel();
        $data['news'] = $news->where([
            'slug' => $slug,
            'status' => 'published'
        ])->first();

        if (!$data['news']) {
            throw PageNotFoundException::forPageNotFound();
        }

        echo view('news_detail', $data);
    }
}