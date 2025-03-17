
function previewImage() {
    var file = document.getElementById("file-input").files;

    if (file.length > 0) {
        var fileReader = new FileReader();

        fileReader.onload = function (event) {
            document.getElementById("preview-img").setAttribute("src", event.target.result);
        };

        fileReader.readAsDataURL(file[0]);
    }

    var formData=new FormData(document.getElementById("upload-image"));
    
    $.ajax({
        url:"../fun/dash-resume.php",
        type:"POST",
        data:formData,
        cache: false,
        contentType:false,  //'multipart/form-data'
        processData:false,
        success:function(result){

            $("#file_uploaded").val(result);
            $("#old-image-file").val(result);
            // alert(result);
        },
        error:function(result){
            alert(result);
        }
    });

}



function change_Template(path){

    store_Data_Session();

    location.href=path;
}


function hide_Block_Data_Position(classId){

    var hidedataOrder = new Array();
    if(classId==".group-blocks > .block"){

        $(classId).each(function(){

            if(!$(this).hasClass("active-block")){

                hidedataOrder.push($(this).attr("data-position"));
            }
        });
    }else{
        
        $(classId).each(function(){

            if(!$(this).hasClass("active-res-block")){

                hidedataOrder.push($(this).attr("data-position"));
                console.log($(this).attr("data-position"));
            }
        });
    }
    $("#hide-blocks").val(hidedataOrder);
    // alert(hidedataOrder);
}


function find_Data_Position(classId) {

    var dataOrder = new Array();

    $(classId).each(function() {
        dataOrder.push($(this).attr("data-position"));
    });
    // alert(dataOrder);
    // add value in hidden input field
    $("#blocks_order").val(dataOrder);
}

function update_Layout_Position() {

    store_Data_Session();

    // $("#cv-container").load(" #cv-container");
    // $("#layout-editor-container").load(" #layout-editor-container");
    // console.log($("#cv-container").children("#cv-container"));
    // console.log($("#layout-editor-container").children("#layout-editor-container"));
    // $("#cv-container").before($("#cv-container").children("#cv-container").clone());
    // $("#layout-editor-container").before($("#layout-editor-container").children("#layout-editor-container").clone());

    // $("#cv-container").remove();
    // $("#layout-editor-container").remove();
                
    document.location.reload();


}


