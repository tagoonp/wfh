$(function(){
  $('.signForm').submit(function(){
    preload.show()
    if($('#txtPassword').val() == ''){
      preload.hide()
      swal("คำเตือน", "กรุณายืนยันรหัสผ่านของท่าน", "error")
      $('#txtPassword').addClass('is-invalid')
      return ;
    }

    var param = {
      uid: current_user,
      role: current_role,
      id_rs: $('#txtId').val(),
      password: $('#txtPassword').val(),
      cert_id: $('#txtCertId').val(),
      rtype: $('#txtRtype').val()
    }

    var jxhr = $.post(conf.api + 'v5/chairman.php?stage=approve', param, function(){})
                .always(function(resp){
                  console.log(resp);
                  if(resp == 'Success'){

                    var dataContent = '<h3>REC.' + $('#txtCodeApdu').val() + ' : ผลการพิจารณาข้อเสนอโครงการเพื่อขอพิจารณาจริยธรรมการวิจัยในมนุษย์ </h3>' +
                                      '<p>เรียน นักวิจัยหลัก (' + $('#txtFullname').val() + ') ที่นับถือ</p>' +
                                      '<p>โครงการวิจัย REC.' + $('#txtCodeApdu').val() + ' ที่ท่านยื่นขอพิจารณาจริยธรรมการวิจัยในมนุษย์ </p>' +
                                      '<p>สำนักงานจริยธรรมการวิจัยในมนุษย์ได้ทำการรับรองโครงการวิจัยของท่านเรียบร้อยแล้ว ทั้งนี้ ท่านสามารถตรวจสอบข้อมูลอื่น ๆ เพิ่มเติมได้ที่ <a href="https://rmis2.medicine.psu.ac.th/rmis/" target="_blank">https://rmis2.medicine.psu.ac.th/rmis/</a></p>' +
                                      '<p>หมายเหตุ กรณีเป็นโครงการที่ขอทุนวิจัยคณะแพทยศาสตร์ ขอให้นำหลักฐานเอกสารรับรองนี้ ยื่นที่งานสนับสนุนและบริหารวิจัย ชั้น 4 อาคารบริหาร เพื่อประกอบการทำข้อตกลงสัญญารับทุน (ติดต่อ นางสาวเจนจิรา นวลมาก โทร. 1129)</p>' +
                                      '<p>จึงเรียนมาเพื่อทราบ <br>ระบบสารสนเทศเพื่อการจัดการงานวิจัย (RMIS)</p>';
                    var param = {
                      title: "REC." + $('#txtCodeApdu').val() + " : ผลการพิจารณาข้อเสนอโครงการเพื่อขอพิจารณาจริยธรรมการวิจัยในมนุษย์ (กรุณาอย่าตอบกลับอีเมลฉบับนี้)",
                      content: dataContent,
                      user: 'rmismedpsu@gmail.com',
                      key: 'cm1pc21lZHBzdUBnbWFpbC5jb20yMDE5LTEwLTIyIDIxOjU4OjU3MTI0LjEyMi40Mi4yNDU=',
                      toemail: $('#txtEmail').val(),
                      toname: $('#txtFullname').val()
                    }
                    main.send_email(param, './index?uid=' + current_user + '&role=' + current_role , 'ท่านได้ลงนามและส่งใบรับรอง/รับทราบและแจ้งทางผู้วิจัยเรียบร้อยแล้ว', 'ท่านได้ลงนามและส่งใบรับทราบ แต่เกิดข้อผิดพลาดในการส่งอีเมล์แจ้งผู้วิจัย กรุณาแจ้งเจ้าหน้าที่', true)
                    return ;

                    // preload.hide()
                    // swal({    title: "ลงนามสำเร็จ",
                    // text: "กดปุ่มตกลงเพื่อกลับสู่หน้าแรก",
                    // type: "success",
                    // showCancelButton: false,
                    // confirmButtonColor: "#01bd46",
                    // confirmButtonText: "ตกลง",
                    // closeOnConfirm: true },
                    // function(){
                    //
                    //
                    // });

                  }else if(resp == 'Invalid password'){
                    preload.hide()
                    swal("คำเตือน", "รหัสผ่านผิดพลาด", "error")
                    $('#txtPassword').addClass('is-invalid')
                    return ;
                  }else{
                    preload.hide()
                    swal("คำเตือน", "เกิดข้อผิดพลาด กรุณาติดต่อผู้ดูแลระบบ", "error")
                  }
                })

  })
})
