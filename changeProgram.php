<?php
    if(isset($_POST['institute']))
    {
        $inst_id= $_POST['institute'];
        if($inst_id !== 'select')
        {
        include 'dbconnect.php';
        $query="select * from program where inst_id=$inst_id";
        // echo $query;
        $result=mysqli_query($link,$query);
        echo "<select class='progName'>";
        echo "<option value=> select </option>";
        while($row = mysqli_fetch_array($result))
        {
            echo "<option value=".$row['p_id'].">".$row['program_name']."</option>";
            // echo $row['program_name'];
            // echo "<option value=".$row['p_id']">".$row['program_name']."</option>";
        }
        echo "</select>";
        }
        else
        {
            echo "<select>"."</select>";   
        }
    }
    
?>