<?php
$page="template";
require "../pin/header-links.php";
require "../pin/header.php";

$previous_link = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$_SESSION['url']=$previous_link;

?>


<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="fw-lighter">Select a Resume/CV TEMPLATE to start!</h1>
            <p>Resume or Curiculumn Vitae? These templates are ready for both of one-page resumes and standard CVs.</p>
        </div>
        <div class="row gx-5 gy-5 my-2">
            <?php
                $result=mysqli_query($db,"SELECT * FROM `resumes` ORDER BY `id` ASC");
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){

            ?>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card shadow border-0 resume-back wow fadeInUp" data-wow-delay="0.1s">
                    <a href="javascript:;" class="resume-img"><img src="../img/temp-img/<?php echo $row['res_img']; ?>" class="img-fluid" alt=""></a>
                    <div class="button-overlay d-flex justify-content-center align-items-center">
                        <button class="btn btn-solid" onclick="clear_Data_Session('<?php echo (isset($_SESSION['uid']))?'create-resume.php?res-id='.$row['id']:'../login.php'; ?>');">Create Now</button>
                    </div>
                </div>
            </div>

            <?php }} ?>
            
        </div>

    </div>
</div>




<?php
require "../pin/footer.php";
require "../pin/footer-links.php";
?>

<script>
    function clear_Data_Session(path){
        // console.log(path);
        $.ajax({
            url:"../fun/dash-variables.php",
            type:"POST",
            data:{clear_variables:'1'},
            success:function(result){
                location.href=path;
            }


        });
    }
</script>