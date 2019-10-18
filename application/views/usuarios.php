<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
	<div style='height:20px;'></div>  
    <div style="padding: 10px">
    <h1><img id="imgPagina" src="<?php echo base_url();?>img/team-building.svg">Usuarios</h1>
		<?php echo $output; ?>
    </div>
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
