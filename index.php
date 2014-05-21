<?php if(!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == ""){
    $redirect = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    header("Location: $redirect");
} ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EPFLCloudPrint</title>
</head>
<link rel="stylesheet" type="text/css" href="styles.css" />
<link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script src="script.js"></script>

<body id="body">
  <div id="wrapper">
    <h1><font color=#D65A5A>EPFL</font>CloudPrint</h1>
    <div id="cloud">
      <div id="cloud-background">
      </div>
      <div id="cloud-bar">
      </div>
      <div id="cloud-text-container"><p id="cloud-text"> Upload your file here</p>
      </div>
      <div id="cloud-foreground">
        <form id="formUpload" action="upload_file.php" method="post" enctype="multipart/form-data" >
          <input  type="file" name="file" id="fileElem" accept="application/pdf">
          <div id="fileSelect"></div>
        </form>
      </div>
    </div>

    <div id="dialog" class="panel panel-default">

      <form class="panel-body" id="dialog-form" action="print.php" method="post" >
        <div class="alert alert-danger" id="error" style="display:none;">
        </div>
        <div class="alert" id="print-result" style="display:none;">
        </div>

        <!-- hidden field for file name -->
        <input type="text" id="server_file_name" name="server_file_name" style="display:none;">

        <div class="input-group">
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-user"></span>
          </span>
          <input type="text" class="form-control" placeholder="Gaspar" id="user" name="user">
        </div>

        <div class="input-group">
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-lock"></span>
          </span>
          <input type="password" class="form-control" placeholder="Password" id="password" name="password">
        </div>

        <h3>Options</h3>

        <label class="radio inline">
          <input type="radio" checked="checked" id="selection_all" name="selection_all"/>
          All the pages
        </label>
        <label class="radio inline">
          <input type="radio" id="selection_selected" name="selection_selected"/>
          Selected only
        </label>

        <div class="row from_to">
          <div class="col-lg-6">
            <div class="input-group">
              <span class="input-group-addon">
                From
              </span>
              <input type="number" value="1" min="1" class="form-control" id="from" name="from">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="input-group">
              <span class="input-group-addon">
                To
              </span>
              <input type="number" value="1" min="1" class="form-control" id="to" name="to">
            </div>
          </div>
        </div>

        <div class="control-group inline">
          <label class="control-label" for="inputType">Number of copies</label>
          <div class="controls">
            <input type="number" min=1 class="form-control" value="1" id="number_copies" name="number_copies">
          </div>
        </div>


        <label class="checkbox inline">
          <input type="checkbox" checked name="double_sided"/>
          Double sided
        </label>

        <button type="submit" value="Submit" class="btn btn-danger btn-lg pull-right" disabled id="submit">PRINT</button>

      </form>
    </div>
  </div>
  <div id="footer">
    <p>
    <a style="margin-right:5px;" href="https://github.com/giacomogiudice/EPFLCloudPrint" target="_blank"><img id="logo-github" src="img/GitHub.png" alt="GitHub link"/></a>
    Jean-Baptiste Cordonnier, Charles Gallay and Giacomo Giudice
  </p>
  </div>
</div>

</body>

</html>
