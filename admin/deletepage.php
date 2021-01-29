<?php include '../lib/Session.php';
    Session::checkSession();
?>

<?php include '../config/config.php';?>
<?php include '../lib/Database.php';?>

<?php 
	$db = new Database();
?>
<?php 
    if(!isset($_GET['delpageid']) || $_GET['delpageid'] == NULL){
        header("Location:index.php");
    }else{
        $pageid = $_GET['delpageid'];
        $delquery = "delete from tbl_page where id='$pageid'";
        $delData = $db->delete($delquery);
        if($delData){
            echo "<script> alert('Page Deleted Successfully!'); </script>";
            echo"<script> window.location = 'index.php'</script>";
        }else{
            echo "<script>alert('Page Not Deleted!');</script>";
            header("Location:index.php");
        }
    }
?>