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

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GithubProjects  $githubProjects
     * @return \Illuminate\Http\Response
     */
    public function show(GithubProjects $githubProjects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GithubProjects  $githubProjects
     * @return \Illuminate\Http\Response
     */
    public function edit(GithubProjects $githubProjects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GithubProjects  $githubProjects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GithubProjects $githubProjects)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GithubProjects  $githubProjects
     * @return \Illuminate\Http\Response
     */
    public function destroy(GithubProjects $githubProjects)
    {
        //
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

            $newItem = collect(json_decode($response->body())->items)->each(function($item) {

                GithubProjects::updateOrCreate(
                    [
                        'repo_id' => $item->id
                    ],
                    [
                        'name' => $item->name,
                        'url' => $item->html_url,
                        'created_date' => $item->created_at,
                        'last_push_date' => $item->pushed_at,
                        'description' => $item->description,
                        'stargazers_count' => $item->stargazers_count
                    ]
                );
            });
            dump($newItem);

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            // TODO then fail gracefully
        }

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
