<?php
class db
{ 
	private $db;
	private $error;
	
	    /**
     * @var $dataku
     */
    private $dataku;

   
	/**
     * @var array $total_occurrence
     */
    private $total_occurrence = array();


	function __construct($DB_con)
	{
	  $this->db = $DB_con;
	}

	public function insertPDO($nama,$email,$password,$tgl_lhr,$gambar,$no_telp,$alamat )
	{
		try
		{
			$stmt = $this->db->prepare("INSERT INTO registration (nama, email, password, tgl_lhr, gambar, no_telp, alamat)
			VALUES (:nama, :email, :password, :tgl_lhr, :gambar, :no_telp, :alamat)");
				 $stmt->bindparam(":nama",$nama);
				 $stmt->bindparam(":email",$email);
				 $stmt->bindparam(":password",$password);
				 $stmt->bindparam(":tgl_lhr",$tgl_lhr);
				 $stmt->bindparam(":gambar",$gambar);
                 $stmt->bindparam(":no_telp",$no_telp);
                 $stmt->bindparam(":alamat",$alamat);
                 
				 $stmt->execute();
				return true;
		}
		catch(PDOException $e)
			{
				echo $e->getMessage(); 
				return false;
			}
	}


	public function getUser($email){

		try{
		
		$statement = $this->db->prepare("SELECT * FROM registration WHERE email=:email");
		$statement->execute(array(":email"=>$email));
		$dataRows = $statement->fetch(PDO::FETCH_ASSOC);
		
		return $dataRows;
		
		} catch (PDOException $ex){
		echo $ex->getMessage();
		}
	}


	
 	public function update($id,$firstname,$middlename,$lastname,$email)
	{
		try
		{
			$stmt=$this->db->prepare("UPDATE persons SET firstname=:firstname,middlename=:middlename,lastname=:lastname,email=:email WHERE person_id=:id ");
			$stmt->bindparam(":firstname",$firstname);
			$stmt->bindparam(":middlename",$middlename);
			$stmt->bindparam(":lastname",$lastname);
			$stmt->bindparam(":email",$email);
			$stmt->bindparam(":id",$id);
			$stmt->execute();

			return true; 
		}
		catch(PDOException $e)
		{
			echo $e->getMessage(); 
			return false;
		}
	}
	 

	public function delete($id)
	{
		$stmt = $this->db->prepare("UPDATE persons SET status = 0 WHERE person_id=:id");
		$stmt->bindparam(":id",$id);
		$stmt->execute();
		return true;
	}
	 
	 /* paging */
	 


	public function gambar_profil($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute(array(
			':nama' => $_SESSION['user']
		));
		

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
			?>
			        
					
           			<img src="perusahaan/gambar_pelamar/<?php print($row['gambar'])?>" style="width:100px;height:100px;" >
					
           			
					
					
           			
				
			            <?php
			}
		}
		else
		{
		?>
		        <tr>
		        <td>Kosong?</td>
		        </tr>
		        <?php
		}

	}

	public function profil_pelamar($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute(array(
			':nama' => $_SESSION['user']
		));

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
			?>
			        
				
						<div>
							<div class="col-sm-4">Nama</div><div class="col-sm-8"><?php print($row['nama']); ?></div>
						</div>
						<br><br/>
						<div>
							<div class="col-sm-4">Tanggal Lahir</div><div class="col-sm-8"><?php print($row['tgl_lhr']); ?></div>
						</div>
						<br><br/>
						<div>
							<div class="col-sm-4">No Telp / HP</div><div class="col-sm-8"><?php print($row['no_telp']); ?></div>
						</div>
						<br><br/>
						<div>
							<div class="col-sm-4">Alamat</div><div class="col-sm-8"><?php print($row['alamat']); ?></div>
						</div>
						<br><br/><br>
						<div>
							<div class="col-sm-4">Pendidikan Terakhir</div><div class="col-sm-8"><?php print($row['pendidikan']); ?></div>
						</div>
						<br><br/>
						<div>
							<div class="col-sm-4">Pengalaman</div><div class="col-sm-8"><?php print($row['pengalaman']); ?></div>
						</div>
						<br><br/><br><br/>
						<div>
							<div class="col-sm-4">Kemampuan</div><div class="col-sm-8"><?php print($row['kemampuan']); ?></div>
						</div>

				
			            <?php
			}
		}
		else
		{
		?>
		        <tr>
		        <td>Kosong?</td>
		        </tr>
		        <?php
		}

	}
	 

	public function tampilLowongan($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
			?>
				<div class="col-lg-12 well " style="background:white;padding:40px;">

				
				
						<div>
						 <h4><img src="perusahaan/gambar_perusahaan/<?php print($row['gambar'])?>" style="width:100px;height:100px;" >&nbsp<?php print($row['perusahaan']); ?></h4>	
						</div>
						<div>
							<p>&nbspMembutuhkan tenaga <?php print($row['posisi']); ?></p>	
						</div>
						<div>
							<p class="glyphicon glyphicon-map-marker">&nbsp<?php print($row['alamat']); ?></p>
						</div>
						<div>
							<p class="glyphicon glyphicon-usd">&nbsp<?php print($row['gaji']); ?></p>
						</div>
						<div>
							<p>&nbspPersyaratan</p>
						</div>
						<div>
							<p>&nbspPendidikan :&nbsp<?php print($row['pendidikan']); ?></p>
						</div>
						<div>
							<p>&nbspJurusan <?php print($row['bidang_pendidikan']); ?></p>
						</div>
						<div>
							<p>&nbspUsia Min-Max <?php print($row['usia']); ?></p>
						</div>
						<div>
							<p>&nbspPengalaman kerja <?php print($row['pengalaman']); ?></p>
						</div>
						<div>
							<p>&nbspPunya keahlian :&nbsp <?php print($row['keahlian']); ?></p>
						</div>

					
			            
						<a href="lihat.php?id=<?php print($row['id']); ?>" type = "button" class = "btn btn-primary" name="lihat">Lihat</a>

						<a type = "button" class = "btn btn-primary" name="lamar">Lamar</a>
               
         
						
				</div>
			           

			            <?php
			}
		}
		else
		{
		?>
		        <tr>
		        <td>Nothing here...</td>
		        </tr>
		        <?php
		}

	}

	
	public function profilPerusahaan($query)
	{
		$stmt = $this->db->prepare($query);
		$stmt->execute();

		if($stmt->rowCount()>0)
		{
			while($row=$stmt->fetch(PDO::FETCH_ASSOC))
			{
			?>

				
				<div class="col-lg-12 well " style="background:white;padding:40px;">

				<div>
						 <h4 style="text-align:center"><img src="perusahaan/gambar_perusahaan/<?php print($row['gambar'])?>" style="width:100px;height:100px;" >&nbsp<?php print($row['perusahaan']); ?></h4>	
						</div>
				
				<div class = "modal-header">
						<h5>
							Deskripsi
						</h5>
				</div>
				<br>
						<div>
							<p><?php print($row['deskripsi']); ?></p>	
						</div>

						<a type = "button" class = "btn btn-primary" name="lamar">Lamar</a>
					
				</div>
				<div>
				
				</div>
			           

			            <?php
			}
		}
		else
		{
		?>
		        <tr>
		        <td>Nothing here...</td>
		        </tr>
		        <?php
		}

	}
	
	
	 
	 public function cari ($kata_kunci){
		 //cek apakah kata kunci kurang dari 3 karakter
		 if(strlen($kata_kunci)<1){
			//pesan error jika kata kunci kurang dari 3 karakter
			echo '<p>Kata kunci terlalu pendek.</p>';
		}else{
			//membuat variabel $where dengan nilai kosong
			$where = "";
			
			//membuat variabel $kata_kunci_split untuk memecah kata kunci setiap ada spasi
			$kata_kunci_split = preg_split('/[\s]+/', $kata_kunci);
			//menghitung jumlah kata kunci dari split di atas
			$total_kata_kunci = count($kata_kunci_split);
			
			//melakukan perulangan sebanyak kata kunci yang di masukkan
			foreach($kata_kunci_split as $key=>$kunci){
				//set variabel $where untuk query nanti
				$where .= "kata_kunci LIKE '%$kunci%'";
				//jika kata kunci lebih dari 1 (2 dan seterusnya) maka di tambahkan OR di perulangannya
				if($key != ($total_kata_kunci - 1)){
					$where .= " OR ";
				}
			}
			
			
			//melakukan query ke database dengan SELECT, dan dimana WHERE ini mengambil dari $where
			$results = $this->db->prepare("SELECT perusahaan, alamat, gambar, posisi, waktu_kerja, bidang_pekerjaan, gaji, pendidikan, bidang_pendidikan, usia, pengalaman, keahlian, deskripsi  FROM company WHERE $where");
			$results->execute();
			
			if($results->rowCount()>0)
				{

				while($row = $results->fetch(PDO::FETCH_ASSOC)){
					//menampilkan query
				
					?>
				
				<div class="col-lg-7 well col-xs-offset-4 " style="top:150px;background:white;font-family:Helvetica">
				
				
				<div class="col-lg-12 well " style="background:white;padding:40px;">

				
				
						<div>
						 <h4><img src="perusahaan/gambar_perusahaan/<?php print($row['gambar'])?>" style="width:100px;height:100px;" >&nbsp<?php print($row['perusahaan']); ?></h4>	
						</div>
						<div>
							<p>&nbspMembutuhkan tenaga <?php print($row['posisi']); ?></p>	
						</div>
						<div>
							<p class="glyphicon glyphicon-map-marker">&nbsp<?php print($row['alamat']); ?></p>
						</div>
						<div>
							<p class="glyphicon glyphicon-usd">&nbsp<?php print($row['gaji']); ?></p>
						</div>
						<div>
							<p>&nbspPersyaratan</p>
						</div>
						<div>
							<p>&nbspPendidikan :&nbsp<?php print($row['pendidikan']); ?></p>
						</div>
						<div>
							<p>&nbspJurusan <?php print($row['bidang_pendidikan']); ?></p>
						</div>
						<div>
							<p>&nbspUsia Min-Max <?php print($row['usia']); ?></p>
						</div>
						<div>
							<p>&nbspPengalaman kerja <?php print($row['pengalaman']); ?></p>
						</div>
						<div>
							<p>&nbspPunya keahlian :&nbsp <?php print($row['keahlian']); ?></p>
						</div>

					
			            
						<a href="lihat.php?id=<?php print($row['id']); ?>" type = "button" class = "btn btn-primary" name="lihat">Lihat</a>

						<a type = "button" class = "btn btn-primary" name="lamar">Lamar</a>
               
         
						
				
				</div>
				</div>
				
			           

			            <?php
			}
		
	}
		else
		{
		?>
		        <tr>
		        <td>Nothing here...</td>
		        </tr>
		        <?php
		}
				
			
		}


	 }


	
    

	
	 


}


?>
