<script src="//cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="#">Settings 1</a>
							</li>
							<li><a href="#">Settings 2</a>
							</li>
						</ul>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br>
				<form id="demo-form2" method="post" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" enctype="multipart/form-data">

					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Tên sản phẩm <span class="required">*</span>
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" name="name" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Tiêu đề ngắn <span class="required">*</span>
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" name="title" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12">Chọn danh mục</label>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<select class="select2_group form-control" name="catalog_id">
								<option value="0">Không xác định</option>
								<?php foreach ($catalogs as $catalog): ?>
									<optgroup label="<?php echo $catalog->name ?>">
										<?php foreach ($catalog->catalog_list as $val): ?>

											<option value="<?php echo $val->id ?>"> - <?php echo $val->name ?></option>

										<?php endforeach ?>
										
									</optgroup>
								<?php endforeach ?>
							</select>
						</div>
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Chọn hãng sản xuất</label>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<select class="select2_group form-control" name="producer_id">
								<?php foreach ($producers as $producer): ?>
									<option value="<?php echo $producer->id ?>"><?php echo $producer->name ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Giá <span class="required">*</span>
						</label>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<input type="number" name="price" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
						</div>
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Giảm giá  <span class="required">%</span>
						</label>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<input type="number" name="discount" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Ảnh đại diện <span class="required">*</span>
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="file" name="image" id="first-name" required="required" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">List Ảnh <span class="required">*</span>
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="file" name="imageList[]" id="first-name" multiple="" required="required" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Giới thiệu ngắn 
						</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<textarea name="content" id="editor1" rows="10" cols="80">

							</textarea>
							<script>
								CKEDITOR.replace( 'editor1' );
							</script>
						</div>
					</div>
					<div class="ln_solid"></div>
					<div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-6">
							<a href="<?php echo admin_url('product') ?>" class="btn btn-primary" type="button">Cancel</a>
							<button class="btn btn-primary" type="reset">Reset</button>
							<button type="submit" name="shopAny" class="btn btn-success">Submit</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>