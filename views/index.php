<?php include_once('partials/header.php'); ?>

<?php include_once('partials/slider.php'); ?>

	<div class="main">

		<div class="container my-5">

			<div class="row">
				<?php foreach($products as $product) : ?>
		        <div class="col-md-3 col-sm-6">
		            <div class="product-grid">
		                <div class="product-image">
		                    <a href="#">
		                        <img class="pic-1" src="<?php echo $product->image; ?>">
		                        <img class="pic-2" src="<?php echo $product->image; ?>">
		                    </a>
		                    <ul class="social">
		                        <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
		                        <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
		                        <li>
									<form action="/cart/addcart" method="post">
										<input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
										<button type="submit" class="add-to-cart p-0" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></button>
									</form>
								</li>
		                    </ul>
		                    <span class="product-new-label">Sale</span>
		                    <span class="product-discount-label">20%</span>
		                </div>
		                <ul class="rating">
		                    <li class="fa fa-star"></li>
		                    <li class="fa fa-star"></li>
		                    <li class="fa fa-star"></li>
		                    <li class="fa fa-star"></li>
		                    <li class="fa fa-star disable"></li>
		                </ul>
		                <div class="product-content">
		                    <h3 class="title">
								<a href="/product/<?php echo $product->slug; ?>"><?php echo $product->title; ?></a>
							</h3>
		                    <div class="price">$<?php echo $product->sale_price; ?>
		                        <span>$<?php echo $product->price; ?></span>
		                    </div>
							<form action="/cart/addcart" method="post">
								<input type="hidden" name="product_id" value="<?php echo $product->id; ?>">
								<button type="submit" class="add-to-cart p-0">+ Add To Cart</button>
							</form>
		                </div>
		            </div>
				</div>
				<?php endforeach; ?>
		
		    </div>

		</div>

	</div>

<?php include_once('partials/footer.php'); ?>