function store_Data_Session(){

    var block_order = $("#blocks_order").val();
    var hide_block_order = $("#hide-blocks").val();
    var image = $("#file_uploaded").val();


    // personal details
    var name = $(".name").text();
    var curr_position = $(".curr-position").text();
    var career_objective = $(".career-objective").text();
    // social details
    var gender=$(".gender").text();
    var website=$(".website").text();
    var email = $(".email").text();
    var mobile = $(".mobile").text();
    var address = $(".address").text();
    var linkedin = $(".linkedin").text();
    var github = $(".github").text();

    // skills
    var skill_title = $(".skill-title").text();
    var skill = "";
    $(".skill").each(function() {
        skill += $(this).text();
        skill += "),(";
    });
    var progress_tag = "";
    $(".progress-tag").each(function() {
        progress_tag += $(this).val();
        progress_tag += "),(";
    });

    var dot_value = "";
    $(".dot-value").each(function() {
        dot_value += $(this).val();
        dot_value += "),(";
    });

    // alert(dot_value);

    // work experience details
    var work_exp_title = $(".work-exp-title").text();
    var work_exp_pos = "";
    $(".work-exp-pos").each(function() {
        work_exp_pos += $(this).text();
        work_exp_pos += "),(";
    });
    var work_exp_comp = ""
    $(".work-exp-comp").each(function() {
        work_exp_comp += $(this).text();
        work_exp_comp += "),(";
    });
    var work_exp_date = "";
    $(".work-exp-date").each(function() {
        work_exp_date += $(this).text();
        work_exp_date += "),(";
    });
    var work_exp_address = "";
    $(".work-exp-address").each(function() {
        work_exp_address += $(this).text();
        work_exp_address += "),(";
    });
    var work_exp_desc = "";
    $(".work-exp-desc").each(function() {
        work_exp_desc += $(this).text();
        work_exp_desc += "),(";
    });

    // education details
    var education_title = $(".education-title").text();
    var colg_crs_name = "";
    $(".colg-crs-name").each(function() {
        colg_crs_name += $(this).text();
        colg_crs_name += "),(";
    });
    var colg_name = "";
    $(".colg-name").each(function() {
        colg_name += $(this).text();
        colg_name += "),(";
    });
    var colg_crs_date = "";
    $(".colg-crs-date").each(function() {
        colg_crs_date += $(this).text();
        colg_crs_date += "),(";
    });
    var colg_crs_address = "";
    $(".colg-crs-address").each(function() {
        colg_crs_address += $(this).text();
        colg_crs_address += "),(";
    });
    var colg_crs_subject = "";
    $(".colg-crs-subject").each(function() {
        colg_crs_subject += $(this).text();
        colg_crs_subject += "),(";
    });

    // language
    var language_title = $(".language-title").text();
    var language = "";
    $(".language").each(function() {
        language += $(this).text();
        language += "),(";
    });

    // certificate details
    var certificate_title = $(".certificate-title").text();
    var cert_name = "";
    $(".cert-name").each(function() {
        cert_name += $(this).text();
        cert_name += "),(";
    });
    var cert_date = "";
    $(".cert-date").each(function() {
        cert_date += $(this).text();
        cert_date += "),(";
    });

    // interest
    var interest_title = $(".interest-title").text();
    var interest = "";
    $(".interest").each(function() {
        interest += $(this).text();
        interest += "),(";
    });

    // honour and award
    var award_title = $(".award-title").text();
    var award_name = "";
    $(".award-name").each(function() {
        award_name += $(this).text();
        award_name += "),(";
    });
    var award_date = "";
    $(".award-date").each(function() {
        award_date += $(this).text();
        award_date += "),(";
    });

    // activities
    var activity_title = $(".activity-title").text();
    var activity_org_name = "";
    $(".activity-org-name").each(function() {
        activity_org_name += $(this).text();
        activity_org_name += "),(";
    });
    var activity_pos_name = "";
    $(".activity-pos-name").each(function() {
        activity_pos_name += $(this).text();
        activity_pos_name += "),(";
    });
    var activity_date = "";
    $(".activity-date").each(function() {
        activity_date += $(this).text();
        activity_date += "),(";
    });
    var activity_desc = "";
    $(".activity-desc").each(function() {
        activity_desc += $(this).text();
        activity_desc += "),(";
    });

    //reference
    var reference_title = $(".reference-title").text();
    var reference = "";
    $(".reference").each(function() {
        reference += $(this).text();
        reference += "),(";
    });


    $.ajax({
        url:"../fun/dash-variables.php",
        type:"POST",
        data:{
            block_order:block_order,
            hide_block_order:hide_block_order,

            name:name,
            curr_position:curr_position,
            career_objective:career_objective, 

            gender:gender,
            website:website,
            email:email,
            mobile:mobile,
            address:address,
            linkedin:linkedin,
            github:github,
            
            image:image,

            skill_title:skill_title,
            skill:skill, 

            progress_tag:progress_tag,
            dot_value:dot_value,

            work_exp_title:work_exp_title,
            work_exp_pos:work_exp_pos,
            work_exp_comp:work_exp_comp,
            work_exp_date:work_exp_date,
            work_exp_address:work_exp_address,
            work_exp_desc:work_exp_desc, 

            education_title:education_title,
            colg_crs_name:colg_crs_name,
            colg_name:colg_name,
            colg_crs_date:colg_crs_date,
            colg_crs_address:colg_crs_address,
            colg_crs_subject:colg_crs_subject, 

            language_title:language_title,
            language:language, 

            certificate_title:certificate_title,
            cert_name:cert_name,
            cert_date:cert_date, 

            interest_title:interest_title,
            interest:interest, 

            award_title:award_title,
            award_name:award_name,
            award_date:award_date, 

            activity_title:activity_title,
            activity_org_name:activity_org_name,
            activity_pos_name:activity_pos_name,
            activity_date:activity_date,
            activity_desc:activity_desc, 

            reference_title:reference_title,
            reference:reference},
        success:function(success){


        }
        
    });


}