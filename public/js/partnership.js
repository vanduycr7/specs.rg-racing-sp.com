$("#validateForm").validate({
    rules: {
        miestas: {
            required: !0
        },
        vardas_pavarde: {
            required: !0
        },
        telefonas: {
            required: !0
        },
        el_pastas: {
            required: !0,
            email: true
        },
        adresas: {
            required: !0
        },
        siekimas: {
            required: !0
        },
        patirtis: {
            required: !0
        },
        resursai: {
            required: !0
        },
        apmokymai: {
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
            url: 'https://www.remapas.lt/partnership/send',
            data: $("#validateForm").serialize(),
            success: function(e) {
                $("#cancelForm").trigger("click"), swal("Success!", e.success, "success")
            },
            error: function(e) {
                var t = JSON.parse(e.responseText);
                swal("Error!", t.error, "error")
            }
        })
    }
})
