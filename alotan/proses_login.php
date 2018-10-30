<?php
session_start();
	$host 			= "localhost"; 	// definisi variabel host.
	$username		= "root"; 
	$password 		= ""; 			// karna saya menggunakan XAMPP secara default pass kosong!!!
	$db 			= "test"; 		//definisi variable db_name (nama_database)
	//phpinfo();
	$konek = mysqli_connect($host,$username,$password,$db);
if(isset($_POST['login']))
			{
				@$user=$_POST['user'];
				@$pass=$_POST['pass'];
				$query = "select * from penjual where user='$user' and pass='$pass' ";
				//echo $query;
				$query_run = mysqli_query($konek,$query);
				//echo mysql_num_rows($query_run);
				if($query_run)
				{
					if(mysqli_num_rows($query_run)>0)
					{
					$row = mysqli_fetch_array($query_run,MYSQLI_ASSOC);
					$_SESSION['id_penjual'] = $row['id_penjual'];
					$_SESSION['user'] = $user;
					$_SESSION['pass'] = $pass;
					
					header( "Location: index.html");
					}
					else
					{
						echo '<script type="text/javascript">alert("Data yang ada masukkan tidak valid. periksa username dan password anda")</script>';
					}
				}
				else
				{
					echo '<script type="text/javascript">alert("Database Error")</script>';
				}
			}
			else
			{
			}

?>