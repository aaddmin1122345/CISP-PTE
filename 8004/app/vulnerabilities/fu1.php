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
        <h5>������Ŀ֮����ִ��</h5>
        <b>����</b>
        <p>�뿪ʼ����</p>
        <div class="card  teal lighten-1">
          <div class="card-content white-text">
            <span class="card-title">��֤�����Ƿ���</span>

            <form method=POST enctype="multipart/form-data" action="">
              <input type="text" name="cmd">
              <input type=submit value="�ύ">
            </form>

          </div>
          <div class="card-action">
            <?php

            $cmd = $_POST["cmd"];
            if (filter($cmd)) {
              if (isset($cmd)) {
                echo system("ping -c 1 $cmd");
              }
            } else {
              echo "�������������������ַ������������Ƿ���д��ȷ��";
            }

            ?>

          </div>
        </div>

      </div>

    </div>

  </div>
  <p align="center"><?php include("footer.php"); ?> </p>
</body>

</html>