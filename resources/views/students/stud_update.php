<html>

<head>
    <title>Student Management | Edit</title>
</head>

<body>
<form action = "/edit/<?php echo $users[0]->id; ?>" method = "post">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

    <table>
        <tr>
            <td>Name</td>
            <td>
                <input type = 'text' name = 'stud_name'
                       value = '<?php echo$users[0]->name; ?>'/>
            </td>
        </tr>
        <tr>
            <td colspan = '2'>
                <input type = 'submit' value = "Update student" />
            </td>
        </tr>
    </table>

</form>
<ul>
    <li><a href = "/view-records">All Students</a></li>
    <li><a href = "/insert">Insert Student</a></li>
    <li><a href = "/edit-records">Update Students</a></li>
    <li><a href = "/delete-records">Delete Student</a></li>
</ul>
</body>
</html>