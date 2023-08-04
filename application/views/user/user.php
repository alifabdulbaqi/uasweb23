<section class="content-header">
        <div class="col-sm">
            <div class="card">

                <div class="card-header">
                    <div class="card-title">
                    <h3>Data Sepatu</h3>
                    </div>
                    <div class="card-tools">
                        <a href="/sepatu/tambah_user" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Tambah Data</a>
                    </div>
                </div>
                <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr">
                            <th style="width: 10px">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Avatar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_user as $user) { ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $user->name; ?></td>
                            <td><?php echo $user->email; ?></td>
                            <td><?php echo $user->username; ?></td>
                            <td>...</td>
                            <td><?php echo $user->avatar; ?></td>
                            <td>
                                <a href="lihat_user/<?php echo $user->id; ?>" class="btn btn-success rounded-circle btn-sm"><i class="fas fa-eye"></i></a>
                                <a href="edit_user/<?php echo $user->id; ?>" class="btn btn-primary rounded-circle btn-sm"><i class="fas fa-pen"></i></a>
                                <a href="hapus_user/<?php echo $user->id; ?>" class="btn btn-danger rounded-circle btn-sm" onclick="return confirm('Yakin dihapus?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>