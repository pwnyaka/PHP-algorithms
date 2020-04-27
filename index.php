<?php
$path = realpath(isset($_GET['path']) ? $_GET['path'] : $_SERVER["DOCUMENT_ROOT"]);
//var_dump($path);

$dir = new DirectoryIterator($path);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Explorer</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/1a0cb08fb1.css">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
  <a class="back-btn" href='/?path=<?=$path?>/..'>Назад</a><br><br>
  <ul>
      <?foreach ($dir as $item):?>
          <? if ($item->isDot()) continue; ?>
          <? if ($item->isDir()):?>
          <li><a class="dir-btn" href="/?path=<?=$item->getPathname()?>"><i class="fa fa-folder"></i><?=$item?></a></li>
          <?else:?>
          <li><p class="file"><i class="fa fa-file"></i><?=$item?></p></li>
          <? endif; ?>
      <? endforeach; ?>
  </ul>
</div>
</body>
</html>