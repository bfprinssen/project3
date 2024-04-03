
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tweet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link href="css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  </head>
  <body>
 <nav class="navbar">     
       <a href="index.php" class="home">Home</a>
      
       <a href="tweetviewer.php">Tweets </a>
        <a href="logout.php" class="logout">Logout</a> 
        </nav>
    <div class="container">
    <div class="row justify-content-center">
      <div class="col-6 pt-5">

        <div class="card">
          <div class="card-header">
            <strong>Chirpify</strong> Plaats bericht:
          </div>
          <form action="insert_tweet.php" method="post">
          <div class="card-body">
         <input type="text" class="form-control" name="tweet_message" placeholder="jouw bericht" aria-label="Message" aria-describedby="input-group-button-right">
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-success w-100" id="input-group-button-right">verstuur <i class="bi bi-airplane"></i></button>
          </div>
        </form>
        </div>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
