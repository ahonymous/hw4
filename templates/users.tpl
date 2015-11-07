<html>
<head>
    <title>Home work #4</title>
</head>
<body>
<h1>Index</h1>
<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>password in MD5</th>
        <th>email</th>
        <th>Register date</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <tr>
        {section name=i loop=$users}
            <td>{$users.id}</td>
            <td>{$users.name}</td>
            <td>{$users.password}</td>
            <td>{$users.email}</td>
            <td>{$users.data_reg}</td>
            <td><a href="/index.php?action=users&subaction=del&id={$users.id}"></td>
        {/section}
    </tr>
    </tbody>
</table>
</body>
</html>