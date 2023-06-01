@include('partials.header')

<div class="wrapper">

  @include('components.sidebar')

  <div class="main-panel">

    @include('components.topbar')

    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <ol class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li><a href="#">Admin</a></li>
              <li class="active">{{ $title }}</li>
            </ol>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <!-- Admin Table -->
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>Admin ID</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>admin1</td>
                  <td>admin1@example.com</td>
                  <td>
                    <!-- Add actions for admin, e.g., edit, delete buttons -->
                    <button class="btn btn-primary">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                  </td>
                </tr>
                <!-- Add more rows for additional admins -->
              </tbody>
            </table>
          </div>
          <div class="col-md-6">
            <!-- Regular Users Table -->
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>User ID</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>user1</td>
                  <td>user1@example.com</td>
                  <td>
                    <!-- Add actions for regular users, e.g., view, edit buttons -->
                    <button class="btn btn-info">View</button>
                    <button class="btn btn-primary">Edit</button>
                  </td>
                </tr>
                <!-- Add more rows for additional regular users -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    @include('components/footer')
  </div>
</div>
@include('partials/footer')