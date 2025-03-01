<main>
   <div class="container-fluid px-4">
   <h1 class="mt-4">Permintaan Cuti</h1>
   <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Permintaan Cuti</li>
   </ol>
   <div class="card mb-4">
      <div class="card-header">
         <i class="fas fa-table me-1"></i>
         List Permintaan Cuti
      </div>
      <div class="card-body">
      <div class="table-responsive">

      <table id="datatablesSimple">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pegawai</th>
            <th>Tanggal Awal Cuti</th>
            <th>Tanggal Selesai Cuti</th>
            <th>Jumlah Hari Cuti</th>
            <th>Alasan Cuti</th>
            <th>Bukti Surat</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>No</th>
            <th>Nama Pegawai</th>
            <th>Tanggal Awal Cuti</th>
            <th>Tanggal Selesai Cuti</th>
            <th>Jumlah Hari Cuti</th>
            <th>Alasan Cuti</th>
            <th>Bukti Surat</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </tfoot>
    <tbody>
    <?php 
    $no = 1;

    // $this->db->select('nama_pegawai');
    // $this->db->from('pegawai');
    // $this->db->where('idpegawai', $idPegawai);
    // $query = $this->db->get();
    // $pegawai = $query->row();

    

    // dd($pegawai);

    $pegawai = $this->db->get('pegawai')->result(); 
    // var_dump($pegawai);

    foreach ($cuti as $key => $cutiItem) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td>
                <?php
                    foreach ($pegawai as $row) {
                        if ($row->idpegawai == $cutiItem->idpegawai) {
                            echo $row->nama_pegawai;
                        }
                    }
                ?>
            </td>
            <td><?= $cutiItem->tanggal_awal; ?></td>
            <td><?= $cutiItem->tanggal_akhir; ?></td>
            <td><?= $cutiItem->jumlah_cuti; ?></td>
            <td><?= $cutiItem->alasan_cuti; ?></td>
            <td><img src="<?= base_url(); ?>assets/img/<?= $cutiItem->bukti_surat; ?>" alt="<?= $cutiItem->bukti_surat; ?>" width="100"></td>
            <td>
            <?php
                $status = $cutiItem->status;
                if ($status == 0) {
                    echo 'Cuti Dibatalkan user';
                } elseif ($status == 1) {
                    echo 'Cuti Dalam Verifikasi manager';
                } elseif ($status == 2) {
                    echo 'Cuti Diterima manager';
                } elseif ($status == 3) {
                    echo 'Cuti Ditolak manager (Menunggu verifikasi HRD)';
                } elseif ($status == 4) {
                    echo 'Cuti Dalam Verifikasi HRD';
                } elseif ($status == 5) {
                    echo 'Cuti Diterima HRD';
                } elseif ($status == 6) {
                    echo 'Cuti Ditolak HRD (Sisa Cuti Anda Dikembalikan)';
                } else {
                    echo 'Status tidak valid';
                }
                ?>
            </td>
            <td><a href="#">Ubah</a></td>
        </tr>
    <?php    
    endforeach; 
    ?>
</tbody>

</table>
</div>

      </div>
   </div>
</main>

<div class="modal fade" id="rejectModal<?php echo $cutiItem->idpengajuan; ?>" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rejectModalLabel">Tolak Cuti</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('cuti/tolakmanager'); ?>" method="post">
                    <input type="hidden" name="idpengajuan" value="<?php echo $cutiItem->idpengajuan; ?>">
                    <div class="form-group">
                        <label for="keterangan">Keterangan Penolakan Cuti</label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan" required>
                    </div>
                    <button type="submit" class="btn btn-danger">Tolak</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
function confirmRejectPengajuanCuti(idpengajuan) {
    Swal.fire({
        title: "Apakah Anda yakin ingin menolak cuti?",
        input: "text",
        inputLabel: "Keterangan Penolakan Cuti",
        showCancelButton: true,
        confirmButtonText: "Tolak",
        cancelButtonText: "Batal",
        inputValidator: (value) => {
            if (!value) {
                return "Keterangan penolakan harus diisi";
            }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            const keterangan = result.value;
            // Lakukan pengiriman ke controller cuti/tolakmanager dengan menggunakan AJAX atau submit form
            // Contoh menggunakan AJAX
            $.ajax({
                url: "<?php echo base_url('cuti/tolakmanager'); ?>",
                type: "post",
                data: { idpengajuan: idpengajuan, keterangan: keterangan },
                success: function (response) {
    // Berhasil, lakukan tindakan yang diinginkan setelah tolak cuti
    Swal.fire("Cuti ditolak!", "Cuti telah berhasil ditolak.", "success").then(function () {
        location.reload(); // Refresh halaman
    });
},

                error: function (xhr, status, error) {
                    // Gagal, lakukan tindakan yang diinginkan saat terjadi kesalahan
                    Swal.fire("Terjadi kesalahan!", "Cuti tidak dapat ditolak.", "error");
                }
            });
        }
    });
}
</script>


<script>
function confirmAcceptPengajuanCuti(idpengajuan) {
    Swal.fire({
        title: "Apakah Anda Yakin Menerima Cuti?",
        icon: "question",
        showCancelButton: true,
        confirmButtonText: "Ya",
        cancelButtonText: "Batal"
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirect to the "accmanager" method in the "cuti" controller with the selected "idpengajuan"
            window.location.href = "<?= base_url('cuti/accmanager/') ?>" + idpengajuan;
        }
    });
}
</script>



<!-- Display flashdata SweetAlert -->
<?php if ($this->session->flashdata('error')) : ?>
    <script>
        Swal.fire({
            title: 'Error',
            text: '<?php echo $this->session->flashdata("error"); ?>',
            icon: 'error',
            timer: 3000,
            showConfirmButton: false
        });
    </script>
<?php endif; ?>

<!-- Display flashdata SweetAlert -->
<?php if ($this->session->flashdata('success')) : ?>
    <script>
        Swal.fire({
            title: 'Success',
            text: '<?php echo $this->session->flashdata("success"); ?>',
            icon: 'success',
            timer: 3000,
            showConfirmButton: false
        });
    </script>
<?php endif; ?>
