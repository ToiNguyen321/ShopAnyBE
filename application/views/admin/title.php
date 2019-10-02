<div class="page-title">
	<div class="title_left">
		<h3><?php echo $title ?></h3>
	</div>
	<?php if(isset($add) && $add != ''): ?>
		<div class="title_right">
			<div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
              <a href="<?php echo admin_url($add); ?>"><button type="submit" class="btn btn-success">Thêm mới</button></a>
            </div>
			
		</div>
	<?php endif; ?>
</div>
<div class="clearfix"></div>