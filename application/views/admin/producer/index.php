
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
								<th>Tên hãng</th>
								<th>Giới thiệu ngắn</th>
								<th>Ngày tạo</th>
								<th>Thao tác</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							 foreach ($producer as $key => $val): ?>
								<tr>
									<td><?php echo $val->id ?></td>
									<td><?php echo $val->name ?></td>
									<td><?php echo strlen($val->content) > 35 ? substr($val->content, 0, 30) . ".." : $val->content; ?></td>
									<td><?php echo $val->create_time ?></td>
									<td>
										<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target=".modal-<?php echo $val->id; ?>">View Content</button>
			                            <a href="<?php echo admin_url('producer/edit/') . $val->id ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
			                            <a onclick="confirm_del('<?php echo admin_url('producer/del/') . $val->id ?>')" class="btn btn-danger btn-xs del"><i class="fa fa-trash-o"></i> Delete </a>
		                          </td>

								</tr>
								<div class="modal fade modal-<?php echo $val->id; ?>" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
			                    <div class="modal-dialog modal-lg">
			                      <div class="modal-content">

			                        <div class="modal-header">
			                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
			                          </button>
			                          <h4 class="modal-title" id="myModalLabel">Thông tin hãng - <?php echo $val->name ?></h4>
			                        </div>
			                        <div class="modal-body">
			                          <h4 style="font-size: 20; font-weight: bold" class="text-bold">Giới thiệu</h4>
			                          <p><?php echo $val->content; ?></p>
			                        </div>
			                        <div class="modal-footer">
			                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			                        </div>
			                      </div>
			                    </div>
			                  </div>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
