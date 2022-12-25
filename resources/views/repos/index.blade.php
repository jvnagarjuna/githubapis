<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <h3><a href="{{ route('create-github-repo') }}">Create a Repo</a> |
            <a href="{{ route('deleting-github-repo') }}">Delete a Repo</a>
        </h3>
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems.<br><br>
            <ul>
                @foreach ($errors as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h2>Repositories List</h2>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="table-responsive table-bordered">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Si.No</th>
                        <th>Repository Name</th>
                        <th>Repository Type</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($repos))
                    @foreach($repos as $repo)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $repo['name'] }}</td>
                        <td style="color: {{ $repo['private'] ? 'Tomato' : 'DodgerBlue' }}">{{ $repo['private'] ?
                            'Private'
                            :
                            'Public' }}</td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
</body>

</html>
