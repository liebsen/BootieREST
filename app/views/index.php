<div class="col-md-12">
	<div class="page-header">
		<h1>Bootie <small>Micro Web Application Framework</small></h1>
	</div>
	<?php if(count($routes)):?>
        <ul>
        <?php foreach($routes as $url => $route):?>
            <li>
                <a href="<?php echo $url;?>">
                	<?php echo $route->request_method?:'GET';?> <?php echo $url;?>
                </a>
            </li>
        <?php endforeach;?>
        </ul>
    <?php endif;?>
	</div>
</div>