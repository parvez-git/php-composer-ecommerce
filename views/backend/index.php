
  <?php include_once('partials/header.php'); ?>

  <div class="container-fluid">
    <div class="row">
      
      <?php include_once('partials/sidebar.php'); ?>

      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
          <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
          </div>
        </div>

        <h2>Section title</h2>
        <div class="table-responsive">
          <table class="table table-bordered table-sm">
            <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Active</th>
                <th>Header</th>
                <th>Header</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach(\App\Models\User::all() as $user) : ?>
              <tr>
                <td><?= $user->id; ?></td>
                <td><?= $user->name; ?></td>
                <td><?= $user->email; ?></td>
                <td><?= $user->active; ?></td>
                <td><?= $user->email_verified_at; ?></td>
                <td><?= $user->email_verification_token; ?></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>

  <?php include_once('partials/footer.php'); ?>