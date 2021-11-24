$(function () {
    if($("#vidBox").length > 0){
        $('#vidBox').VideoPopUp({
            backgroundColor: "#17212a",
            opener: "videoOpener",
            maxweight: "340",
            idvideo: "v1"
        });
    }
});
