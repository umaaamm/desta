<div class="col-md-12">
<?php 

echo $this->session->flashdata('notif');
?>
</div>
						<div class="col-md-4">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Kelola Data Soal</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" action="<?php echo base_url()?>SimpanSoal" method="post">
                                   
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label>Bidang</label>
                                            <select class="form-control"  name="id_bidang">
                                              <?php foreach($tampil_bidang->result_array() as $keyy)
                                              {
                                                ?>
                                                    <option value="<?php echo $keyy['id_bidang'];?>"><?php echo $keyy['nama_bidang'];?></option>

                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Soal</label>
                                            <input type="text" class="form-control" name="soal" placeholder="Soal" required>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label>A</label>
                                            <input type="text" class="form-control" name="a" placeholder="A" required>
                                        </div>
                                        <div class="form-group">
                                            <label>B</label>
                                            <input type="text" class="form-control" name="b" placeholder="B" required>
                                        </div>
                                        <div class="form-group">
                                            <label>C</label>
                                            <input type="text" class="form-control" name="c" placeholder="C" required>
                                        </div>
                                        <div class="form-group">
                                            <label>D</label>
                                            <input type="text" class="form-control" name="d" placeholder="D" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Kunci Jawaban</label>
                                            <input type="text" class="form-control" name="kunci_jawaban" placeholder="Kunci Jawaban" required>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>
                                    </div>
                                </form>
                            </div><!-- /.box -->

                            

 <div class="modal fade" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Admin</h4>
                    </div>
                    <div class="modal-body">
                    <form role="form" action="<?php echo base_url()?>ControllerSoal/edit" method="post">
                                   
                                    <div class="box-body">
                                        <input type="hidden" class="form-control" name="id" id="id" >
                                        <div class="form-group">
                                            <label>Bidang</label>
                                            <select class="form-control" id="id_b" name="id_bidang">
                                              <?php foreach($tampil_bidang->result_array() as $keyy)
                                              {
                                                ?>
                                                    <option value="<?php echo $keyy['id_bidang'];?>"><?php echo $keyy['nama_bidang'];?></option>

                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Soal</label>
                                            <input type="text" class="form-control" name="soal" placeholder="Soal" id="soal">
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>A</label>
                                            <input type="text" class="form-control" id="a" name="a" placeholder="A" required>
                                        </div>
                                        <div class="form-group">
                                            <label>B</label>
                                            <input type="text" class="form-control" id="b" name="b" placeholder="B" required>
                                        </div>
                                        <div class="form-group">
                                            <label>C</label>
                                            <input type="text" class="form-control" id="c" name="c" placeholder="C" required>
                                        </div>
                                        <div class="form-group">
                                            <label>D</label>
                                            <input type="text" class="form-control" id="d" name="d" placeholder="D" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Kunci Jawaban</label>
                                            <input type="text" class="form-control" id="k" name="kunci_jawaban" placeholder="Kunci Jawaban" required>
                                        </div>

                                         
                                    
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Edit</button>
                                        <button type="reset" class="btn btn-primary">Reset</button>
                                    </div>
                                </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                </div>
            </div>
        </div>                           
                        </div><!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-8">
                            <!-- general form elements disabled -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title">Data Soal</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table id="Admin" class="table table-bordered table-striped">
                                         <thead>
                                            <tr>
                                                <th>No</th>
											<th>Bidang</th>
                                            <th>Soal</th>
                                            
											<th>A</th>
											<th>B</th>
                                            <th>C</th>
                                            <th>D</th>
                                            <th>Kunci Jawaban</th>
                                            
                                            
											<th>Action</th>

                                            </tr>
                                        </thead>
                                        
											<?php
												$a=1;
												foreach ($tampil->result_array() as $key) {
											?>
											<tr>
											<td><?php echo $a; ?></td>
                                            <td><?php echo $key["nama_bidang"];?></td>
											<td><?php echo $key["soal"];?></td>
                                           
											<td><?php echo $key["a"];?></td>	
											<td><?php echo $key["b"];?></td>
                                            <td><?php echo $key["c"];?></td>
                                            <td><?php echo $key["d"];?></td>
                                            <td><?php echo $key["kunci_jawaban"];?></td>
                                            
											<td><button class="btn btn-danger btn-sm" onclick="hapus('<?php echo $key["id_soal"]; ?>')">Hapus</button>
                                            <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#mymodal" onclick="edit('<?php echo $key["id_soal"]; ?>','<?php echo $key["id_bidang"]; ?>','<?php echo $key["soal"]; ?>','<?php echo $key["a"]; ?>','<?php echo $key['b'];?>','<?php echo $key['c'];?>','<?php echo $key['d'];?>','<?php echo $key['kunci_jawaban'];?>')">Edit</button> 
											</tr>
										<?php $a++; } ?>

                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                           
                       <!--  </div>/.col (right)  -->
                    

<script type="text/javascript">
function hapus($id){
	var	conf=window.confirm('Data Akan Dihapus ?');
	if (conf) {
		document.location='<?php echo base_url(); ?>ControllerSoal/hapus/'+$id;
	}
}

function edit(id,id_b,soal,a,b,c,d,k){
	
    $('#id').val(id);
    $('#id_b').val(id_b);
	$('#soal').val(soal);
   
	$('#a').val(a);
	$('#b').val(b);
    $('#c').val(c);
    $('#d').val(d);
    $('#k').val(k);
   
}



</script>

