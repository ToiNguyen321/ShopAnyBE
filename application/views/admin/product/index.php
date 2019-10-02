<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Sản phẩm <small>(<?php echo count($products) ?>)</small></h2>
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
			<table id="datatable" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>Tên SP</th>
						<th>Giá</th>
						<th>Giảm giá %</th>
						<th>Danh mục</th>
						<th>Hãng SX</th>
						<th>View</th>
						<th>Ngày tạo</th>
						<th>Thao tác</th>
					</tr>
				</thead>


				<tbody>
					<?php foreach ($products as $product): ?>
						
						<tr>
							<th><?php echo $product->id ?></th>
							<th><?php echo $product->name ?></th>
							<th><?php echo $product->price ?></th>
							<th><?php echo $product->discount ?></th>
							<th><?php echo $product->catalog ?></th>
							<th><?php echo $product->producer ?></th>
							<th><?php echo $product->view ?></th>
							<th><?php echo $product->create_time ?></th>
							<th> 
								<a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a>
	                            <a href="<?php echo admin_url('product/edit/') . $product->id ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
	                            <a href="<?php echo admin_url('product/del/') . $product->id ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
	                          </td>
		                     </th>
						</tr>

					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>