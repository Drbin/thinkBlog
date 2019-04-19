$('#file').on('change', function() {
    var files = this.files,
        videoURL = null,
        windowURL = window.URL || window.webkitURL;
    if (files && files[0]) {
        videoURL = windowURL.createObjectURL(files[0]);
        $("#img").attr("src",videoURL)
    }
})