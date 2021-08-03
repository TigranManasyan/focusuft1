<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>


    </style>
</head>
<body>
<table style="border: solid 1px">
    <tr>
        <th>From</th>
        <th>Subject</th>
        <th>Email</th>
        <th>Text</th>
    </tr>
    <tr>
        <td><?=$content['name'].' '.$content['surname']?></td>
        <td><?=$content['subject']?></td>
        <td><?=$content['email']?></td>
        <td><?=$content['text']?></td>
    </tr>
</table>
</body>
</html>
