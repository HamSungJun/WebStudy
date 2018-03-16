$(document).ready(function () {

    CSS_INIT();

})

function CSS_INIT() {
    $(".fluid_input input").on("focus", function () {
        var box_width = $(".content_panel").width();

        $(".fluid_input").animate({
            width: (box_width / 2) + "px"
        }, 1000)

    })

    $(".fluid_input input").on("focusout", function () {
        var box_width = $(".content_panel").width();
        $(".fluid_input").animate({
            width: (box_width / 4) + "px"
        }, 1000)

    })

    // $(".content_panel").css({
    //     height: $(document).innerHeight() / 2 + "px"
    // })
    $("body").css({
        width: $(document).innerWidth() + "px"
    })
    $(".fixed_header_panel").css({
        width: $(document).innerWidth() + "px"
    })
    $(".wrapper_background").css({
        height: $(document).innerHeight() + "px"
    })
}