<div class="modal fade" id="login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="loginLabel">Login</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url("welcome") ?>">
          <div class="mb-3">
            <label>Username</label>
            <input type="text" name="email_member" class="form-control" value="<?php echo set_value("email_member"); ?>">
            <div class="text-danger small">
              <?php echo form_error("email_member"); ?>
            </div>
          </div>
          <div class="mb-3">
            <label>Password</label>
            <input type="text" name="password_member" class="form-control" value="<?php echo set_value("password_member"); ?>">
            <div class="text-danger small">
              <?php echo form_error("password_member"); ?>
            </div>
          </div>
          <button class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>

<footer class="bg-light text-center py-3 mt-5">
    <div class="">Copyright &copy; 2025. Made with <i class="bi bi-balloon-heart-fill text-danger"></i> by <b><span class="auto-type"></span></b></div>
  </footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
<script>new DataTable("#tabelku")</script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php if ($this->session->flashdata("pesan_sukses")): ?>
  <script>swal("Sukses!", "<?php echo $this->session->flashdata("pesan_sukses"); ?>", "success");</script>
<?php endif; ?>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php if ($this->session->flashdata("pesan_gagal")): ?>
  <script>swal("Gagal!", "<?php echo $this->session->flashdata("pesan_gagal"); ?>", "error");</script>
<?php endif; ?>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
<script>
  const options = {
            strings: ["Hansz Shop", "Raehan MH", "23.12.2884"],
            typeSpeed: 100,
            backSpeed: 50,
            loop: true
        };
        new Typed('.auto-type', options); 
</script>

<!-- Tilt Gambar Artikel -->
<script>
  const images = document.querySelectorAll('.tilt-image');

  images.forEach((image) => {
    image.addEventListener('mousemove', (e) => {
      const { width, height, left, top } = image.getBoundingClientRect();
      const x = e.clientX - left;
      const y = e.clientY - top;

      const rotateX = ((y / height) - 0.5) * 30;
      const rotateY = ((x / width) - 0.5) * 30;

      image.style.transform = `rotateX(${-rotateX}deg) rotateY(${rotateY}deg)`;
    });

    image.addEventListener('mouseleave', () => {
      image.style.transform = 'rotateX(0) rotateY(0)';
    });
  });
</script>
<!-- Tutup Tilt Gambar Artikel -->
</body>
</html>