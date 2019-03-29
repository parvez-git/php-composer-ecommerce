<!-- SUCCESS MESSAGE -->
<?php if(isset($_SESSION['success'])) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span><?php echo $_SESSION['success']; ?></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>	

<!-- ERROR MESSAGE -->
<?php if(isset($_SESSION['error'])) : ?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <span><?php echo $_SESSION['error']; ?></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>