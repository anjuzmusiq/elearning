<?php
Class Subject
{
    function addSub($subject,$programid)
    {
        include ("connect.php");
        if($this->duplicateSub($subject,$programid)==0)
        {
            $sql1="INSERT INTO tbl_subject(Prog_ID,sName,iStatus)values($programid,'$subject',1)";
            $result1=mysqli_query($con,$sql1);
            if($result1==TRUE)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }
        else
        {
            return 2;
        }
    } 
    function duplicateSub($subject,$programid)
    {
        include ("connect.php");
        $sql="SELECT sName,Prog_ID from tbl_subject where sName='$subject' and Prog_ID='$programid'";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_array($result);
        if(($subject!=$row['sName'])&&($programid!=$row['Prog_ID']))
        {        
             return 0;
        }
        else
            {
               return 1;
            }
    } 
    function updateSub($editid,$editname,$programid){
        include ("connect.php");
        if($this->duplicateSub($editname,$programid)==0)
        {
            echo "entered no duplicate !";
            $update="UPDATE tbl_subject set sName= '$editname',Prog_ID='$programid' where ID = '$editid'";
            $Result=mysqli_query($con,$update);
            if($Result==TRUE) {
                echo "updated";
                return 1;
            }
            else {
                echo "not updated";
                return 0;
            }
        }
        else {
            return 2;
        }
        
    }
    function deleteSub($delid){
        include ("connect.php");
        $sql="DELETE from tbl_subject where ID = '$delid'";
        $Result=mysqli_query($con,$sql);
        $_SESSION['deleteFlag']=1;
                return 1;
        }
    function publishSub($pubid){
            include ("connect.php");
                $sql="UPDATE tbl_subject set iStatus=1 where ID = '$pubid'";
                $Result=mysqli_query($con,$sql);
                $_SESSION['pubFlag']=1;
                return 1;
            }
    function unpublishSub($unpubid){
            include ("connect.php");
                $sql="UPDATE tbl_subject set iStatus=0 where ID = '$unpubid'";
                $Result=mysqli_query($con,$sql);
                $_SESSION['unpubFlag']=1;
                return 1;
        }
               
}
?>