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

        if($('#txtDateReserve').val() == ''){
            Swal.fire({
                icon: "error",
                title: 'คำเตือน',
                text: 'กรุณาระบุจำนวนวันที่จะ WFH 1 - 14 วัน',
                confirmButtonClass: 'btn btn-danger',
            })
            return ;
        }

        var param = {
            uid : $('#txtUid').val(),
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
            numdate : $('#txtDateReserve').val()
        }

        preload.show()

        var jxr = $.post(api + 'wfh?stage=record_screening', param, function(){}, 'json')
                   .always(function(snap){
                       if(snap.status == 'Success'){

                       }else{
                           preload.hide()
                       }
                   })
    }
}