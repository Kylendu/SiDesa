<!-- Modal Pengaduan -->
<div class="modal fade" id="aduanModal" tabindex="-1" aria-labelledby="aduanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content" id="formPengaduan">
            <div class="modal-header">
                <h5 class="modal-title" id="aduanModalLabel">Form Pengaduan Masyarakat</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="title" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Isi Pengaduan</label>
                    <textarea class="form-control" id="content" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select id="kategori" class="form-select" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="umum">Umum</option>
                        <option value="sosial">Sosial</option>
                        <option value="kesehatan">Kesehatan</option>
                        <option value="keamanan">Keamanan</option>
                        <option value="kebersihan">Kebersihan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Nama Pengadu</label>
                    <input type="text" class="form-control" id="author" required>
                </div>
                <div class="mb-3">
                    <label for="img" class="form-label">Gambar (boleh kosong)</label>
                    <input type="file" class="form-control" id="img" name="img" accept="image/*">

                    <!-- Preview Gambar -->
                    <div class="mt-2">
                        <img id="preview-img" src="#" alt="Preview Gambar"
                            style="max-width: 100%; display: none; border-radius: 10px;" />
                    </div>
                </div>
                <div class="mb-3">
                    <input type="hidden" class="form-control" id="jenis" value="pengaduan" disabled>
                </div>
            </div>
            <div class="modal-footer">
                <span id="formMessage" class="text-success me-auto small"></span>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </div>
        </form>
    </div>
</div>
