<?php 
include '../app/ProductsController.php';
include '../app/BrandsController.php';
$brandController=new BrandController();
$brands=$brandController->getBrands();
$productsContoller=new ProductsController();
$products=$productsContoller->getProducts();
?>
<html>
<!DOCTYPE html>
<head>
	<?php include '../layouts/head.template.php'; ?>
</head>
<style>
	.btn-warning {
		background-color: #8F3A84 !important;
	}
	.btn-primary {
		background-color: #CD05A6 !important;
	}
</style>
<body>
	<?php include '../layouts/nav.template.php'; ?>
	<div class="container-fluid">
		<div class="row">
			<?php include '../layouts/sidebar.template.php'; ?>
			
			<div class="col-md-10 col-lg-10 col-sm-12">
				<section>
					<div class="row bg-light m-2">
						<div class="col">
							<label>
								products
							</label>
						</div>
						<div class="col">
							<button data-bs-toggle="modal" data-bs-target="#addProductModal" class=" float-end btn btn-primary">
								add products
							</button>
						</div>
					</div>
				</section>
				<section>
					<div class="row">
						<?php if  (isset($products)&& count($products)) : ?>
							<?php foreach($products as $product): ?>
							<div class="col-md-4 col-sm-12">
								<div class="card mb-2">
									<img src="<?= $product -> cover ?>" class="card-img-top" alt="...">
									<div class="card-body">
										<h5 class="card-title"><?= $product -> name ?></h5>
										<h6 class="card-subtitle mb-2 text-muted"><?= $product -> description ?></h6>
										<p class="card-text"><?= $product -> features ?></p>

										<div class="row">
											<a data-bs-toggle="modal" data-bs-target="#addProductModal" href="#" class="btn btn-warning mb-1 col-6">
												edit
											</a>
											<a onclick="eliminar(<?= $product->id?>)" href="#" class="btn btn-danger mb-1 col-6">
												delete
											</a>
											<a href="details.php" class="btn btn-info col-12">
												details
											</a>
										</div>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</section>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<!-- action addProduct  -->
	<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<form action="addProduct" method="post">
					<div class="modal-body align-text-bottom">
						
					<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="name" required>
					<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="slug" required>
					<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="description" required>
					<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="features" required>
					<select name="brand_id" required class="form-control">
				


					</select>
					<input type="number" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="brand" required>
					<input type="" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" placeholder="brand" required>



						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
							Close
						</button>
						<button type="submit" class="btn btn-primary">
							Save changes
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php include '../layouts/scripts.template.php' ?>
	<script type="text/javascript">
		function eliminar(id) {
			swal({
					title: "Are you sure?",
					text: "Once deleted, you will not be able to recover this imaginary file!",
					icon: "warning",
					buttons: true,
					dangerMode: true,
				})
				.then((willDelete) => {
					if (willDelete) {
						
						swal("Poof! Your imaginary file has been deleted!", {
							icon: "success",
						});
					} else {
						swal("Your imaginary file is safe!");
					}
				});
		}
		
		</script>
	</body>
</html>