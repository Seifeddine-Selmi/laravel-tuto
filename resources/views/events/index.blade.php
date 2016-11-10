<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


</head>
<body>

<h1>Events</h1>
<?php //dump($events); //dd($events) ?>
    <ul>
        <?php foreach($events as $event){ ?>
              <li> <?=  $event ?> </li>
        <?php } ?>
    </ul>

<ul>
    @foreach($events as $event)
      <li> {{$event}}  </li>
    @endforeach
</ul>

<ul>
    @forelse($events as $event)
        <li> {{$event}}  </li>
    @empty
        <li> Array is empty  </li>
    @endforelse
</ul>
</body>
</html>
