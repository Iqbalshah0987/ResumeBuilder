<?php
$page="template";
require "../pin/header-links.php";
require "../pin/header.php";

if(isset($_SESSION['uid'])){
    $uid=$_SESSION['uid'];
}else{
    $uid=0;
}
?>

<!-- start container-xxl -->
<div class="container-xxl py-5">
    <!-- start container -->
    <div class="container">
        <div class="d-flex justify-content-between pb-4">
            <h3>My Resumes</h3>
            <a href="all-resumes.php" class="btn btn-solid">Create New Resume</a>
        </div>
        <!-- start row -->
        <div class="row my-4">
            <!-- start col-12 -->
            <div class="col-12">

                <?php
                    $data=mysqli_query($db,"SELECT * FROM `user_resumes` WHERE `user_id`=$uid");
                    if(mysqli_num_rows($data)>0){
                        while($row=mysqli_fetch_assoc($data)){
                            $res_img=mysqli_fetch_assoc(mysqli_query($db,"SELECT * FROM `resumes` WHERE `id`=$row[resume_id]"));
                ?>

                <!-- start card -->
                <div class="card shadow border-0 mb-4">
                    <!-- start card-body -->
                    <div class="card-body">
                        <!-- start row -->
                        <div class="row">
                            <!-- start col-6 style="border-bottom:1px solid #bdbebf;" -->
                            <div class="col-6">
                                <div class="d-flex align-items-center gap-4">
                                    <img src="../img/temp-img/<?php echo $res_img['res_img']; ?>" style="width: 90px; border:1px solid #bdbebf;" alt="">
                                    <div class="h-100 text-left">
                                        <h4 class="mb-2"><a href="create-resumes/<?php echo $res_img['res_name']; ?>?num=0" class="fw-lighter" target="_blank">Preview</a></h4>
                                        <p class="mb-2"><?php echo $row['name']; ?></p>
                                        <p class="mb-2">Last Updated : <?php echo $row['created_at']; ?> </p>
                                    </div>
                                </div>
                            </div>
                            <!-- end col-6 -->

                            <!-- start col-6 -->
                            <div class="col-6">
                                <div class="d-flex justify-content-end align-items-center gap-3 h-100">
                                    <button class="btn btn-sm btn-topcv" onclick="clear_Data_Session('create-resume.php?res-id=<?php echo $row['resume_id']; ?>');"><i class="bi bi-pencil-square"></i>&nbsp;Edit&nbsp;</button>
                                    <a href="create-resumes/<?php echo $res_img['res_name']; ?>?num=1" role="button" class="btn btn-sm btn-topcv"><i class="bi bi-cloud-arrow-down-fill"></i>&nbsp;Download&nbsp;</a>
                                    <a href="../fun/dash-resume.php?delete-resume=<?php echo $row['resume_id']; ?>" role="button" class="btn btn-sm btn-topcv"><i class="bi bi-trash-fill"></i>&nbsp;Delete&nbsp;</a>
                                </div>
                            </div>
                            <!-- end col-6 -->
                            
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
                <?php 
                        }
                    }else{
                        echo "<script>location.href='all-resumes.php';</script>";
                    }
                ?>
                
            </div>
            <!-- end col-12 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end container-xxl -->




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