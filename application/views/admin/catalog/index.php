
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

					<table class="table table-bordered">
						<thead>
							<tr>
								<th>ID</th>
								<th>Tên danh mục</th>
								<th>Danh mục cha</th>
								<th>Thứ tự</th>
								<th>Trạng thái</th>
								<th>Ngày tạo</th>
								<th>Thao tác</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							 foreach ($catalog as $key => $val): ?>
								<tr>
									<td><?php echo $val->id ?></td>
									<td><?php echo $val->name ?></td>
									<td><?php echo $val->loai ?></td>
									<td><?php echo $val->sort_order ?></td>
									<td><?php echo $val->is_show == 0 ? "Ẩn" : "Hiện" ?></td>
									<td><?php echo $val->create_time ?></td>
									<td>
			                            <a href="<?php echo admin_url('catalog/edit/') . $val->id ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
			                            <a onclick="confirm_del('<?php echo admin_url('catalog/del/') . $val->id ?>')" class="btn btn-danger btn-xs del"><i class="fa fa-trash-o"></i> Delete </a>
		                          </td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
