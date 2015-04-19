<!DOCTYPE html>
<html lang="en">

<?php 
if (isset($_GET["state"])) {

$statement = "https://congress.api.sunlightfoundation.com/legislators?apikey=a43f35a5fbfb40cd99e558b07e33cdb8&order=chamber&state_name=".$_GET["state"];

$legs = json_decode(file_get_contents($statement),true);

}

$cnt = 0;

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tldreform</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/one-page-wonder.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation --> 
    <!-- Full Width Image Header -->
    <header class="header-image" >
        <div class="headline">
            <h1><?php                 
                if (isset($_GET["state"])) {
                    echo $_GET["state"]; 
                } ?>
            </h1>
            <p><a href="http://tldreform.com/">Or choose another state</a></p>
        </div>
    </header>

    <!-- Page Content -->
    <div class="container">

        <hr class="featurette-divider">

        <!-- First Featurette -->

        <?php foreach ($legs['results'] as $leg) { ?>

        <div class="featurette" id="about">
            <img <?php 
            if ($cnt % 2 == 0) {
                echo 'class="featurette-image img-circle img-responsive pull-right"'; 
             } 
             else {
                echo 'class="featurette-image img-circle img-responsive pull-left"';
             }

            ?> height = "400px" width = "400px" src=<?php echo '"'."images-gh-pages/congress/original/".$leg["bioguide_id"].'.jpg"' ?>>
            <h2 class="featurette-heading"><?php echo $leg["title"].". ".$leg["first_name"]." ".$leg["last_name"] ?><br><span class="text-muted"><?php echo $leg["state_name"]; ?></span></h2>
            <div class="col-xs-12 col-md-6">
            <h3>
            <table class="table">
            <tbody>
            <tr><th>Birthday</th><td><?php echo $leg["birthday"] ?></td></tr>
              <?php if(isset($leg["facebook_id"])){ ?>
            <tr><th>Facebook</th><td><a href=<?php echo '"https://www.facebook.com/'.$leg["facebook_id"].'"' ?> >Link</a></td></tr>
              <?php } ?>
              <?php if (isset($leg["twitter_id"])) { ?>
            <tr><th>Twitter</th><td><a href=<?php echo '"https://twitter.com/'.$leg['twitter_id'].'"'; ?>>Twitter Page</a></td>
              <?php } ?>
            <tr><th>Email</th><td><?php echo $leg["oc_email"]; ?></td></tr>
              <tr><th>Phone</th><td><?php echo $leg["phone"]; ?></td></tr>
              <tr><th>Party</th><td><?php echo $leg["party"]; ?></td></tr>
              </tbody>
              </table>
            </h3>
            </div>
        </div>

        <hr class="featurette-divider">

        <?php
        $cnt++;
         } ?>


    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
