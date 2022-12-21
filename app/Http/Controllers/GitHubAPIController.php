<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GitHubAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createGithubRepo()
    {
        return view('repos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeGithubRepo(Request $request)
    {
        //
        // dd($request->name);
        $client = new \GuzzleHttp\Client();
        $request = $client->post('https://api.github.com/user/repos', [
            'headers' => [
                'content-type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . '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'
            ],
            'body' => json_encode(['name' => $request->name])
        ]);
        // $response = $request->send();
        // $repos = json_decode($request->getBody()->getContents(), true);
        return redirect()->route('get-all-github-repos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAllGithubRepos()
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->get('https://api.github.com/user/repos', [
            'headers' => ['Authorization' => 'Bearer ' . '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'],
        ]);
        $repos = json_decode($request->getBody()->getContents(), true);
        return view('repos.index', compact('repos'));
    }
}
