<?php

/*
** Funcion que carga esqueleto del sistema
*/

function skeleton(){

  echo '<link rel="stylesheet" href="/myBills/skeleton/css/bootstrap.min.css" >
	<link rel="stylesheet" href="/myBills/skeleton/css/bootstrap-theme.css" >
	<link rel="stylesheet" href="/myBills/skeleton/css/bootstrap-theme.min.css" >
	<link rel="stylesheet" href="/myBills/skeleton/css/jquery.dataTables.min.css" >
	<link rel="stylesheet" href="/myBills/skeleton/Chart.js/Chart.min.css" >
	<link rel="stylesheet" href="/myBills/skeleton/Chart.js/Chart.css" >
	
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="/myBills/skeleton/js/jquery-3.4.1.min.js"></script>
	<script src="/myBills/skeleton/js/bootstrap.min.js"></script>
	
	<script src="/myBills/skeleton/js/jquery.dataTables.min.js"></script>
	<script src="/myBills/skeleton/js/dataTables.editor.min.js"></script>
	<script src="/myBills/skeleton/js/dataTables.select.min.js"></script>
	<script src="/myBills/skeleton/js/dataTables.buttons.min.js"></script>
	
	<script src="/myBills/skeleton/Chart.js/Chart.min.js"></script>
	<script src="/myBills/skeleton/Chart.js/Chart.bundle.min.js"></script>
	<script src="/myBills/skeleton/Chart.js/Chart.bundle.js"></script>
	<script src="/myBills/skeleton/Chart.js/Chart.js"></script>';
}


function login(){

    echo '<form action="#" method="POST">
        <div class="form-group">
            <label for="email">Usuario:</label>
            <input type="text" class="form-control" placeholder="Ingrese usuario" id="user" name="user" style="text-align:center;">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" placeholder="ingrese password" id="pwd" name="pass" style="text-align:center;">
        </div><br>
        
        <button type="submit" class="btn btn-secondary" name="A">Ingresar</button>
        </form>';


}


function pastillasInfo($conn){

    echo '<div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="main.php">Home</a></li>
              <li><i class="fa fa-laptop"></i>Dashboard</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box blue-bg">
              <i class="fa fa-cloud-download"></i>
              <div class="count">6.674</div>
              <div class="title">Download</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box brown-bg">
              <i class="fa fa-shopping-cart"></i>
              <div class="count">7.538</div>
              <div class="title">Purchased</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box dark-bg">
              <i class="fa fa-thumbs-o-up"></i>
              <div class="count">4.362</div>
              <div class="title">Order</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box green-bg">
              <i class="fa fa-cubes"></i>
              <div class="count">1.426</div>
              <div class="title">Stock</div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

        </div>
        <!--/.row-->';

}


?>
