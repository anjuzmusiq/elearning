<?php
Class Program
{
    function duplicateProg($prog) {
        include ("connect.php");

        $sql="SELECT sName from tbl_program where sName='$prog'";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_array($result);
        $_SESSION['duplicateFlag']=1;
        if($prog!=$row['sName']) {
            return 0;
        }
        else {
              return 2;
            }
    } 

    function addProg($prog) {
        include ("connect.php");

        if($this->duplicateProg($prog)==0){
            $sql1="INSERT INTO tbl_program(sName,iStatus)values('$prog',1)";
            $result1=mysqli_query($con,$sql1);
            if($result1==TRUE) {
                $_SESSION['successFlag']=1;
                return 1;
            }
            else {
                return 0;
            }
        }
        else {
            return 2;
        }
    }

    function deleteProg($deleteid){
        include ("connect.php");
        
        $sql="DELETE from tbl_program where ID = '$deleteid'";
        $result=mysqli_query($con,$sql);
        if(isset($result)) {
            $_SESSION['deleteFlag']=1;
            return 1;
            }
        else {
                return 0;
            }
        }
    
    function updateProg($editid,$prog){
        include ("connect.php");

        if($this->duplicateProg($prog)==0){
            $update="UPDATE tbl_program set sName= '$prog' where ID = '$editid'";
            $uResult=mysqli_query($con,$update);
            $row2=mysqli_fetch_array($uResult);
                $_SESSION['updateFlag']=1;
                return 1;
        }
    }

    function publishProgram($pubid){
        include ("connect.php");

        $deleteQry="UPDATE tbl_program set istatus=1 where ID = '$pubid'";
        $dResult=mysqli_query($con,$deleteQry);
            $_SESSION['pubFlag']=1;
            return 1;
    }

    function unPublishProgram($upubid){
        include ("connect.php");

        $deleteQry="UPDATE tbl_program set istatus=0 where ID = '$upubid'";
        $dResult=mysqli_query($con,$deleteQry);
            $_SESSION['pubFlag']=2;
            return 1;

    }
    
}
?>