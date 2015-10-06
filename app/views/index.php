<div class="col-md-12">
	<div class="page-header">
		<h1>Bootie <small>Micro Web Application Framework</small></h1>
	</div>
	<?php if(count($routes)):?>
        <ul>
        <?php foreach($routes as $route):?>
            <li>
                <a href="/blog/">
                	<?php echo $route->class;?>
                </a>
            </li>
        <?php endforeach;?>
        </ul>
    <?php endif;?>
	</div>
</div>