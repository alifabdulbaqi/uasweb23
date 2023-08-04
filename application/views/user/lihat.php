<section class="content-header">
      <div class="col-sm">
          <div class="card">
              <div class="card-header">
                  <h3 class="">Data User</h3>
              </div>
              <div class="card-body">
                    
                  <table class="table table-bordered table-responsive">
                      <tr>
                          <td style="width: 20%">Nama</td>
                          <td style="width: 10px">:</td>
                          <td><?php echo $user->name; ?></td>
                      </tr>
                      <tr>
                          <td>Email</td>
                          <td>:</td>
                          <td> <?php echo $user->email; ?> </td>
                      </tr>
                      <tr>
                          <td>Username</td>
                          <td>:</td>
                          <td><?php echo $user->username; ?></td>
                      </tr>
                      <tr>
                          <td>Password</td>
                          <td>:</td>
                          <td><?php echo $user->password; ?></td>
                      </tr>
                      <tr>
                          <td>Profile</td>
                          <td>:</td>
                          <td><?php echo $user->avatar; ?></td>
                      </tr>
                  </table>
                  
              </div>
          </div>
      </div>
  </section>
  </body>

  </html>