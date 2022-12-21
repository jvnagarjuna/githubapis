# Getting started

## Installation

Software Requirements

    PHP Version: >= 8.1
    Composer Version: >= 2.4.4
    MySQL Version: MySQL 8.0 or >= 10.4.24-MariaDB

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

Generate a new application key

    php artisan key:generate

Start the local development server

    php artisan serve    

You can now access the server at http://localhost:8000

You can now access the all Github Repositories list at http://localhost:8000/getAllGithubRepos

You can now create the new Github Repository at http://localhost:8000/createGithubRepo
