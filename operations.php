<?php
    require_once("db.php");

    //connectiong database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "peaks&arrow";

    //create connection

    $conn = mysqli_connect($servername,$username,$password,$dbname);

    //check connection

    if(!$conn){
        die("connection failed".mysqli_connect_error());
    }
      

    //create button click
    if(isset($_POST['create'])){
        $project_id = isset($_GET['id']) ? $_GET['id'] : '';
        createData($project_id);
        
    }

    //Read button click
    if(isset($_POST['read'])){
        $project_id = isset($_GET['id']) ? $_GET['id'] : '';
        getData($project_id);
    }

    //update button click
    if(isset($_POST['update'])){
        updateData();
        
    }

    //delete button click
    if(isset($_POST['delete'])){
        deleteData();
    }


    //insert data into database..
    function createData($project_id){
        $itemName = textBoxValue('item_name');
        $s1 = textBoxValue('s1');
        $s2 = textBoxValue('s2');
        $s3 = textBoxValue('s3');
        $s4 = textBoxValue('s4');
        $s5 = textBoxValue('s5');
        $s6 = textBoxValue('s6');
        $s7 = textBoxValue('s7');
        $s8 = textBoxValue('s8');
        $s9 = textBoxValue('s9');
        $s10 = textBoxValue('s10');
        $s11 = textBoxValue('s11');
        $s12 = textBoxValue('s12');
        $s13 = textBoxValue('s13');
        $s14 = textBoxValue('s14');
        $s15 = textBoxValue('s15');
        $p1 = textBoxValue('p1');
        $p2 = textBoxValue('p2');
        $p3 = textBoxValue('p3');
        $p4 = textBoxValue('p4');
        $p5 = textBoxValue('p5');
        $p6 = textBoxValue('p6');
        $p7 = textBoxValue('p7');
        $p8 = textBoxValue('p8');
        $p9 = textBoxValue('p9');
        $p10 = textBoxValue('p10');
        $p11 = textBoxValue('p11');
        $p12 = textBoxValue('p12');
        $p13 = textBoxValue('p13');
        $p14 = textBoxValue('p14');
        $p15 = textBoxValue('p15');


        $query = "INSERT INTO items (project_id,item_name,s1,s2,s3,s4,s5,s6,s7,s8,s9,s10,s11,s12,s13,s14,s15,p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11,p12,p13,p14,p15)
                    Values('$project_id','$itemName','$s1','$s2','$s3','$s4','$s5','$s6','$s7','$s8','$s9','$s10','$s11','$s12','$s13','$s14','$s15','$p1','$p2','$p3','$p4','$p5','$p6','$p7','$p8','$p9','$p10','$p11','$p12','$p13','$p14','$p15')";
        // echo "sql".$query;
        // exit();
        if(mysqli_query($GLOBALS['conn'],$query)){
            return $GLOBALS['conn'];

        }else{
            echo "error";
        }
    }
    

    function textBoxValue($value){
        $textbox = mysqli_real_escape_string($GLOBALS['conn'],trim($_POST[$value]));
        if(empty($textbox)){
            return false;
        }else{
            return $textbox;
        }
    }

    //get data from the database..
    function getData($project_id){

        $query = "SELECT * FROM items where project_id = $project_id";

        $result = mysqli_query($GLOBALS['conn'], $query);

        if(mysqli_num_rows($result) > 0){
            return $result;
            }
        }
    

    //update data in database....
    function updateData(){
        $id = textBoxValue("id");
        $itemname = textBoxValue("item_name");
        $s1 = textBoxValue("s1");
        $s2 = textBoxValue("s2");
        $s3 = textBoxValue("s3");
        $s4 = textBoxValue("s4");
        $s5 = textBoxValue("s5");
        $s6 = textBoxValue("s6");
        $s7 = textBoxValue("s7");
        $s8 = textBoxValue("s8");
        $s9 = textBoxValue("s9");
        $s10 = textBoxValue("s10");
        $s11 = textBoxValue("s11");
        $s12 = textBoxValue("s12");
        $s13 = textBoxValue("s13");
        $s14 = textBoxValue("s14");
        $s15 = textBoxValue("s15");
        $p1 = textBoxValue("p1");
        $p2 = textBoxValue("p2");
        $p3 = textBoxValue("p3");
        $p4 = textBoxValue("p4");
        $p5 = textBoxValue("p5");
        $p6 = textBoxValue("p6");
        $p7 = textBoxValue("p7");
        $p8 = textBoxValue("p8");
        $p9 = textBoxValue("p9");
        $p10 = textBoxValue("p10");
        $p11 = textBoxValue("p11");
        $p12 = textBoxValue("p12");
        $p13 = textBoxValue("p13");
        $p14 = textBoxValue("p14");
        $p15 = textBoxValue("p15");

       

            $query = " UPDATE items SET item_name = '$itemname',s1 = '$s1',s2 = '$s2',s3 = '$s3',s4 = '$s4',s5 = '$s5',s6 = '$s6',s7 = '$s7',s8 = '$s8',s9 = '$s9',s10 = '$s10',s11 = '$s11',s12 = '$s12',s13 = '$s13',s14 = '$s14',s15 = '$s15',
            p1 = '$p1',p2 = '$p2',p3 = '$p3',p4 = '$p4',p5 = '$p5',p6 = '$p6',p7 = '$p7',p8 = '$p8',p9 = '$p9',p10 = '$p10',p11 = '$p11',p12 = '$p12',p13 = '$p13',p14 = '$p14',p15 = '$p15'
             WHERE id = '$id' ";

            if(mysqli_query($GLOBALS['conn'],$query)){
                return $GLOBALS['conn'];
            }
        
    }
    
     

    //delete data from database...
    function deleteData(){
        $id = (int)textBoxValue("id");

        $query = "DELETE from items WHERE id= '$id'";

        if(mysqli_query($GLOBALS['conn'],$query)){
            return $GLOBALS['conn'];
        }
        
    }

    
?>