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

        $client = new \GuzzleHttp\Client();
        $request = $client->post('https://api.github.com/user/repos', [
            'headers' => [
                'content-type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . env('GITHUB_PERSONAL_ACCESS_TOKEN')
            ],
            'body' => json_encode(['name' => $request->name])
        ]);

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
            'headers' => ['Authorization' => 'Bearer ' . env('GITHUB_PERSONAL_ACCESS_TOKEN')],
        ]);
        $repos = json_decode($request->getBody()->getContents(), true);
        return view('repos.index', compact('repos'));
    }

    public function deletingGithubRepo()
    {
        return view('repos.delete');
    }

    public function deleteGithubRepo(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $request = $client->delete('https://api.github.com/repos/' . env('GITHUB_USERNAME') . '/' . $request->name, [
            'headers' => [
                'content-type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . env('GITHUB_PERSONAL_ACCESS_TOKEN')
            ],

        ]);
        return redirect()->route('get-all-github-repos');
    }
}
