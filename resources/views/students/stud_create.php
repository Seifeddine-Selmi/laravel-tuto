<html>

<head>
    <title>Student Management | Add</title>
</head>

<body>
<form action = "/create" method = "post">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">

    <table>
        <tr>
            <td>Name</td>
            <td><input type='text' name='stud_name' /></td>
        </tr>
        <tr>
            <td colspan = '2'>
                <input type = 'submit' value = "Add student"/>
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