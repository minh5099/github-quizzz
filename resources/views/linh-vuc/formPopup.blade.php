

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<!-- Button to Open the Modal -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
			Open modal
		</button>
		<!-- The Modal -->
		<form action="" method="POST">
			<div class="modal fade" id="myModal">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<!-- Modal Header -->
						<div class="modal-header">
							<h4 class="modal-title">@if(isset($linhvuc)) Cập Nhật @else Thêm Mới @endif Lĩnh Vực</h4>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
						</div>

						<!-- Modal body -->
						<div class="modal-body">
							<div class="form-group">
								<label for="ten_linh_vuc">Lĩnh Vực</label>
								<input type="text" class="form-control" id="ten_linh_vuc" name="ten_linh_vuc" placeholder="Lĩnh Vực" @if(isset($linhVuc)) value="{{ $linhVuc->ten_linh_vuc }}" @endif>
							</div>
						</div>

						<!-- Modal footer -->
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-danger">Save Data</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>

</div>

</body>
</html>
