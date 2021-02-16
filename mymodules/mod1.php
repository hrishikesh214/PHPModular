<?php 

function mod1($props){
	ob_start(); ?>

<style type="text/css">
	p{
		background: <?=$props['color']?>;
		padding: 5px;
	}
</style>
<p style="color:red">hi <?=$props['name']?></p>

<?php 
return ob_get_clean();
}