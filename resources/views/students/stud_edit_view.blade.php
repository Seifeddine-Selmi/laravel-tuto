<html>
<head>
    <title>View Student Records</title>
</head>

<body>

<table border = "1">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Edit</td>
    </tr>
    @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td><a href = 'edit/{{ $user->id }}'>Edit</a></td>
        </tr>
    @endforeach
</table>

<ul>
    <li><a href = "/view-records">All Students</a></li>
    <li><a href = "/insert">Insert Student</a></li>
    <li><a href = "/edit-records">Update Students</a></li>
    <li><a href = "/delete-records">Delete Student</a></li>
</ul>

</body>
</html>