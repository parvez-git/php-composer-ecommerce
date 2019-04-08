<?php include_once('partials/header.php');  /*var_dump($product);die();*/?>

	<div class="container my-5">
		<div class="wrapper row">
			<div class="preview col-md-6">
				
				<div class="preview-pic tab-content">
				  	<div class="tab-pane active" id="pic-1">
				  		<img class="img-fluid" src="/<?php echo $product->image; ?>" />
				  	</div>
				  	<div class="tab-pane" id="pic-2">
				  		<img src="http://placekitten.com/400/252" />
				  	</div>
				  	<div class="tab-pane" id="pic-3">
				  		<img src="http://placekitten.com/400/252" />
				  	</div>
				  	<div class="tab-pane" id="pic-4">
				  		<img src="http://placekitten.com/400/252" />
				  	</div>
				  	<div class="tab-pane" id="pic-5">
				  		<img src="http://placekitten.com/400/252" />
				  	</div>
				</div>
				<ul class="preview-thumbnail nav nav-tabs">
				  <li class="active">
				  	<a data-target="#pic-1" data-toggle="tab">
				  		<img class="img-fluid" src="/<?php echo $product->image; ?>" />
				  	</a>
				  </li>
				  <li><a data-target="#pic-2" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
				  <li><a data-target="#pic-3" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
				  <li><a data-target="#pic-4" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
				  <li><a data-target="#pic-5" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
				</ul>
				
			</div>
			<div class="details col-md-6">
				<h3 class="product-title"><?php echo $product->title; ?></h3>

				<p class="product-description"><?php echo $product->description; ?></p>
				<h4 class="price">sale price: <span>$<?php echo $product->sale_price; ?></span></h4>
				<h6 class="price text-muted">regular price: <span class="text-muted">$<?php echo $product->price; ?></span></h6>

				<div class="action">
					<form action="/cart/addcart" method="post">
						<input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
						<button type="submit" class="add-to-cart btn btn-default">add to cart</button>
					</form>
				</div>
			</div>
		</div>
	</div>

<?php include_once('partials/footer.php'); ?>