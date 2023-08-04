<section class="content-header">
    <div class="col-sm">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class=""><?php echo $judul; ?></h3>
            </div>

            <form method="post" action=" <?php echo base_url(); ?>/sepatu/update_user" enctype="multipart/form-data">
                <div class="card-body">
                <div class="form-group">
                        <label>ID Sepatu</label>
                        <input type="text" class="form-control" id="" placeholder="Masukan Merek Sepatu" name="id"
                        value="<?php echo $user->id; ?>">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" id="" placeholder="Masukan Merek Sepatu" name="name"
                        value="<?php echo $user->name; ?>">
                    </div>
                    <div class="form-group">
                        <label for="ukuran">Email</label>
                        <input type="email" class="form-control" placeholder="Masukan Ukuran" name="email"
                        value="<?php echo $user->email; ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" class="form-control" placeholder="Masukan Jumlah" name="username"
                        value="<?php echo $user->username; ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" placeholder="Masukan Jumlah" name="password"
                        value="<?php echo $user->password; ?>">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Profile</label>
                        <input class="form-control" accept=".jpg,.png,.jpeg" type="file" name="avatar" 
                        value="<?php echo $user->avatar; ?>">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</section>