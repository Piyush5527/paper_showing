<?php
    $inst_id=$_POST['instituteName'];
    $prog_id=$_POST['programName'];
    $sem=$_POST['semester'];
    $exam_id=$_POST['examName'];
    $dob=$_POST['birthDate'];
    $grNO=$_POST['GRNO'];
    if($inst_id == null || $prog_id==null || $sem==null || $exam_id==null || $dob==null || $grNO==null)
    {
			echo "<script>if(confirm('Data fields are empty!'))
			{document.location.href='form.php'};
			</script>";
    }
    else
    {

    include 'dbconnect.php';
    $query="select * from exam_master where e_id=$exam_id";
    $result=mysqli_query($link,$query);
    $exam_name='';
    while($row = mysqli_fetch_array($result))
    {   
        $exam_name=$row['exam_name']."-".$row['subject'];
    }
    // echo $grNO+".pdf";
    $resPath="D:/results/".$exam_name."_".$grNO.".pdf";
    // echo $resPath;
    if(file_exists($resPath))
    {
        try{
            require_once "Classes/PHPExcel.php";
            $path="2021_StudentData.xlsx";
            $reader=PHPExcel_IOFactory::createReaderForFile($path);
            $excel_obj= $reader -> load($path);
            $worksheet=$excel_obj -> getSheet(4);
            $lastrow=$worksheet->getHighestRow();  
            
            //for checking roll and dob
            for($i=0;$i<=$lastrow;$i++)
            {
                $cellValue='A'.$i;
                $value= $worksheet->getCell($cellValue)->getValue();
                //$value= "20".intval($value);
				$value= intval($value);
                echo $i." ".$value."<br>";
                // if($value == $grNO)
                // {
                //     $date=$worksheet->getCell('C'.$i)->getValue();
                //     $processedDOB=date('d-m-Y',strtotime($dob));
                //     // echo $processedDOB.$date;

                //     $unix_date = ($date - 25569) * 86400;
                //     $date = 25569 + ($unix_date / 86400);
                //     $unix_date = ($date - 25569) * 86400;
                //     $processedDate= gmdate("Y-m-d", $unix_date);
                //     // if($date == $processedDOB || $processedDate == $processedDOB || $processedDate == $dob)
                //     // {
                //     //         header('Content-type: application/pdf');
  
                //     //         header('Content-Disposition: inline; filename="' . $resPath . '');
                    
                //     //         header('Content-Transfer-Encoding: binary');
                            
                //     //         header('Accept-Ranges: bytes');
                    
                //     //         // Read the file
                //     //         @readfile($resPath);
                //     // }
                //     if($date == $processedDOB || $processedDate == $processedDOB || $processedDate == $dob)
                //     {
                //             $fp=fopen($resPath,"r");
                //             header('Cache-Control: maxage=1');
                //             header('Pragma: public');
                //             header('Content-type: application/pdf');

                //             header('Content-Disposition: inline; filename=' . $resPath . '');
                //             header('Content-Description: PHP Generated Data');

                //             header('Content-Transfer-Encoding: binary');
                //             header('Content-Length:'.filesize($resPath));
                //             ob_clean();
                //             flush();
                //             while(!feof($fp))
                //             {
                //                 $buff=fread($fp,1024);
                //                 print $buff;
                //             }
                //             //header('Accept-Ranges: bytes');
                    
                //             // Read the file
                //             @readfile($resPath);
                //     }
                //     else{
                //         echo "<br>".$processedDate." ". $processedDOB." ".$date." ".$dob;
                //         echo"<script>
                //             alert('Incorrect DOB '.$processedDOB)
                //         </script>";
                //     }
                    
                // }
            }
    
        }
        catch(Exception $ex)
        {
            echo "Error in reading Excel";
        }
    }
    
    //     // echo "<iframe src=".$resPath."></iframe>";
  
    // }
    else
    {
        echo "No result exists!!";
    }
    // echo "<br>".file_exists($resPath);
}
?>