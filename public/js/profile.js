var profile = profile || {};

profile.workHistory = function() {
    let data = $("input[name=month]").val();
    $.ajax({
        url: "/profile/select/month",
        type: "POST",
        data: {
            month: data
        },
        success: function(response) {
            $("#WorkHistory_body").empty();
            $("#WorkHistory_body").html(response);
        }
    });
};

profile.nghiPhep = function() {
    $.ajax({
        url: "/profile/nghiPhep",
        type: "GET",
        success: function(res) {
            $("#Sabbatical").empty();
            $("#Sabbatical").html(res);
        }
    })
};

profile.init = function() {
    profile.nghiPhep();
};

$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    profile.init();
});