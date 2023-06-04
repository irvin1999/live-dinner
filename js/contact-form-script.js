$("#contactForm").validator().on("submit", function (event) {
    if (event.isDefaultPrevented()) {
        // handle the invalid form...
        formError();
        submitMSG(false, "Did you fill in the form properly?");
    } else {
        // everything looks good!
        event.preventDefault();
        submitForm();
    }
});


function submitForm(){
    // Initiate Variables With Form Content
    var date = $("#input_date").val();
    var time = $("#input_time").val();
    var person = $("#person").val();
    var name = $("#name").val();
    var email = $("#email").val();
    var phone = $("#phone").val();

    $.ajax({
        type: "POST",
        url: "form-process.php",
        data: {
            date: date,
            time: time,
            person: person,
            name: name,
            email: email,
            phone: phone
        },
        success: function (response) {
            if (response === "success") {
                formSuccess();
            } else {
                formError();
                submitMSG(false, response);
            }
        },
        error: function (xhr, status, error) {
            formError();
            submitMSG(false, "Error sending form: " + error);
        }
    });
}

function formSuccess() {
    $("#contactForm")[0].reset();
    submitMSG(true, "Message Submitted!");
}

function formError() {
    $("#contactForm").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
        $(this).removeClass();
    });
}

function submitMSG(valid, msg) {
    if (valid) {
        var msgClasses = "h3 text-center tada animated text-success";
    } else {
        var msgClasses = "h3 text-center text-danger";
    }
    $("#msgSubmit").removeClass().addClass(msgClasses).text(msg);
}
