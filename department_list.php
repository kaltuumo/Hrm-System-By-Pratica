<?php include('layout/header.php');
include('layout/conn.php');
$read_qry = mysqli_query($conn, "SELECT * FROM `department`");

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Department List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Department</li><br>
             
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_dep">
                 <i class="fa fa-plus"></i> Add New
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Department ID</th>
                    <th>Department Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                
                    foreach ($read_qry as $row){
                    ?>
                  <tr>
                    <!-- <td>DepID-1</td>
                    <td>Bakaara</td> -->
                    <td><?php echo $row['department_id']?></td>
                    <td><?php echo $row['department_name']?></td>
                    <td>
                      <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit_dep<?php echo $row['department_id']?>"><i class="fa fa-edit"></i></button>
                      <button class="btn btn-danger btn-sm ml-2 " data-toggle ="modal" data-target ="#delete_dep<?php echo $row['department_id']?>"><i class="fa fa-trash"></i></button>
                    </td>
                   
                  </tr>
                  <?php }?>
               
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php include'layout/footer.php'?>

<!-- Add Department -->
<div class="modal fade" id="add_dep">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Department</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="insert/department_insert.php" method="post">
                <input type="text" name="department" id="department" class="form-control" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" name="save" class="btn btn-primary">Save changes</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

       <!-- Edit Department-->
       <?php foreach ($read_qry as $row){?>
      <div class="modal fade" id="edit_dep<?php echo $row['department_id']?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Department</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="update/department_update.php" method="post">
                <input type="hidden" name="update_id" id="update_id" class="form-control" value= "<?php echo $row['department_id']?>">
                <input type="text" name="department" id="department" class="form-control" required value = "<?php echo $row['department_name']?>">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" name="update" class="btn btn-primary">Update</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <?php }?>


      

       <!-- Delete Department-->
      <?php foreach ($read_qry as $row){?>
      <div class="modal fade" id="delete_dep<?php echo $row['department_id']?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-danger">
              <h4 class="modal-title">Delete Department</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="delete/department_delete.php" method="post">
                <input type="hidden" name="delete_id" id="delete_id" class="form-control" value= "<?php echo $row['department_id']?>">
                 <h4>Are You Sure to Delete Data</h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" name="delete" class="btn btn-warning">Yes Delete it!</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <?php }?>
      <!-- /.modal -->
      <!-- /.modal -->

<!-- <script src="../../dist/js/demo.js"></script> -->


<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
    //   "responsive": true, "lengthChange": false, "autoWidth": false,
    //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
