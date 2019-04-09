
<?php include_once('partials/header.php'); ?>

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">E-COMMERCE CHECKOUT</h1>
    </div>
</section>

<div class="container">

    <?php backendpartials('validator'); ?>

    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">
                    <?php echo count($cart); ?>
                </span>
            </h4>
            <ul class="list-group mb-3">

                <?php foreach($cart as $id => $product) : ?>
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0"><?php echo $product['title']; ?></h6>
                            <small class="text-muted">Quantity: <?php echo $product['quantity']; ?></small>
                        </div>
                        <span class="text-muted">$<?php echo $product['total_price']; ?></span>
                    </li>
                <?php endforeach; ?>

                <li class="list-group-item d-flex justify-content-between">
                    <span>Sub-Total</span>
                    $<?php echo $subtotal; ?>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Shipping Price</span>
                    $<?php echo $shippingprice; ?>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (USD)</span>
                    <strong>$<?php echo $grandtotal; ?></strong>
                </li>
            </ul>

        </div>
        <div class="col-md-8 order-md-1 mb-4">
            <h4 class="mb-3">Billing address</h4>

            <form class="needs-validation" action="/checkout/shipping" method="post">

                <div class="mb-3">
                    <label for="firstName">First name</label>
                    <input type="text" class="form-control" id="firstName" name="name" value="<?php echo $user->name; ?>" required="">
                </div>

                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $user->email; ?>">
                </div>

                <div class="mb-3">
                    <label for="phone">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                </div>

                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="address" required="">
                </div>

                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
            </form>
        </div>

    </div>
</div>

<?php include_once('partials/footer.php'); ?>