<?php 
include "../config/koneksi.php";

?>
<link href="./../css/dataTables.css" rel="stylesheet">

<script type="text/javascript" language="javascript" src="./../js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="./../js/custom.tables.js"></script>
<div class="heading">
      <h1><img src="../image/product.png" alt="" /> Data Soal</h1>
    </div>
     <div class="content">
<div id="tab-general">
          <div id="languages" class="htabs">
                        <a href="#" title="English" /> English</a>
                      </div>
                    <div id="language1">
                   
                   
                   <div id="container">
			<div class="box">
            	<div class="box-content nopadding">
					<table id="dt-example" cellpadding="0" cellspacing="0" border="0" class="table-dt table-striped-dt table-bordered-dt dataTable" >
						<thead>
							<tr>
								<th>No</th>
								<th>Deskripsi</th>
								<th>Jenis</th>
                                <th>Tanggal Mulai</th>
								<th>Tangal Akhir</th>
                                <th>Keterangan</th>
								<th>Action</th>
								
							</tr>
						</thead>
						<tbody>
                        <?php 
						$no=1;
						include "../config/koneksi.php";
						
						$kd=$_SESSION['nis'];
						$q=mysql_query("
							select
								  tugas.kd_tugas,
								  tugas.deskripsi,
								  tugas.jenis,
								  tugas.tgl_mulai,
								  tugas.tgl_akhir,
								  tugas.keterangan,
								  tugas.id_jdwl,
								  
								  jadwal.id_jdwl,
								  jadwal.kd_jdwl,
								  
								  jadwal_detail.id_jdwl,
								  jadwal_detail.id_siswa
								  
								   from tugas
								  join jadwal on tugas.id_jdwl=jadwal.id_jdwl
								  join jadwal_detail on jadwal.kd_jdwl=jadwal_detail.id_jdwl
								   where jadwal_detail.id_siswa='$_SESSION[nis]'
						");
						while($data=mysql_fetch_array($q)){
						?>
							<tr class="gradeX">
								<td><?php echo $no; ?></td>
								<td>
									<?php echo $data['deskripsi']?>
									</td>
								<td>
										<?php
                                        
                                         $j=$data['jenis'];
                                         if($j==1){
                                         $jenis='Pilihan Ganda';
                                         }
                                         elseif($j==2){
                                         $jenis='Esay';
                                         }
                                         else{
                                         $jenis='Esay dan Pilihan Ganda';
                                         }
                                         echo $jenis;
                                         ?>
                                 </td>
                                 <td><?php echo $data['tgl_mulai']?></td>
                                  <td><?php echo $data['tgl_akhir']?></td>
                                   <td><?php echo $data['keterangan']?></td>
								<td class="center">
                                
                                <?php 
								$njing=$data['kd_tugas'];
								$babi=$_SESSION['nis'];
						$tot=mysql_query("select * from jawaban where kd_tugas='$njing' AND id_siswa='$babi'");
						$wow=mysql_num_rows($tot);
						{
						?>
                                	<?php
                                         if($wow==0){
											 ?>
                                          <A href="?page=jawabSoal&id=<?php echo $data['kd_tugas']?>">Jawab</A>
                                          <?php
                                         }
                                         else{
                                         echo '<font color=red>Sudah Mengerjakan</font>';
										 }
                                         ?>
                                <?php } ?>
                                
                                </td>
								
							</tr>
                            <?php $no++;}?>
							
						
						</tbody>
						
					</table>
				</div>
			</div>		
		</div>
	
                   
                   
            
          </div>
                  </div>
                  </div>