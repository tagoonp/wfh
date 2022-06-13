function toggleActiveApplication(sys, uid, current_stage){
    var param = {
        system: sys,
        uid: uid,
        cstage: current_stage
    }
    var jxr = $.post(api + 'user?stage=toggle_app', param, function(){}, 'json')
                   .always(function(snap){
                       console.log(snap);
                       if(snap.status != 'Success'){
                            Swal.fire({
                                icon: "error",
                                title: 'เกิดข้อผิดพลาด',
                                text: 'ไม่สามารถดำเนินการได้',
                                confirmButtonClass: 'btn btn-danger',
                            })
                            return ;
                       }
                   })
}

var admin = {
    updateRole(username, role){
        var param = {
            username: username,
            target_role: role
        }

        var jxr = $.post(api + 'api_user?stage=update_role', param, function(){}, 'json')
                    .always(function(snap){
                        console.log(snap);
                        if(snap.status == 'Fail'){
                            Swal.fire({
                                icon: "error",
                                title: 'Error',
                                text: 'Can not update role.',
                                confirmButtonClass: 'btn btn-danger',
                            })
                        }
                    })
    },
    get_user_info(username){
        var jxr = $.post(api + 'api_user?stage=get_info', {username: username}, function(){}, 'json')
                    .always(function(snap){
                        if(snap.status == 'Fail'){
                            Swal.fire({
                                icon: "error",
                                title: 'Error',
                                text: 'User info not found.',
                                confirmButtonClass: 'btn btn-danger',
                            })
                        }
                    })
    },
    delete_user(username){
        Swal.fire({
            title: 'Warning',
            text: "This record can not be recovery after delete.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ดำเนินการต่อ',
            cancelButtonText: 'กลับไปตรวจสอบ',
            confirmButtonClass: 'btn btn-danger mr-1',
            cancelButtonClass: 'btn btn-secondary',
            buttonsStyling: false,
        }).then(function (result) {
            if (result.value) {
                preload.show()

            }
        })
    },
    load_user_list(ptype){
        preload.show()
        $('#btnPtype').text(ptype)
        const str2 = ptype.charAt(0).toUpperCase() + ptype.slice(1);
        console.log(str2);
        $('#btnPtype').text(str2)

        var jxr = $.post(api + 'api_user?stage=list_user', {ptype: ptype}, function(){}, 'json')
                   .always(function(snap){
                       preload.hide()
                       console.log(snap);
                       $('#userList').empty()
                       if(snap.status == 'Success'){
                            
                           snap.data.forEach(function(i){
                               
                               $common = ''
                               $staff = ''
                               $admin = ''

                               if(i.WFH_ADMIN == '1'){
                                    $admin = 'checked';
                               }

                               if(i.WFH_STAFF == '1'){
                                    $staff = 'checked';
                                }

                                if(i.WFH_COMMON == '1'){
                                    $common = 'checked';
                                }
                              $('#userList').append('<tr>' + 
                                                        '<td>' + i.USERNAME + '</td>' + 
                                                        '<td>' + i.FNAME + ' ' + i.LNAME + '</td>' + 
                                                        '<td></td>' + 
                                                        '<td>' + 
                                                            '<div class="custom-control custom-switch custom-control-inline mb-1">' +
                                                                '<input type="checkbox" class="custom-control-input" ' + $admin + ' id="customSwitch1_' + i.USERNAME + '" onclick="admin.updateRole(\'' + i.USERNAME + '\', \'WFH_ADMIN\')">' +
                                                                '<label class="custom-control-label mr-1" for="customSwitch1_' + i.USERNAME + '">' +
                                                                '</label>' +
                                                            '</div>'+
                                                        '</td>' + 
                                                        '<td>' + 
                                                            '<div class="custom-control custom-switch custom-control-inline mb-1">' +
                                                                '<input type="checkbox" class="custom-control-input"  ' + $staff + ' id="customSwitch2_' + i.USERNAME + '" onclick="admin.updateRole(\'' + i.USERNAME + '\', \'WFH_STAFF\')">' +
                                                                '<label class="custom-control-label mr-1" for="customSwitch2_' + i.USERNAME + '">' +
                                                                '</label>' +
                                                            '</div>'+
                                                        '</td>' + 
                                                        '<td>' + 
                                                            '<div class="custom-control custom-switch custom-control-inline mb-1">' +
                                                                '<input type="checkbox" class="custom-control-input"  ' + $common + ' id="customSwitch3_' + i.USERNAME + '" onclick="admin.updateRole(\'' + i.USERNAME + '\', \'WFH_COMMON\')">' +
                                                                '<label class="custom-control-label mr-1" for="customSwitch3_' + i.USERNAME + '">' +
                                                                '</label>' +
                                                            '</div>'+
                                                        '</td>' + 
                                                        '<td>' + 
                                                            '<button class="btn btn-secondary- btn-icon" onclick="admin.get_user_info(\'' + i.USERNAME + '\')"><i class="bx bx-pencil"></i></button>' +
                                                            '<button class="btn btn-secondary- btn-icon" onclick="admin.delete_user(\'' + i.USERNAME + '\')"><i class="bx bx-trash"></i></button>' +
                                                        '</td>' + 
                                                    '</tr>'
                                                    )
                           })
                       }
                   })
    }
}

