<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class MusicController extends Controller
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function index()
    {
        $response = $this->callFeed();
        return view('music.index', compact('response'));
//        return $response;
//        return view('projects.apiwithoutkey', compact('response'));
    }

    public function store()
    {
        $response = $this->callFeed();
    }

    public function show()
    {

    }
    /**
     * @return mixed
     */
    private function callFeed()
    {
        $response = json_decode(file_get_contents('https://itunes.apple.com/us/rss/topalbums/limit=100/json'));

        return $response->feed;
    }
}
