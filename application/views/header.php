<head>
  <title>Catering</title>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <!--Hoja de estilo-->
  <link rel="stylesheet" href="<?php echo base_url();?>css/style.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/zoom.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <!--FONTS:-->
  <!--link href="https://fonts.googleapis.com/css?family=Montserrat|Raleway:900&display=swap" rel="stylesheet"-->
  <!--link href="https://fonts.googleapis.com/css?family=Montserrat|Roboto+Slab:700&display=swap" rel="stylesheet"-->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:500,900&display=swap" rel="stylesheet">   

  <script type="text/javascript">
      $(document).ready(function() {
        $("#servicio1").click(function() {
        $('#detalle1').html('');
        $("#servicio1 option:selected").each(function() {
             servicio1 = $('#servicio1').val();
             $.post("http://localhost:8080/catering/index.php/Principal/muestraDetalleServicio/1", {
             servicio1 : servicio1}, function(data) {
             $("#detalle1").html(data); });
            });
         });
       });
   </script>
   <script type="text/javascript">
      $(document).ready(function() {
        $("#servicio2").click(function() {
        $('#detalle2').html('');
        $("#servicio2 option:selected").each(function() {
             servicio2 = $('#servicio2').val();
             $.post("http://localhost:8080/catering/index.php/Principal/muestraDetalleServicio/2", {
             servicio2 : servicio2}, function(data) {
             $("#detalle2").html(data); });
            });
         });
       });
   </script>
   <script type="text/javascript">
      $(document).ready(function() {
        $("#servicio3").click(function() {
        $('#detalle3').html('');
        $("#servicio3 option:selected").each(function() {
             servicio3 = $('#servicio3').val();
             $.post("http://localhost:8080/catering/index.php/Principal/muestraDetalleServicio/3", {
             servicio3 : servicio3}, function(data) {
             $("#detalle3").html(data); });
            });
         });
       });
   </script>
   
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 450px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #f1f1f1;
      height: 100%;
    }

    .carousel-inner img {
      width: 50%; /* Set width to 100% */
      margin: auto;
      min-height:150px;
    }
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  </style>
</head>