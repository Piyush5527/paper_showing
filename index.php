<html>
    <head>
    <script type="text/javascript" src="http://code.jquery.com/jquery.js">    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("select.instName").change(function(){
                var selectedinst = $(".instName option:selected").val();
                $.ajax({type:"POST",url:"changeProgram.php",data:{institute:selectedinst}}).done(function(data){
                    $("#response").html(data);
                });
            });
            $("select.progName").change(function(){
                var selectedProg = $(".progName option:selected").val();
                $.ajax({type:"POST",url:"changeSemester.php",data:{program:selectedProg}}).done(function(data){
                    $("#response_sem").html(data);
                });
            });

            $("select.sem").change(function(){
                var selectedSem = $(".sem option:selected").val();
                $.ajax({type:"POST",url:"changeExam.php",data:{sem:selectedSem}}).done(function(data){
                    $("#response_exam").html(data);
                });
            });
        });
    </script>
        <style>
            table{
                padding:2rem;
                border:1px solid black;
                border-radius:20px;
            }
            input[type="submit"]{
                padding:5px;
                cursor:pointer;
                margin-top:5%;
            }
            
            .container{
                width:24%;
                margin-left:auto;
                margin-right:auto;
                margin-top:7%;
            }
        </style>
    </head>
    <body class="container">
        <div>
        <form method="post" action="checkResult.php">
            <?php
                include 'dbconnect.php';
            ?>
            <table>
                <tr>
                    <td>Institute Name:</td>
                    <td><select class="instName" name="instituteName">
                        <option>select</option>
                        <?php
                         $query="select * from institute_master";
                         $result=mysqli_query($link,$query);
                         while($row=mysqli_fetch_array($result))
					    {   
                        ?>
                        <option value=<?php echo $row['inst_id'] ?>><?php echo $row['institute_name'] ?></option>
                        <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Program:</td>
                    <td ><select id="response" class="progName" name="programName"></select></td>
                </tr>
                <tr>
                    <td>Semester:</td>
                    <td>
                        <select name="semester" class="sem" id="response_sem"></select>
                    </td>
                </tr>
                <tr>
                    <td>Exam Name:</td>
                    <td ><select id="response_exam" name="examName"></select></td>
                </tr>
                <tr>
                    <td>D.O.B:</td>
                    <td ><input type="date" name="birthDate"/></td>
                </tr>
                <tr>
                    <td>GR. No.:</td>
                    <td ><input type="text" name="GRNO"/></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align:center"><input type="submit" value="SUBMIT"/></td>
                </tr>

            </table>
        </form>
        </div>
    </body>
</html>