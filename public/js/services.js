$("#validateForm").validate({
    rules: {
        form_type: {
            required: !0
        },
        form_make: {
            required: !0
        },
        form_model: {
            required: !0
        },
        form_engine: {
            required: !0
        },
        form_name: {
            required: !0
        },
        form_email: {
            required: !0
        },
        form_text: {
            required: !0
        }
    },
    highlight: function(e) {
        $(e).closest(".form-group").addClass("has-error")
    },
    unhighlight: function(e) {
        $(e).closest(".form-group").removeClass("has-error"), $(e).closest(".form-group").addClass("has-success")
    },
    errorElement: "span",
    errorClass: "help-block",
    errorPlacement: function(e, t) {
        t.parent(".input-group").length ? e.insertAfter(t.parent()) : e.insertAfter(t)
    },
    submitHandler: function(e) {
        $.ajax({
            type: "POST",
            url: 'https://www.remapas.lt/send',
            data: $("#validateForm").serialize(),
            success: function(e) {
                gtag('event', 'conversion', {'send_to': 'AW-869656606/znl0CO_r75kBEJ7Q154D'})
                $("#cancelForm").trigger("click"), swal("Success!", e.success, "success")
            },
            error: function(e) {
                var t = JSON.parse(e.responseText);
                swal("Error!", t.error, "error")
            }
        })
    }
})
