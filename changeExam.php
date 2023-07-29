<?php
    if(isset($_POST['sem']))
    {
        if($_POST['sem'] !== 'select')
        {
            include 'dbconnect.php';
            $sem_id=$_POST['sem'];
            $query="select * from exam_master where sem='$sem_id'";
            $result=mysqli_query($link,$query);
            
            echo "<select>";
            while($row=mysqli_fetch_array($result))
            {
                // echo "<option value=".$row['e_id'].">".$row['exam_name']." | ".$row['Date']." | ".$row['Subject']."</option>";
                echo "<option value=".$row['e_id'].">".$row['exam_name']." | ".$row['Date']." | ".$row['subject']."</option>";
            }
            echo "</select>";
        }
    }
?>

