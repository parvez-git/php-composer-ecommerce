<?php backendpartials('header'); ?>

<div class="container-fluid">
    <div class="row">

        <?php backendpartials('sidebar'); ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <h1 class="h2">Create Category</h1>
                <div class="mb-2 mb-md-0">
                    <a href="/dashboard/categories" class="btn btn-sm btn-outline-secondary rounded-0">Back</a>
                </div>
            </div>

            <?php partials('notifications'); ?>
            <?php backendpartials('validator'); ?>

            <form action="/dashboard/categories/store" method="POST">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" class="form-control rounded-0">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Slug</label>
                    <div class="col-sm-10">
                        <input type="text" name="slug" class="form-control rounded-0">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">Active</div>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="active" id="gridCheck1">
                            <label class="form-check-label" for="gridCheck1">Active</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary rounded-0">Create</button>
                    </div>
                </div>
            </form>

        </main>
    </div>
</div>

<?php backendpartials('footer'); ?>