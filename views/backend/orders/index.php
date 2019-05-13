
<?php backendpartials('header'); ?>

<div class="container-fluid">
    <div class="row">

        <?php backendpartials('sidebar'); ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Orders &amp; Products</h1>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>Order ID</th>
                        <th>Product ID</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Invoice</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($orders as $order) : ?>
                        <tr>
                            <td><?php echo $order->id; ?></td>
                            <td><?php echo $order->order_id; ?></td>
                            <td><?php echo $order->product_id; ?></td>
                            <td><?php echo $order->quantity; ?></td>
                            <td><?php echo $order->price; ?></td>
                            <td>
                                <a href="/dashboard/invoice/<?php echo $order->id; ?>" class="btn btn-sm btn-info rounded-0">Invoice</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>

<?php backendpartials('footer'); ?>