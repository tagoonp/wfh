<hr>
<div id="symptom1" >
    <div class="form-group">
        <label for="" class="text-dark mb-1" style="font-size: 1.1em;">3. ท่านมีอาการป่วยใดบ้างดังต่อไปนี้ <span class="text-danger">*</span></label>
        <div class="pl-1">
            <div>
                <ul class="list-unstyled mb-0">
                    <li class="d-inline-block mr-2 mb-1">
                        <fieldset>
                            <div class="checkbox checkbox-primary">
                                <input type="checkbox" id="ch1_1">
                                <label for="ch1_1" class="text-dark">มีไข้</label>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="checkbox checkbox-primary">
                                <input type="checkbox" id="ch1_2">
                                <label for="ch1_2" class="text-dark">ไอ</label>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="checkbox checkbox-primary">
                                <input type="checkbox" id="ch1_2">
                                <label for="ch1_2" class="text-dark">มีน้ำมูก</label>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="checkbox checkbox-primary">
                                <input type="checkbox" id="ch1_2">
                                <label for="ch1_2" class="text-dark">ปวดหัว</label>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="checkbox checkbox-primary">
                                <input type="checkbox" id="ch1_2">
                                <label for="ch1_2" class="text-dark">ปวดเมื่อยตามตัว</label>
                            </div>
                        </fieldset>
                    </li>
                </ul>
            </div>
            
        </div>
    </div>
</div>
<hr>
<div id="negPanal">
    <div class="form-group">
        <label for="" class="text-dark mb-1" style="font-size: 1.1em;">4. ในกรณีที่ผล ATK Negative <span class="text-danger">** กรุณาดำเนินการตามคำแนะนำดังต่อไปนี้</span></label>
        <ul>
            <li><a href="">คลิกที่นี่</a> เพื่อรายงานผล ATK</li>
            <li>แจ้งหัวหน้าสาขา / หัวหน้างาน / ฝ่ายบุคคล</li>
        </ul>
    </div>

    <hr class="mt-0">
    <div class="form-group mb-0">
        <label for="" class="text-dark mb-1" style="font-size: 1.1em;">5. รายงานผลการดำเนินการตามข้อมูลข้างต้นแล้ว <span class="text-danger">*</span></label>
        <div class="pl-1">
            <ul class="list-unstyled mb-0">
                <li class="d-inline-block mr-2 mb-1">
                    <fieldset>
                        <div class="checkbox checkbox-primary">
                            <input type="checkbox" id="ch1_1">
                            <label for="ch1_1" class="text-dark">รายงานผล ATK ผ่านระบบเรียบร้อยแล้ว</label>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="checkbox checkbox-primary">
                            <input type="checkbox" id="ch1_2">
                            <label for="ch1_2" class="text-dark">แจ้งหัวหน้าสาขา / หัวหน้างาน / ฝ่ายบุคคลเรียบร้อยแล้ว</label>
                        </div>
                    </fieldset>
                </li>
            </ul>
        </div>
    </div>
    <hr class="mt-0">
    <div class="form-group">
        <label for="" class="text-dark" style="font-size: 1.1em; margin-bottom: 4px;">4.2 เลือกการดำเนินการต่อไปนี้ <span class="text-danger">ข้อใดข้อหนึ่ง</span></label>
        <div class="pl-1">
            <ul class="list-unstyled mb-0">
                <li class="dn">
                    <fieldset>
                        <div class="radio radio-primary">
                            <input type="radio" name="selectNeg" id="selectNeg0" checked value="na">
                            <label for="selectNeg0" class="text-dark">ขอ Work from Home</label>
                        </div>
                    </fieldset>
                </li>
                <li class="">
                    <fieldset>
                        <div class="radio radio-primary">
                            <input type="radio" name="selectNeg" id="selectNeg1" value="wfh">
                            <label for="selectNeg1" class="text-dark">ขอ Work from Home</label>
                        </div>
                    </fieldset>
                </li>
                <li class="mb-1-">
                    <fieldset>
                        <div class="radio radio-primary">
                            <input type="radio" name="selectNeg" id="selectNeg2" value="leave">
                            <label for="selectNeg2" class="text-dark">ลาป่วย</label>
                        </div>
                    </fieldset>
                </li>
                <li class="mb-1-">
                    <fieldset>
                        <div class="radio radio-primary">
                            <input type="radio" name="selectNeg" id="selectNeg3" value="dmhtt" >
                            <label for="selectNeg3" class="text-dark">มาปฏิบัติงานตามปกติ โดยยึดหลัก DMHTT</label>
                        </div>
                    </fieldset>
                </li>
            </ul>
        </div>
    </div>
    <hr class="mt-0">
    <div class="form-group pt-1 text-right">
        <button class="btn btn-secondary" onclick="window.location = './'">รีเซ็ตแบบประเมิน</button>
        <button class="btn btn-success" onclick="wfh.submit('1_1')">บันทึกดำเนินการต่อ</button>
    </div>
</div>