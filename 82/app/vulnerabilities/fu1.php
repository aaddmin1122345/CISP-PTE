<!DOCTYPE html>
<html>

<head>
  <?php header('Content-type:text/html;charset=gbk'); ?>

  <meta charset="gb2312">
  <title>CISP-PTE ��֤����</title>
  <link rel="stylesheet" href="../css/materialize.min.css">

</head>

<body>
  <div class="container">

    <?php error_reporting(0); ?>

    <!-- Navbar goes here -->

    <!-- Page Layout here -->
    <div class="row">

      <div class="col s3">
        <?php
        include("nav1.php");

        include("function.php");
        ?>
      </div>

      <div class="col s9">
        <h5>������Ŀ֮�ļ��ϴ�ͻ��</h5>
        <b>����</b>
        <p>�뿪ʼ����</p>
        <div class="card  teal lighten-1">
          <div class="card-content white-text">
            <span class="card-title">�ļ��ϴ�</span>
            <?php

            $files = @$_FILES["files"];

            if (judge($files)) {
              $fullpath = $_REQUEST["path"] . $files["name"];
              if (move_uploaded_file($files['tmp_name'], $fullpath)) {
                echo "<a href='$fullpath'>ͼƬ�ϴ��ɹ�</a>";
              }
            }
            echo '<form method=POST enctype="multipart/form-data" action="">
                      <input type="file" name="files">
                      <input type=submit value="�ϴ�"></form>';

            ?>
          </div>
          <div class="card-action">
            <?php if ($fullpath != '') {
              echo "�ļ���Ч���ϴ��ɹ��� <a href=\"$fullpath\"> ���Ҳ鿴</a>";
            } ?>
          </div>
        </div>

      </div>

    </div>

  </div>
  <p align="center"><?php include("footer.php"); ?> </p>
</body>

</html>