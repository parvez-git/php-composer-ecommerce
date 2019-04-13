<?php backendpartials('header'); ?>

<div class="container-fluid">
    <div class="row">

        <?php backendpartials('sidebar'); ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <h1 class="h2">Edit Product</h1>
                <div class="mb-2 mb-md-0">
                    <a href="/dashboard/products" class="btn btn-sm btn-outline-secondary rounded-0">Back</a>
                </div>
            </div>

            <?php backendpartials('validator'); ?>

            <form action="/dashboard/products/update" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id" value="<?php echo $product->id; ?>">
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" name="title" class="form-control rounded-0" value="<?php echo $product->title; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                        <select name="category_id" class="form-control rounded-0">
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>         
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea name="description" class="form-control rounded-0"><?php echo $product->description; ?></textarea>
                    </div>
                </div>         
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                        <input type="number" name="price" class="form-control rounded-0" value="<?php echo $product->price; ?>">
                    </div>
                </div>         
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Sale Price</label>
                    <div class="col-sm-10">
                        <input type="number" name="sale_price" class="form-control rounded-0" value="<?php echo $product->sale_price; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-8">
                        <input type="file" name="image" class="form-control-file">
                    </div>
                    <div class="col-sm-2">
                        <img width="30px" src="/<?php echo $product->image; ?>" alt="<?php echo $product->title; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">Active</div>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="active" id="gridCheck2" <?php echo $product->active ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="gridCheck2">Active</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">Active on Slider</div>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="active_on_slider" id="activeonslider" <?php echo $product->active_on_slider ? 'checked' : ''; ?>>
                            <label class="form-check-label" for="activeonslider">Active</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary rounded-0">Edit</button>
                    </div>
                </div>
            </form>

        </main>
    </div>
</div>

<?php backendpartials('footer'); ?>