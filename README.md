# Getting started

## Installation

Software Requirements

    PHP Version: >= 8.1
    Composer Version: >= 2.4.4

Clone the repository

    git clone https://github.com/jvnagarjuna/githubapis.git

Switch to the repo folder

    cd githubapis

Install all the laravel dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Add or update the below configuration changes in the .env file

    GITHUB_PERSONAL_ACCESS_TOKEN=<<ENTER_VALUE>>
    GITHUB_USERNAME=<<ENTER_VALUE>>

Generate a new application key

    php artisan key:generate

Start the local development server

    php artisan serve

You can now access the all Github Repositories list at http://localhost:8000/getAllGithubRepos

You can now create the new Github Repository at http://localhost:8000/createGithubRepo

You can now delete the existing Github Repository at http://localhost:8000/deletingGithubRepo

Test cases for the github repository list

    URI: http://localhost:8000/getAllGithubRepos
    The env file's GITHUB PERSONAL ACCESS TOKEN is necessary; if it is not entered correctly, "bad credentials" are displayed, which prevents the Github repos list from appearing.

Test cases for creating a GitHub repository

    URI: http://localhost:8000/createGithubRepo
    1. The env file's Github Personal Access Token is necessary; if it is not entered correctly, "bad credentials" are displayed, which prevents the Github repo from adding whenever users enter the repo name and submit.
    2. Repo name is required; if not provided, it shows a "Repo Name is Required" error message on screen.
    3. Duplicate repo name should not be entered, if enter it displays two errors as 'Repository creation failed' and other one as 'name already exists on this account'

Test cases for deleting a GitHub repository

    URI: http://localhost:8000/createGithubRepo
    1. The env file's Github Personal Access Token is necessary; if it is not entered correctly, "bad credentials" are displayed, which prevents the Github repo from deleting whenever users enter the repo name and submit.
    2. Repo name is required; if not provided, it shows a "Repo Name is Required" error message on screen.
    3. The error message "Not found" appears on the screen if no existing repo name is entered.


