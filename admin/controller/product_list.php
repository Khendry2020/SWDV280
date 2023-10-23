<!DOCTYPE html>
  <?php include '../../modules/head.php'; ?>
  <body>
    <main>
        <!--Navigation-->
      <div>
        <?php include '../modules/admin_bar.php'; ?>
      </div>
        <div>
            <?php include '../view/products.php'; ?>
        </div>
    </main>
    <footer>
        <?php include '../../modules/footer.php'; ?>
    </footer>
<script>
function confirmDelete(self) {
    var id = self.getAttribute("data-id");
 
    document.getElementById("form-delete-item").id.value = id;
    $("#myModal").modal("show");
}
</script>
  </body>
</html>