<table border="1" width="50%" cellpadding="5" style="border-collapse: collapse" align="center">
    <thead>
        <tr>
            <th>Si.No</th>
            <th>Repository Name</th>
            <th>Repository Type</th>
        </tr>
    </thead>
    <tbody>
    @foreach($repos as $repo)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $repo['name'] }}</td>
            <td style="color: {{ $repo['private'] ? 'Tomato' : 'DodgerBlue' }}">{{ $repo['private'] ? 'Private' : 'Public' }}</td>
        </tr>
        @endforeach
    </tbody>
    <tr></tr>
</table>
