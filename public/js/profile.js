var profile = profile || {};

profile.workHistory = function(month) {
    let data = $("input[name=month]").val();
    $.ajax({
        url: "/profile/select/month",
        type: "POST",
        data: {
            month: data
        },
        success: function(response) {
            $("#work_history").empty();
            $("#work_history").html(response);
        }
    });

    $.ajax({
        url: "/profile/month",
        type: "POST",
        data: {
            month: data
        },
        success: function(res) {
            let total = res.total;
            $("#selectMonth").text("Month: " + res.month);
            $("#totalSalary").text("Total Salary: $" + total.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,'));
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