
    function pushData(user, type) {
                var value = $("#" + type + " .info-value").html();
                $('#' + type).on('click', '.add-info-icon-cancel', function(e) {
                    $('#' + type).html(value + ' <button type="button" class="pull-right edit-info-icon btn btn-sm btn-icon btn-flat btn-default" data-parent="" data-id="576" data-toggle="tooltip" data-original-title="Edit"><i class="icon wb-wrench" aria-hidden="true"></i></button>');
                });
                $('#' + type).on('click', '.add-info-icon-ok', function(e) {
                    var opt = $('#add-info').val();
                    swal({
                      title: "Are you sure?",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonColor: '#4caf50',
                      cancelButtonColor: '#f44336',
                      confirmButtonText: 'Yes',
                      closeOnConfirm: true,
                    },
                    function() {
                            $.ajax({
                            data: { value: opt, user: user, type: type},
                            type: 'POST',
                            url: '/admin/users/edit',
                                }).done(function(response){
                                    setTimeout(function() {
                                        location.reload();
                                    }, 500);
                                }).fail(function(jqXHR){
                                    alert(jqXHR.responseJSON[0].value);                       
                                })
                    });
                });
                $('#' + type).on('click', '.edit-info-icon', function(e) {
                    $('#' + type).html('<input type="text" name="add-info" id="add-info" class="form-control input-' + type + '" value="' + value + '" length="30"><span class="pull-right green-600 padding-5 add-info-icon-ok fa fa-check"></span><span class="pull-right red-600 padding-5 add-info-icon-cancel fa fa-times"></span>');        /// BAIGTI DARYTI FUNKCIJA
                });
    }

    jQuery(document).ready(function($) {
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        $(".clickable-row").click(function() {
            window.location = $(this).data("href");
        });
        $('#notifications').click(function() {
                $.ajax({
                    type: 'POST',
                    url: '/ajax/notify',
                }).done(function(response){
                    $("#notifications_count").fadeOut();
                }).fail(function(e){
                    var parsed = JSON.parse(e.responseText);
                    swal(
                      'Error!',
                      parsed.error,
                      'error'
                    )                     
                })
        });
    });
    
    function dr(id, route) {
        swal({
              title: "Are you sure?",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: '#4caf50',
              cancelButtonColor: '#f44336',
              confirmButtonText: 'Yes',
              closeOnConfirm: true,
            },
            function() {
                $.ajax({
                    data: { 'id': id },
                    type: 'POST',
                    url: route,
                }).done(function(response){
                    swal('Success!',
                    response.success,
                    'success'
                    ),
                    setTimeout(function(){
                        location.reload();
                    }, 1000); 
                }).fail(function(e){
                    var parsed = JSON.parse(e.responseText);
                    swal(
                      'Error!',
                      parsed.error,
                      'error'
                    )                     
                })
        });
    }
