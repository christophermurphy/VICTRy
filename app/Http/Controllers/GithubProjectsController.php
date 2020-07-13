<?php

namespace App\Http\Controllers;

use App\GithubProjects;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GithubProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = GithubProjects::all()
        ->sortByDesc('stargazers_count');

        return view('github.index', ['repos'=> $data]);
    }


    /**
     * Grab the data from github api.
     *
     * @return \Illuminate\Http\Client\Response
     */
    protected function fetchGithubData()
    {
        try {

            $response = Http::get('https://api.github.com/search/repositories', [
                'q' => 'language:php',
                'sort' => 'stars',
                'order' => 'desc',
                'per_page' => '100',
            ]);

            // TODO validation goes here

            return $response;

        } catch (\Exception $e) {

            Log::error($e->getMessage());
            //TODO  then fail gracefully

        }
    }

    /**
     * Save the github data to the DB
     *
     */

    protected function saveData()
    {
        try {
            $response = $this->fetchGithubData();

            // lazy way to update the table
            // I thought about making a dowload group so that changes could be tracked over time
            GithubProjects::query()->truncate();

            $newItem = collect(json_decode($response->body())->items)->each(function($item) {

                GithubProjects::create(
                    [
                        'repo_id' => $item->id,
                        'name' => $item->name,
                        'url' => $item->html_url,
                        'created_date' => date('d-m-Y H:i:s', strtotime($item->created_at)),
                        'last_push_date' => date('d-m-Y H:i:s', strtotime($item->pushed_at)),
                        'description' => $item->description,
                        'stargazers_count' => $item->stargazers_count
                    ]
                );
            });

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            // TODO then fail gracefully
        }
        return redirect()->route('list');

    }

    /**
     * Save the github data to the DB
     *
     *
     */

    public function downloadAndSaveGithubData(Response $response) {

        dump(json_decode($response->body())->items);

        $data = $response->items;

    }

}
