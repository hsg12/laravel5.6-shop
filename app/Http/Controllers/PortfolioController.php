<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolio = [
            (object) [
                'title' => 'simplesite',
                'url'   => 'http://simplesite.96.lt/',
            ],
            (object) [
                'title' => 'jokeshop',
                'url'   => 'http://jokeshop.96.lt/',
            ],
            (object) [
                'title' => 'socnetwork',
                'url'   => 'http://socnetwork.96.lt/',
            ],
            (object) [
                'title' => 'minisite',
                'url'   => 'http://minisite.rf.gd/',
            ],
            (object) [
                'title' => 'university',
                'url'   => 'http://tutorial.rf.gd/',
            ],
            (object) [
                'title' => 'forum',
                'url'   => 'http://php-user.site/app',
            ],
            (object) [
                'title' => 'blog',
                'url'   => 'http://php-user.site/blog',
            ],
            (object) [
                'title' => 'arkada',
                'url'   => 'http://arkada.rf.gd/',
            ],
            (object) [
                'title' => 'recipes',
                'url'   => 'http://sample.rf.gd/',
            ],
            (object) [
                'title' => 'meetup',
                'url'   => 'https://meetup-project-78f3d.firebaseapp.com/',
            ],
            (object) [
                'title' => 'real-estate',
                'url'   => 'https://ads-project-f8454.firebaseapp.com/',
            ],
        ];

        return view('portfolio.index', compact('portfolio'));
    }
}
