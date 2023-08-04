  <section class="content-header">
      <div class="col-sm">
          <div class="card">
              <div class="card-header">
                  <h3 class="">Data Sepatu</h3>
              </div>
              <div class="card-body">
                    
                  <table class="table table-bordered table-responsive">
                      <tr>
                          <td style="width: 20%">Kode Sepatu</td>
                          <td style="width: 10px">:</td>
                          <td><?php echo $sepatu->kode_sepatu; ?></td>
                      </tr>
                      <tr>
                          <td>Design</td>
                          <td>:</td>
                          <td> <?php echo $sepatu->design_sepatu; ?> </td>
                      </tr>
                      <tr>
                          <td>Merek</td>
                          <td>:</td>
                          <td><?php echo $sepatu->merek_sepatu; ?></td>
                      </tr>
                      <tr>
                          <td>Model</td>
                          <td>:</td>
                          <td><?php echo $sepatu->model_sepatu; ?></td>
                      </tr>
                      <tr>
                          <td>Ukuran</td>
                          <td>:</td>
                          <td><?php echo $sepatu->ukuran_sepatu; ?></td>
                      </tr>
                      <tr>
                          <td>QTY</td>
                          <td>:</td>
                          <td><?php echo $sepatu->jumlah_sepatu; ?></td>
                      </tr>
                  </table>
                  
              </div>
          </div>
      </div>
  </section>
  </body>

  </html>