// inner blocks tools
$(document).on({
    mouseenter: function(e) {
        // e.stopPropagation();
        var siblings_num = $(this).siblings().length;
        // console.log(siblings_num);
        $(this).addClass("div-inner-block-position");

        if (siblings_num > 2) {

            $(this).append('<div id="add-remove-button"><div title="Move up" class="up" id="up-inner-block">▲</div><div title="Move down" class="down" id="down-inner-block">▼</div><button class="btn btn-sm btn-success" id="addNew"><i class="fa-solid fa-plus"></i>&nbsp;Add&nbsp;</button><button class="btn btn-sm btn-danger" id="removeOld"><i class="fa-solid fa-minus"></i>&nbsp;Remove&nbsp;</button></div>');
        } else {

            $(this).append('<div id="add-remove-button"><div title="Move up" class="up" id="up-inner-block">▲</div><div title="Move down" class="down" id="down-inner-block">▼</div><button class="btn btn-sm btn-success" id="addNew"><i class="fa-solid fa-plus"></i>&nbsp;Add&nbsp;</button></div>');
        }

    },
    mouseleave: function(e) {
        // e.stopPropagation();
        $("#add-remove-button").remove();
        $(this).removeClass("div-inner-block-position");

    }
}, ".div-inner-block");

// add inner block button
$(document).on("click", "#addNew", function(e) {
    e.stopPropagation();

    var curr_inner_block_id = $(this).parent().parent().attr("id");
    if (curr_inner_block_id == "skills-span-block-inner" || curr_inner_block_id == "language-span-block-inner" || curr_inner_block_id == "interest-span-block-inner") {

        $("#" + curr_inner_block_id).children().last().remove();
        $("#" + curr_inner_block_id).removeClass("div-inner-block-position");

        $("#" + curr_inner_block_id).append($("#" + curr_inner_block_id).children().last().clone().text(''));
    } else {
        var curr_inner_block = $(this).parent().parent().clone();
        curr_inner_block.removeClass("div-inner-block-position");
        curr_inner_block.children().last().remove();

        curr_inner_block.find("[contenteditable=true]").text('');

        $(this).parent().parent().after(curr_inner_block);

    }

});
// remove inner block button
$(document).on("click", "#removeOld", function(e) {
    e.stopPropagation();

    var curr_inner_block_id = $(this).parent().parent().attr("id");
    if (curr_inner_block_id == "skills-span-block-inner" || curr_inner_block_id == "language-span-block-inner" || curr_inner_block_id == "interest-span-block-inner") {
        // console.log($("#"+div_inner_id).children().length);
        if ($("#" + curr_inner_block_id).children().length > 2) {

            $("#" + curr_inner_block_id).children().eq(-2).remove();
        }
    } else {
        $(this).parent().parent().remove();
    }

});
// up inner block button
$(document).on("click", "#up-inner-block", function(e) {
    e.stopPropagation();
    var curr_inner_block = $(this).parent().parent().clone();
    // console.log(curr_inner_block);
    curr_inner_block.removeClass("div-inner-block-position");
    curr_inner_block.children().last().remove();
    // console.log(curr_inner_block);

    if ($(this).parent().parent().prevAll().length > 1) {

        $(this).parent().parent().prev().before(curr_inner_block);
        $(this).parent().parent().remove();
    }

});
// down inner block button
$(document).on("click", "#down-inner-block", function(e) {
    e.stopPropagation();
    var curr_inner_block = $(this).parent().parent().clone();
    // console.log(curr_inner_block);
    curr_inner_block.removeClass("div-inner-block-position");
    curr_inner_block.children().last().remove();
    // console.log(curr_inner_block);

    if ($(this).parent().parent().nextAll().length > 1) {

        $(this).parent().parent().next().after(curr_inner_block);
        $(this).parent().parent().remove();
    }

});





// outer blocks tools
$(document).on({
    mouseenter: function(e) {
        // e.stopPropagation();

        // console.log($(this).children("#add-remove-outer-button").length)
        if ($(this).children("#add-remove-outer-button").length < 1) {

            $(this).addClass("div-outer-block-position");

            $(this).append('<div id="add-remove-outer-button"><div title="Edit CV\'s layout" class="show-layout-editor" id="layout-edit-outer-block"><i class="fa-solid fa-bars"></i></div><div title="Move this block up" class="up" id="up-outer-block">▲</div><div title="Move this block down" class="down" id="down-outer-block">▼</div><button title="Hide this block" class="btn btn-sm btn-danger" id="hide-outer-block"><i class="fa-solid fa-minus"></i>&nbsp;Hide&nbsp;</button></div>');
        }
    },
    mouseleave: function(e) {
        // e.stopPropagation();
        $(".div-outer-block").find("#add-remove-outer-button").remove();
        $(this).removeClass("div-outer-block-position");

    }
}, ".div-outer-block");

// hide outer block
$(document).on("click", "#hide-outer-block", function(e) {
    e.stopPropagation();

    $(this).parent().parent().parent().removeClass("active-res-block");
    $(this).parent().parent().parent().addClass("d-none");

    hide_Block_Data_Position(".main-all-blocks > .res-block");
    update_Layout_Position();

});
// up outer block button
$(document).on("click", "#up-outer-block", function(e) {
    e.stopPropagation();
    var curr_outer_block = $(this).parent().parent().parent().clone();
    // console.log(curr_outer_block);
    curr_outer_block.children().removeClass("div-outer-block-position");
    curr_outer_block.children().children().last().remove();
    // console.log(last);

    if ($(this).parent().parent().parent().prevAll().length > 0) {

        $(this).parent().parent().parent().prev().before(curr_outer_block);
        $(this).parent().parent().parent().remove();
    }


    // for order maintain by main blocks
    find_Data_Position(".main-all-blocks > .res-block");
    update_Layout_Position();

});
// down outer block button
$(document).on("click", "#down-outer-block", function(e) {
    e.stopPropagation();
    var curr_outer_block = $(this).parent().parent().parent().clone();
    // console.log(curr_outer_block);
    curr_outer_block.children().removeClass("div-outer-block-position");
    curr_outer_block.children().children().last().remove();
    // console.log(last);

    if ($(this).parent().parent().parent().nextAll().length > 0) {

        $(this).parent().parent().parent().next().after(curr_outer_block);
        $(this).parent().parent().parent().remove();
    }


    // for order maintain by main blocks
    find_Data_Position(".main-all-blocks > .res-block");
    update_Layout_Position();

});
// edit layout
$(document).on("click", "#layout-edit-outer-block", function() {
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