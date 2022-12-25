<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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

        $rules = [
            'name' => 'required',
        ];
        $customMessages = [
            'name.required' => trans('Repo Name is required'),
        ];

        $this->validate($request, $rules, $customMessages);

        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->post('https://api.github.com/user/repos', [
                'headers' => [
                    'content-type' => 'application/json',
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . env('GITHUB_PERSONAL_ACCESS_TOKEN')
                ],
                'body' => json_encode(['name' => $request->name])
            ]);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $errors = [];
            $response = $e->getResponse();
            $responseBody = json_decode($response->getBody()->getContents());
            $errors['message'] = $responseBody->message;
            if ($response->getStatusCode() == 422) {
                $errors['info'] = $responseBody->errors[0]->message ?? 'Something went wrong';
            }
            return Redirect::back()->withInput()->withErrors($errors);
        }

        return redirect()->route('get-all-github-repos')->with('success', 'Repo created successfully.');
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
        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->get('https://api.github.com/user/repos', [
                'headers' => ['Authorization' => 'Bearer ' . env('GITHUB_PERSONAL_ACCESS_TOKEN')],
            ]);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $errors = [];
            $response = $e->getResponse();
            $responseBody = json_decode($response->getBody()->getContents());
            $errors['message'] = $responseBody->message;
            return view('repos.index', compact('errors'));
        }
        $repos = json_decode($response->getBody()->getContents(), true);
        return view('repos.index', compact('repos'));
    }

    public function deletingGithubRepo()
    {
        return view('repos.delete');
    }

    public function deleteGithubRepo(Request $request)
    {
        $rules = [
            'name' => 'required',
        ];
        $customMessages = [
            'name.required' => trans('Repo Name is required'),
        ];

        $this->validate($request, $rules, $customMessages);

        try {
            $client = new \GuzzleHttp\Client();
            $response = $client->delete('https://api.github.com/repos/' . env('GITHUB_USERNAME') . '/' . $request->name, [
                'headers' => [
                    'content-type' => 'application/json',
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . env('GITHUB_PERSONAL_ACCESS_TOKEN')
                ],

            ]);
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            $errors = [];
            $response = $e->getResponse();
            $responseBody = json_decode($response->getBody()->getContents());
            $errors['message'] = $responseBody->message;
            if ($response->getStatusCode() == 422) {
                $errors['info'] = $responseBody->errors[0]->message ?? 'Something went wrong';
            }
            return Redirect::back()->withInput()->withErrors($errors);
        }
        return redirect()->route('get-all-github-repos')->with('success', 'Repo deleted successfully.');
    }
}
