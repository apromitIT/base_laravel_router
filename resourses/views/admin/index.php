<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>This is index page</h1>

  <div style="width: 200px;">
    <h3>Store</h3>
    <form action="users/" method="POST">
      <input type="text" placeholder="value", name="title">
      <input type="submit">
    </form>
  </div>
  <div>
    This is title:
    <div>
      <?php
      if (isset($_SESSION['message'])) {
        echo $_SESSION['message'];
      }
      ?>
    </div>
  </div>
</body>
</html>