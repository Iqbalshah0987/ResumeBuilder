// cancel button in layout-container
$(document).on("click", "#layout-container-cancel", function() {
    $("#layout-editor-container").addClass("d-none");
    $("#edit-layout").removeClass("tool-button");

    $("#cv-container").removeClass("d-none");
});
// check fields check or not
$(document).on("click", ".check-selector", function() {

    $(this).children().toggleClass("fa-check");
    $(this).parent().parent().parent().toggleClass("active-block");

    hide_Block_Data_Position(".group-blocks > .block");

});



// check all
$(document).on("click", "#check-all-layout", function() {

    $(".check-selector").each(function() {

        if (!$(this).children().hasClass("fa-check")) {

            $(this).children().addClass("fa-check");
            $(this).parent().parent().parent().addClass("active-block");
        }
    });
    hide_Block_Data_Position(".group-blocks > .block");

});

// drag and drop 
$(".group-blocks").sortable({

    stop: function() {

        find_Data_Position(".group-blocks > .block");
    }

});
// update layout done button
$(document).on("click", "#updata-layout", function() {
    //alert("done"); 
    update_Layout_Position();
});
// default layout
$(document).on("click", "#default-layout", function() {

    // alert($("#default-block-positions").val());
    $("#blocks_order").val($("#default-block-positions").val());
    $("#hide-blocks").val($("#default-hide-block-positions").val());
    update_Layout_Position();

});






// for edit and show layout 


// edit layout
$(document).on("click", "#edit-layout", function() {
    if ($("#layout-editor-container").hasClass("d-none")) {

        if ($("#template-container").hasClass("d-none")) {
            $("#cv-container").addClass("d-none");

            $("#layout-editor-container").removeClass("d-none");
            $("#edit-layout").addClass("tool-button");
        } else {
            $("#template-container").addClass("d-none");
            $("#show-templates").removeClass("tool-button");

            $("#layout-editor-container").removeClass("d-none");
            $("#edit-layout").addClass("tool-button");
        }

    } else {
        $("#layout-editor-container").addClass("d-none");
        $("#edit-layout").removeClass("tool-button");

        $("#cv-container").removeClass("d-none");
    }

});
// show template
$(document).on("click", "#show-templates", function() {
    if ($("#template-container").hasClass("d-none")) {

        if ($("#layout-editor-container").hasClass("d-none")) {
            $("#cv-container").addClass("d-none");

            $("#template-container").removeClass("d-none");
            $("#show-templates").addClass("tool-button");
        } else {
            $("#layout-editor-container").addClass("d-none");
            $("#edit-layout").removeClass("tool-button");

            $("#template-container").removeClass("d-none");
            $("#show-templates").addClass("tool-button");
        }

    } else {
        $("#template-container").addClass("d-none");
        $("#show-templates").removeClass("tool-button");

        $("#cv-container").removeClass("d-none");
    }

});
// cancel button in templates-container
$(document).on("click", "#template-container-cancel", function() {
    $("#template-container").addClass("d-none");
    $("#show-templates").removeClass("tool-button");

    $("#cv-container").removeClass("d-none");
});