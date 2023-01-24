<?php 
	error_reporting(0);
	include 'database/Connection.php';
	include 'database/Session.php';
    Session::checkSession();
?>

<?php
//check if form is submitted
if (isset($_POST['submit']))
{
    $filename = $_FILES['file1']['name'];
	$name = $_POST['name'];	

    //upload file
    if($filename != '')
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $allowed = ['pdf', 'txt', 'doc', 'docx'];
    
        //check if file type is valid
        if (in_array($ext, $allowed))
        {


            //set target directory
            $path = 'record/';
                
            $created = @date('Y-m-d');
            move_uploaded_file($_FILES['file1']['tmp_name'],($path . $filename));
            
            // insert file details into database
           // $sql = "INSERT INTO pdf_data(filename, created_date) VALUES('$filename', '$created')";
            //mysqli_query($con, $sql);
			
					$query="INSERT INTO record(manager_name,filename, created_date) VALUES('$name','$filename', '$created')";
					$result=$conn->query($query);
							
            header("Location: archieve.php?st=success");
        }
        else
        {
            header("Location: archieve.php?st=error");
        }
    }
    else
        header("Location: archieve.php");
}
?>