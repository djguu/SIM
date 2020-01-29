$(window).on("load", function () {
    let title = document.title;
    switch (title) {
        case "MyNotes":
            $("#notes_nav").addClass("active");
            break;
        case "Images":
            $("#img_nav").addClass("active");
            break;
        case "Videos":
            $("#vid_nav").addClass("active");
            break;
        case "Calendar":
            $("#calendar_nav").addClass("active");
            break;
    }
});