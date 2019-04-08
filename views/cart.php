<?php include_once('partials/header.php'); ?>

<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">E-COMMERCE CART</h1>
    </div>
</section>

<div class="container mb-4">
    <div class="row">

        <?php if(count($cart) > 0) : ?>

        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Product</th>
                            <th scope="col">Available</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Unit Price</th>
                            <th scope="col" class="text-right">Price</th>
                            <th><form action="/cart/clear" method="POST"><button class="btn btn-sm btn-outline-danger">Clear Cart</button></form></th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach($cart as $id => $product) : ?>
                            <tr>
                                <td><img width="30px" src="<?php echo $product['image']; ?>" /> </td>
                                <td><?php echo $product['title']; ?></td>
                                <td>In stock</td>
                                <td><input class="form-control" type="text" value="<?php echo $product['quantity']; ?>" /></td>
                                <td class="text-right">$<?php echo $product['unit_price']; ?></td>
                                <td class="text-right">$<?php echo $product['total_price']; ?></td>
                                <td class="text-right">
                                    <form action="/cart/remove" method="post">
                                        <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button> 
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sub-Total</td>
                            <td class="text-right">$<?php echo $subtotal; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Shipping</td>
                            <td class="text-right">$<?php echo $shippingprice; ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong>$<?php echo $grandtotal; ?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <button class="btn btn-block btn-light">Continue Shopping</button>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <button class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button>
                </div>
            </div>
        </div>

        <?php else: ?>
            <h4 class="m-auto text-info">No Product added to Cart!</h4>
        <?php endif; ?>

    </div>
</div>

<?php include_once('partials/footer.php'); ?>