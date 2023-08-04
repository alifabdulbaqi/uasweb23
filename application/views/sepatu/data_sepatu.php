<section class="content-header">
        <div class="col-sm">
            <div class="card">

                <div class="card-header">
                    <div class="card-title">
                    <h3>Data Sepatu</h3>
                    </div>
                    <div class="card-tools">
                        <a href="/sepatu/tambah" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Tambah Data</a>
                    </div>
                </div>
                <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr">
                            <th style="width: 10px">No</th>
                            <th>Kode Sepatu</th>
                            <th>Design</th>
                            <th>Merek</th>
                            <th>Model</th>
                            <th>Ukuran</th>
                            <th>QTY</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_sepatu as $sepatu) { ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $sepatu->kode_sepatu; ?></td>
                            <td class="p-0">
                            <img src="upload_data/<?php echo $sepatu->design_sepatu; ?>" alt="" width="50px">
                            </td>
                            <td><?php echo $sepatu->merek_sepatu; ?></td>
                            <td><?php echo $sepatu->nama_model; ?></td>
                            <td><?php echo $sepatu->ukuran_sepatu; ?></td>
                            <td><?php echo $sepatu->jumlah_sepatu; ?></td>
                            <td>
                                <a href="sepatu/lihat/<?php echo $sepatu->kode_sepatu; ?>" class="btn btn-success rounded-circle btn-sm"><i class="fas fa-eye"></i></a>
                                <a href="sepatu/edit/<?php echo $sepatu->kode_sepatu; ?>" class="btn btn-primary rounded-circle btn-sm"><i class="fas fa-pen"></i></a>
                                <a href="sepatu/hapus/<?php echo $sepatu->kode_sepatu; ?>" class="btn btn-danger rounded-circle btn-sm" onclick="return confirm('Yakin dihapus?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>