
<!DOCTYPE html>

<html lang="en">
  <head>
    <?php
      include "../controller/ConvertWeb.php";
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>917幫你運物流平台</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- Plugin CSS -->
    <link href="../vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/creative.min.css" rel="stylesheet">

  </head>

  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="../index.html" style="color:#F05F40;" >
          <picture>
          <img src="../img/LOGO.png" hight="50" width="70">
          </picture>
        </a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive" >
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link " href="../index.html#about" style="color:#212529; " >關於我們</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="../index.html#services" style="color:#212529;" >服務項目</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../index.html#contact" style="color:#212529;" >聯絡我們</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-outline-danger btn-xs" href="search.php" style="font-size:20px;">貨物查詢</a>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid text-center my-auto" style="background-image:url('../img/search_bg.jpg');background-size:cover;height:1080px;">
      <?php if(isset($_GET['orderNo']))
         {
      ?>
      <div class="row">
        <div class="col col-lg-8 mx-auto " style="transform: translateY(200px);">
          <div class="alert" style="background-color:rgba(204,255,255,0.7);">
            <div style="max-height:800px; overflow: auto;" >
              <?php
                getData();
              ?>
            </div>
          </div>
        </div>
      </div>
        <?php
            }else{
        ?>
          <div class="row">
            <div class="col col-lg-6 mx-auto"  style="transform: translateY(100%);">
              <div class="alert" style="background-color:rgba(204,255,255,0.7);">
                <form action="" method="get" onsubmit ="return check();">
                  <div class="form-group">
                    <label for="trackNoTextarea">請輸入單號，多筆單號請用","分開</label>
                    <textarea class="form-control" id="trackNoTextarea" rows="3" name="orderNo"></textarea>
                  </div>
                  <div class = "form-group row">
                    <label for="captchaText" class="col-sm-2 col-form-label">驗證碼:</label>
                    <div class="col-lg-3">
                        <input name="captcha_code" type="text" class="form-control" id="captchaText"/>
                    </div>
                    <div class="col-lg-5">
                        <img src="../controller/captcha_code.php" id="imgCode" align="left" style=" cursor: pointer;" />
                    </div>
                    <div class="col-lg-2">
                      <button type="submit" class="btn btn-primary" >查詢</button>
                    </div>        
                  </div>       
                </form>
              </div>
            </div>
          </div>
        <?php  } ?>
    </div>
    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="../vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
  -->

    <!-- Custom scripts for this template -->
    <script src="../js/creative.min.js"></script>
    <script src="../js/CopyLink.js"></script>
    <script src="../js/CaptchaCheck.js"></script>
    <script src="../js/jquery.session.js"></script>
  </body>

</html>
