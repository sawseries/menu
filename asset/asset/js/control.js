  $(document).ready(function () {
                //alert( "ready!" );
            });

            function deletes(code) {

                $.ajax({
                    url: "{{url('/deleteticket')}}",
                    type: "POST",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        _token: $("#csrf").val(),
                        code: code
                    },
                    success: function (data) {
                        $("#tr_" + code).fadeOut();
                    },
                });
            }

            function updatestatus(status, code) {

                $.ajax({
                    url: "{{url('/updatestatus')}}",
                    type: "POST",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {
                        _token: $("#csrf").val(),
                        code: code,
                        status: status.value.toString(),
                    },
                    success: function (data) {
                        alert(data);

                    },
                });
            }