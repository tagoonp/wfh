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
                                <input type="checkbox" id="ch1_3">
                                <label for="ch1_3" class="text-dark">มีน้ำมูก</label>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="checkbox checkbox-primary">
                                <input type="checkbox" id="ch1_4">
                                <label for="ch1_4" class="text-dark">ปวดหัว</label>
                            </div>
                        </fieldset>
                        <fieldset>
                            <div class="checkbox checkbox-primary">
                                <input type="checkbox" id="ch1_5">
                                <label for="ch1_5" class="text-dark">ปวดเมื่อยตามตัว</label>
                            </div>
                        </fieldset>
                    </li>
                </ul>
            </div>
            
        </div>
    </div>
</div>
<hr>


<div id="posPanal">
    <div class="form-group">
        <label for="" class="text-dark mb-1" style="font-size: 1.1em;">4. ในกรณีที่ผล ATK Positive <span class="text-danger">** กรุณาดำเนินการตามคำแนะนำดังต่อไปนี้</span></label>
        <ul>
            <li><a href="">คลิกที่นี่</a> เพื่อรายงานผล ATK</li>
            <li>แจ้งหัวหน้าสาขา / หัวหน้างาน / ฝ่ายบุคคล</li>
            <li>ติดต่อศูนย์ HI/CI (ภายใน โทร 1039)</li>
            <li><a href="">คลิกที่นี่</a> เพื่อลงทะเบียน home.songkhla.care (กักตัวที่บ้าน)</li>
            <li>ติดตามการพิจารณาของโรงพยาบาล</li>
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
                            <input type="checkbox" id="ch2_1">
                            <label for="ch2_1" class="text-dark">รายงานผล ATK ผ่านระบบเรียบร้อยแล้ว</label>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="checkbox checkbox-primary">
                            <input type="checkbox" id="ch2_2">
                            <label for="ch2_2" class="text-dark">แจ้งหัวหน้าสาขา / หัวหน้างาน / ฝ่ายบุคคลเรียบร้อยแล้ว</label>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="checkbox checkbox-primary">
                            <input type="checkbox" id="ch2_3">
                            <label for="ch2_3" class="text-dark">ติดต่อศูนย์ HI/CI เรียบร้อยแล้ว</label>
                        </div>
                    </fieldset>
                    <fieldset>
                        <div class="checkbox checkbox-primary">
                            <input type="checkbox" id="ch2_4">
                            <label for="ch2_4" class="text-dark">ลงทะเบียน home.songkhla.care เรียบร้อยแล้ว</label>
                        </div>
                    </fieldset>
                </li>
            </ul>
        </div>
    </div>
    <hr class="mt-0">
    <div class="form-group mb-0">
        <label for="" class="text-dark mb-1" style="font-size: 1.1em;">6. การ Work From Home <span class="text-danger">*</span></label>
        <div class="pl-1">
            <div class="row">
                <div class="form-group col-12 mb-0">
                    <label for="">วันที่เริ่ม WFH : <span class="text-danger">*</span></label>
                </div>
                <div class="form-group mb-0 col-4">
                    <select name="" id="" class="form-control">
                        <option value="">-- DD --</option>
                    </select>
                </div>
                <div class="form-group mb-0 col-4">
                    <select name="" id="" class="form-control">
                        <option value="">-- MM --</option>
                    </select>
                </div>
                <div class="form-group mb-0 col-4">
                    <select name="" id="" class="form-control">
                        <option value="">-- YYYY --</option>
                        <?php 
                        for ($i=date('Y'); $i <= date('Y') + 1; $i++) { 
                            ?>
                            <option value="<?php echo $i; ?>"><?php echo $i + 543; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="pl-1 pt-1">
            <div class="row">
                <div class="form-group col-12 mb-0">
                    <label for="">วันสุดท้ายที่จะ WFH : <span class="text-danger">*</span></label>
                </div>
                <div class="form-group mb-0 col-4">
                    <select name="" id="" class="form-control">
                        <option value="">-- DD --</option>
                    </select>
                </div>
                <div class="form-group mb-0 col-4">
                    <select name="" id="" class="form-control">
                        <option value="">-- MM --</option>
                        <?php 
                        foreach ($month_sh_th as $key => $value) {
                            if($key != 0){
                                ?>
                                <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group mb-0 col-4">
                    <select name="" id="" class="form-control">
                        <option value="">-- YYYY --</option>
                        <?php 
                        for ($i=date('Y'); $i <= date('Y') + 1; $i++) { 
                            ?>
                            <option value="<?php echo $i; ?>"><?php echo $i + 543; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>

       
    </div>

    
    <hr class="mt-2">
    <div class="form-group pt-1 text-right">
        <button class="btn btn-secondary" onclick="window.location = './'">รีเซ็ตแบบประเมิน</button>
        <button class="btn btn-success" onclick="wfh.submit('1_2')">บันทึกดำเนินการต่อ</button>
    </div>
</div>