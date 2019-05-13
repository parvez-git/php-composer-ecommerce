<?php include_once('partials/header.php'); ?>

	<div class="container my-5">
		<div class="wrapper row">
			<div class="preview col-md-6">
				
				<div class="preview-pic tab-content">
				  	<div class="tab-pane active" id="pic-1">
				  		<img class="img-fluid" src="/<?php echo $product->image; ?>" />
					</div>
					<?php foreach($product->images as $gallery) : ?>
				  	<div class="tab-pane" id="pic-gall-<?php echo $gallery->id; ?>">
				  		<img src="/<?php echo $gallery->image; ?>" />
					</div>
					<?php endforeach; ?>
				</div>

				<?php if(count($product->images) > 0) : ?>

				<ul class="preview-thumbnail nav nav-tabs">
				  	<li class="active">
				  		<a data-target="#pic-1" data-toggle="tab">
				  			<img class="img-fluid" src="/<?php echo $product->image; ?>" />
				  		</a>
				  	</li>
				  	<?php foreach($product->images as $gallery) : ?>
						<li>
							<a data-target="#pic-gall-<?php echo $gallery->id; ?>" data-toggle="tab">
								<img src="/<?php echo $gallery->image; ?>" />
							</a>
						</li>
				  	<?php endforeach; ?>
				</ul>

				<?php endif; ?>

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