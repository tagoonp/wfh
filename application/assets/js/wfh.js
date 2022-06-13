var wfh = {
    submit(form){
        if(form == '1_1'){
            this.form_1()
        }

        if(form == '1_2'){
            this.form_2()
        }
    },
    form_1(){

    },
    form_2(){
        var ch1_1 = 0;
        var ch1_2 = 0;
        var ch1_3 = 0;
        var ch1_4 = 0;
        var ch1_5 = 0;

        var ch2_1 = 0;
        var ch2_2 = 0;
        var ch2_3 = 0;
        var ch2_4 = 0;

        if($('#ch1_1').is(":checked")){ ch1_1 = 1;  }
        if($('#ch1_2').is(":checked")){ ch1_2 = 1;  }
        if($('#ch1_3').is(":checked")){ ch1_3 = 1;  }
        if($('#ch1_4').is(":checked")){ ch1_4 = 1;  }
        if($('#ch1_5').is(":checked")){ ch1_5 = 1;  }

        if((ch1_1 == 0) && (ch1_2 == 0) && (ch1_3 == 0) && (ch1_4 == 0) && (ch1_5 == 0)){
            Swal.fire({
                icon: "error",
                title: 'คำเตือน',
                text: 'กรุณาเลือกอาการป่วยของท่าน',
                confirmButtonClass: 'btn btn-danger',
            })
            return ;
        }

        if($('#ch2_1').is(":checked")){ ch2_1 = 1;  }
        if($('#ch2_2').is(":checked")){ ch2_2 = 1;  }
        if($('#ch2_3').is(":checked")){ ch2_3 = 1;  }
        if($('#ch2_4').is(":checked")){ ch2_4 = 1;  }

        if((ch2_1 == 0) || (ch2_2 == 0) || (ch2_3 == 0) || (ch2_4 == 0)){
            Swal.fire({
                icon: "error",
                title: 'คำเตือน',
                text: 'กรุณาดำเนินการตามข้อ 4 และยืนยันการดำเนินการของท่านทุกข้อในข้อ 5',
                confirmButtonClass: 'btn btn-danger',
            })
            return ;
        }

        $check = 0;

        if($('#txtSd').val() == ''){
            $('#txtSd').addClass('is-invalid')
            $check++;
        }

        if($('#txtSm').val() == ''){
            $('#txtSm').addClass('is-invalid')
            $check++;
        }

        if($('#txtSy').val() == ''){
            $('#txtSy').addClass('is-invalid')
            $check++;
        }

        if($('#txtEd').val() == ''){
            $('#txtEd').addClass('is-invalid')
            $check++;
        }

        if($('#txtEm').val() == ''){
            $('#txtEm').addClass('is-invalid')
            $check++;
        }

        if($('#txtEy').val() == ''){
            $('#txtEy').addClass('is-invalid')
            $check++;
        }

        if($check != 0){
            Swal.fire({
                icon: "error",
                title: 'คำเตือน',
                text: 'กรุณาระบุช่วงเวลาที่ต้องการ WFH',
                confirmButtonClass: 'btn btn-danger',
            })
            return ;
        }

        $sdate = $('#txtSy').val() + '-' + $('#txtSm').val() + '-' + $('#txtSd').val()
        $edate = $('#txtEy').val() + '-' + $('#txtEm').val() + '-' + $('#txtEd').val()

        Swal.fire({
            title: 'ยืนยันข้อมูล',
            text: "ท่านต้องการ WFH ตั้งแต่วันที่ " + $sdate + " ถึงวันที่ " + $edate + "ใช่หรือไม่?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่',
            cancelButtonText: 'กลับไปตรวจสอบ',
            confirmButtonClass: 'btn btn-danger mr-1',
            cancelButtonClass: 'btn btn-secondary',
            buttonsStyling: false,
        }).then(function (result) {
            if (result.value) {
                preload.show()
                var param = {
                    uid : $('#txtUid').val(),
                    sgroup: '1_2',
                    atk : 'positive',
                    sg: '1',
                    ssg: '1',
                    fever : ch1_1,
                    cough : ch1_2,
                    snot : ch1_3,
                    headache : ch1_4,
                    bodypain : ch1_5,
                    atkreport : ch2_1,
                    headreport : ch2_2,
                    cireport : ch2_3,
                    sonkhlacare : ch2_4,
                    wfh : '1', 
                    leave : '0', 
                    dmmht : '0',
                    sdate : $sdate,
                    edate : $edate
                }
        
                preload.show()
        
                var jxr = $.post(api + 'wfh?stage=record_screening', param, function(){}, 'json')
                           .always(function(snap){
                            //    console.log(snap);
                            //    return ;
                               if(snap.status == 'Success'){
                                    window.location = 'app-plan-create'
                               }else{
                                   preload.hide()
                                   Swal.fire({
                                        icon: "error",
                                        title: 'ไม่สามารถดำเนินได้',
                                        text: 'ไม่สามารถสร้างคำ WFH ได้เกิน 1 ครั้ง',
                                        confirmButtonClass: 'btn btn-danger',
                                    })
                                    return ;
                               }
                           })
            }
        })

        
    },
    plan_save(){
        
    }
}