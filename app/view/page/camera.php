<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="asset/favicon.ico">
  <title>Camera | Camagru</title>
  <link rel="stylesheet" href="style/global.css">
  <link rel="stylesheet" href="style/layout.css">
  <link rel="stylesheet" href="style/camera.css">
  <script src='script/camera.js' defer></script>
</head>
<body>
  <?php include 'view/components/header.php'; ?>
  <div class="body__container">
    <main>
      <div class="photo">
        <video hidden></video>
        <canvas></canvas>
        <div id="take-photo-btn"><img width="30px" src="asset/photo-icon.svg"></div>
      </div>
      <div id="upload-btn">Upload</div>
      <div class='superposable-container'>
        <img class='superposable' src='asset/superposable/thug-life.png' />
        <img class='superposable' src='asset/superposable/thug-life.png' />
        <img class='superposable' src='asset/superposable/thug-life.png' />
        <img class='superposable' src='asset/superposable/thug-life.png' />
        <img class='superposable' src='asset/superposable/thug-life.png' />
        <img class='superposable' src='asset/superposable/thug-life.png' />
        <img class='superposable' src='asset/superposable/thug-life.png' />
      </div>
    </main>
    <aside class='draft-container'>
      <img class='draft' src='https://picsum.photos/200/200' />
      <img class='draft' src='https://picsum.photos/200/200' />
      <img class='draft' src='https://picsum.photos/200/200' />
      <img class='draft' src='https://picsum.photos/200/200' />
    </aside>
  </div>
  <?php include 'view/components/footer.php' ?>
</body>
</html>