var user = {
    update_info(target_uid){
        $check = 0;
        $('.form-control').removeClass('is-invalid')
        if($('#txtPrefix').val() == ''){ $check++; $('#txtPrefix').addClass('is-invalid'); console.log('a');}
        if($('#txtFname').val() == ''){ $check++; $('#txtFname').addClass('is-invalid'); console.log('b');}
        if($('#txtLname').val() == ''){ $check++; $('#txtLname').addClass('is-invalid'); console.log('c');}
        if($('#txtUserRole').val() == ''){ $check++; $('#txtUserRole').addClass('is-invalid'); console.log('d');}
        if($('#txtUsername').val() == ''){ $check++; $('#txtUsername').addClass('is-invalid'); console.log('e');}

        if($check != 0){ console.log('asd'); return ; }

        console.log('asd');

        var param = {
            uid: $('#txtUid').val(),
            role: $('#txtRole').val(),
            target_uid: target_uid,
            prefix: $('#txtPrefix').val(),
            fname: $('#txtFname').val(),
            mname: $('#txtMname').val(),
            lname: $('#txtLname').val(),
            username: $('#txtUsername').val(),
            targe_role: $('#txtUserRole').val(),
            position: $('#txtPosition').val(),
        }
        
        preload.show()

        var jxr = $.post(api + 'user?stage=update_basic_info', param, function(){}, 'json')
                   .always(function(snap){
                       preload.hide()
                       if(snap.status == 'Success'){
                            // Remove sis role from DOE
                           var jxr = $.post(authen_api + 'user?stage=update_user_info', param, function(snap){ console.log(snap); })
                        //    console.log(snap);
                        Swal.fire({
                            icon: "success",
                            title: 'Updated',
                            text: 'Update success',
                            confirmButtonClass: 'btn btn-success',
                        })
                        return ;
                           return ;
                        //    window.location = 'app-student-info?uid=' + $('#txtUid').val()
                       }else{
                            Swal.fire({
                                icon: "error",
                                title: 'Error',
                                text: 'Can not delete.',
                                confirmButtonClass: 'btn btn-danger',
                            })
                            return ;
                       }
                   })

    },
    delete(target_uid){
        Swal.fire({
            title: 'Confirmation',
            text: "You will be can not recovery this record after delete.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete',
            cancelButtonText: 'Cancel',
            confirmButtonClass: 'btn btn-danger mr-1',
            cancelButtonClass: 'btn btn-secondary',
            buttonsStyling: false,
        }).then(function (result) {
            if (result.value) {
                preload.show()
                var param = {
                    uid: $('#txtUid').val(),
                    role: $('#txtRole').val(),
                    target_uid: target_uid
                }
                var jxr = $.post(api + 'user?stage=delete', param, function(){}, 'json')
                   .always(function(snap){
                       preload.hide()
                       console.log(snap);
                       if(snap.status != 'Success'){
                            Swal.fire({
                                icon: "error",
                                title: 'Error',
                                text: 'Can not delete.',
                                confirmButtonClass: 'btn btn-danger',
                            })
                            return ;
                       }else{
                           // Remove sis role from DOE
                           var jxr = $.post(authen_api + 'user?stage=remove_sis_role', param, function(snap){ console.log(snap); })
                           window.location.reload()
                       }
                   })

            }
        })
    }
}