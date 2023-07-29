<?php
    if(isset($_POST['program']))
    {
        if($_POST['program'] !== 'select')
        {
            include 'dbconnect.php';
            $prog_id=$_POST['program'];
            // $query="select * from exam_master where p_id='$prog_id'";
            $query="select distinct sem from exam_master where p_id='$prog_id'";
            $result=mysqli_query($link,$query);
            $sems=array();
            while($row=mysqli_fetch_array($result))
            {
                array_push($sems,$row['sem']);
            }
            sort($sems);
            echo "<select>";
            echo "<option value=''> select </option>";
            foreach($sems as $sem)
            {
                echo "<option value=".$sem.">".$sem."";   
            }
            // while($row=mysqli_fetch_array($result))
            // {
            //     // echo "<option value=".$row['e_id'].">".$row['exam_name']." | ".$row['Date']." | ".$row['Subject']."</option>";
            //     echo "<option value=".$row['sem'].">".$row['sem']."";
            // }
            echo "</select>";
        }
    }
?>


<!-- D:/marksheets/1/1/1/6/
    D:\marksheets\1\1\1\6

-->