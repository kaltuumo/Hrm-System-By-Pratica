<?php include('layout/header.php');
include('layout/conn.php');
$qry_dep = mysqli_query($conn, "SELECT * FROM department");
$qry_sch = mysqli_query($conn, "SELECT * FROM schedule");
$qry_emp = mysqli_query($conn, "SELECT * FROM employee");
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee</li><br>
              <?php include('layout/conn.php');?>
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
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit_emp">
                 <i class="fa fa-plus"></i> Add New
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Employee ID</th>
                    <th>Photo</th>
                    <th>Employee Name</th>
                   
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Department</th>
                    <th>Schedule</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($qry_emp as $emp){?>
                  <tr>
                    <td><?php echo $emp['employee_id']?></td>
                    <td>
                      <img src="<?php echo $emp['photo']?>" alt="" class="img-circle" width="40px" height="40px">
                    </td>
                    <td><?php echo $emp['employee_name']?></td>
                    <td><?php echo $emp['phone']?></td>
                    <td><?php echo $emp['address']?></td>
                    <td><?php foreach($qry_dep as $dep_row){
                      if($dep_row['department_id'] == $emp['department_id']){
                        echo $dep_row['department_name'];
                      }
                    }?></td>
                  </td>
                    

                    <td><?php foreach($qry_sch as $sch_row){
                      if($sch_row['schedule_id'] == $emp['schedule_id']){
                        echo $sch_row['time_in'], '-', $sch_row['time_out'];
                      }
                    }?></td>
                    <td><button class="btn btn-primary btn-sm" data-toggle ="modal" data-target="#edit_emp<?php echo $emp['employee_id']?>"><i class="fa fa-edit"></i></button>
                    <button class="btn btn-danger btn-sm" data-toggle ="modal" data-target="#delete_emp<?php echo $emp['employee_id']?>"><i class="fa fa-trash"></i></button>
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

  <!-- Add Employee -->

  <div class="modal fade" id="edit_emp">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Department</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="insert/employee_insert.php" method="post" enctype="multipart/form-data">
                <label for="">Employee Name</label>
                <input type="text" name="emp_name" id="emp_name" class="form-control" required>

                <div class="row">
                  <div class="col-md-6">
                    <label for="">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" required>
                  </div>
                  <div class="col-md-6">
                    <label for="">Adderss</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="address" required>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <label for="">Department</label>
                    <select name="dep_id" id="dep_id" class="form-control" required>
                      <option value="">none</option>
                      <?php foreach($qry_dep as $dep){?>
                        <option value="<?php echo $dep['department_id']?>"><?php echo $dep['department_name']?></option>
                        <?php }?>
                    </select>
                  
                  </div>
                  <div class="col-md-6">
                    <label for="">Schedule</label>
                    <select name="sch_id" id="sch_id" class="form-control" required>
                      <option value="">none</option>
                      <?php foreach($qry_sch as $sch){?>
                        <option value="<?php echo $sch['schedule_id']?>"><?php echo $sch['time_in'], '-', $sch['time_out']?></option>
                        <?php }?>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label for="">Sex</label><br>
                    <input type="radio" name="sex" id="sex" value="sex">Male
                    <input type="radio" name="sex" id="sex" value="sex">Female
                  </div>
                  <div class="col-md-6">
                    <label for="">Upload Photo</label>
                    <input type="file" name="emp_photo" id="emp_photo">
                  </div>
                </div>
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


        <!-- Edit Employee-->
      <?php foreach ($qry_emp as $emp){?>
      <div class="modal fade" id="edit_emp<?php echo $emp['employee_id']?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Department</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="insert/employee_insert.php" method="post" enctype="multipart/form-data">
                <label for="">Employee Name</label>
                <input type="text" name="emp_name" id="emp_name" value ="<?php echo $emp['employee_name']?>" class="form-control" required>

                <div class="row">
                  <div class="col-md-6">
                    <label for="">Phone</label>
                    <input type="text" name="phone" id="phone" value="<?php echo $emp['phone'] ?>"class="form-control" placeholder="Phone" required>
                  </div>
                  <div class="col-md-6">
                    <label for="">Adderss</label>
                    <input type="text" name="address" id="address" value="<?php echo $emp['address']?>" class="form-control" placeholder="address" required>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <label for="">Department</label>
                    <select name="dep_id" id="dep_id" class="form-control" required>
                      <option value="">none</option>
                      <?php foreach($qry_dep as $dep){?>
                        <option value="<?php echo $dep['department_id']?>"><?php echo $dep['department_name']?></option>
                        <?php }?>
                    </select>
                  
                  </div>
                  <div class="col-md-6">
                    <label for="">Schedule</label>
                    <select name="sch_id" id="sch_id" class="form-control" required>
                      <option value="">none</option>
                      <?php foreach($qry_sch as $sch){?>
                        <option value="<?php echo $sch['schedule_id']?>"><?php echo $sch['time_in'], '-', $sch['time_out']?></option>
                        <?php }?>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label for="">Sex</label><br>
                    <input type="radio" name="sex" id="sex" value="sex">Male
                    <input type="radio" name="sex" id="sex" value="sex">Female
                  </div>
                  <div class="col-md-6">
                    <label for="">Upload Photo</label>
                    <input type="file" name="emp_photo" id="emp_photo">
                  </div>
                </div>
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
        <?php }?>

      <!-- Delete Department-->
      <?php foreach ($qry_emp as $emp){?>
      <div class="modal fade" id="delete_emp<?php echo $emp['employee_id']?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-danger">
              <h4 class="modal-title">Delete Employee</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="delete/employee_delete.php" method="post">
                <input type="text" name="delete_id" id="delete_id" class="form-control" value= "<?php echo $emp['employee_id']?>">
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

<?php include'layout/footer.php'?>
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
