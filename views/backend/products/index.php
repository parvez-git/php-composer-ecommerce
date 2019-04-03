
<?php backendpartials('header'); ?>

<div class="container-fluid">
    <div class="row">

        <?php backendpartials('sidebar'); ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Products</h1>
                <div class="mb-2 mb-md-0">
                    <a href="/dashboard/products/create" class="btn btn-sm btn-outline-success rounded-0">Create</a>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Sale Price</th>
                        <th>Active</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($products as $product) : ?>
                        <tr>
                            <td><?php echo $product->id; ?></td>
                            <td>
                                <?php if(file_exists($product->image)) : ?>
                                    <img width="20px" src="/<?php echo $product->image; ?>" alt="<?php echo $product->title; ?>">
                                <?php endif; ?>
                            </td>
                            <td><?php echo $product->title; ?></td>
                            <td><?php echo $product->category->name; ?></td>
                            <td>$<?php echo $product->price; ?></td>
                            <td>$<?php echo $product->sale_price; ?></td>
                            <td>
                                <?php if($product->active) : ?>
                                    <button type="button" class="badge badge-success rounded-0 border-0 p-1">active</button>
                                <?php else: ?>
                                    <button type="button" class="badge badge-danger rounded-0 border-0 p-1">inactive</button>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="/dashboard/products/edit/<?php echo $product->id; ?>" class="badge badge-warning rounded-0 text-white">
                                    <span data-feather="edit"></span>
                                </a>
                                <a href="/dashboard/products/delete/<?php echo $product->id; ?>" class="badge badge-danger rounded-0" 
                                    onclick=" return confirm('Are you sure, you want to delete product!');">
                                    <span data-feather="trash-2"></span>
                                </a>
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