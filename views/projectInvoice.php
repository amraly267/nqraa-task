<?php
require_once 'layout/header.php';
require_once '../controllers/projectCtrl.php';

$projectObject = new projectCtrl();
$projectInvoieDetails = $projectObject->projectInvoice();
?>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="invoice p-3 mb-3">

                    <div class="row text-center">
                        <div class="col-12">
                            <h4>
                                قيمة الأعمال المنفذة بعد الحسميات
                            </h4>
                            <small>
                                مستخلص رقم (34) من 24/09/219م الى 23/10/2019م
                            </small>
                        </div>
                    </div>
                    <br>
                    <div class="row invoice-info text-center">
                        <div class="col-sm-6 invoice-col">
                            <b>اسم المشروع:</b> <?php echo $projectInvoieDetails['project_name']; ?><br>
                            <b>اسم البرنامج:</b> <?php echo $projectInvoieDetails['program_name']; ?><br>
                            <b>رقم المناقصة:</b> <?php echo $projectInvoieDetails['tender_number']; ?><br>
                            <b>الجهة المشرفة:</b> <?php echo $projectInvoieDetails['supervising_authority']; ?><br>
                            <b>التاريخ المقرر للاستلام الابتدائي:</b> <?php echo $projectInvoieDetails['end_date']; ?>
                            <br>
                        </div>
                        <div class="col-sm-6 invoice-col">
                            <b>قيمة العقد بعد
                                التخفيض:</b> <?php echo $projectInvoieDetails['contract_value_after_reduction'] . ' ر.س'; ?>
                            <br>
                            <b>قيمة العقد بعد
                                الزيادة:</b> <?php echo $projectInvoieDetails['contract_value_after_increase'] . ' ر.س'; ?>
                            <br>
                            <b>مدة العقد:</b> <?php echo $projectInvoieDetails['contract_duration'] . ' يوم'; ?><br>
                            <b>تاريخ تسليم الموقع:</b> <?php echo $projectInvoieDetails['start_date']; ?><br>
                            <b>تمديد مدة
                                العقد:</b> <?php echo $projectInvoieDetails['contract_duration_extension'] . ' يوم'; ?>
                            <br>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="card-primary col-12 ">
                            <div class="card-header">
                                <h3 class="card-title text-center">
                                    القيمة الاجمالية للاعمال المنفذة حتى تاريخه:
                                    <?php echo $projectInvoieDetails['total_value_for_finished_works'] . ' ر.س'; ?>
                                </h3>
                            </div>
                        </div>

                        <div class="table-responsive mt-3 col-12">
                            <table class="table table-hover border">
                                <thead>
                                <tr>
                                    <th>الحسميات</th>
                                    <th>السابقة (ر.س)</th>
                                    <th>الحالية (ر.س)</th>
                                    <th>الاجمالي (ر.س)</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>حسميات غياب او عدم تأمين الجهاز الفني</td>
                                    <td><?php echo $projectInvoieDetails['old_staff_deduction'] . ' ر.س'; ?></td>
                                    <td><?php echo $projectInvoieDetails['current_staff_deduction'] . ' ر.س'; ?></td>
                                    <td><?php echo $projectInvoieDetails['total_staff_deduction'] . ' ر.س'; ?></td>
                                </tr>
                                <tr>
                                    <td>حسميات غياب او عدم تأمين معدات وسيارات المشروع</td>
                                    <td><?php echo $projectInvoieDetails['old_equipment_deduction'] . ' ر.س'; ?></td>
                                    <td><?php echo $projectInvoieDetails['current_equipment_deduction'] . ' ر.س'; ?></td>
                                    <td><?php echo $projectInvoieDetails['total_equipment_deduction'] . ' ر.س'; ?></td>
                                </tr>
                                <tr>
                                    <td>حسميات عدم تأمين وسائل السلامة لتأمين مواقع العمل</td>
                                    <td><?php echo $projectInvoieDetails['old_insurance_deduction'] . ' ر.س'; ?></td>
                                    <td><?php echo $projectInvoieDetails['current_insurance_deduction'] . ' ر.س'; ?></td>
                                    <td><?php echo $projectInvoieDetails['total_insurance_deduction'] . ' ر.س'; ?></td>
                                </tr>
                                <tr>
                                    <td>حسميات عامة</td>
                                    <td><?php echo $projectInvoieDetails['old_public_deduction'] . ' ر.س'; ?></td>
                                    <td><?php echo $projectInvoieDetails['current_public_deduction'] . ' ر.س'; ?></td>
                                    <td><?php echo $projectInvoieDetails['total_public_deduction'] . ' ر.س'; ?></td>
                                </tr>
                                <tr>
                                    <td>حسميات غرامة التأخير</td>
                                    <td><?php echo $projectInvoieDetails['old_delay_deduction'] . ' ر.س'; ?></td>
                                    <td><?php echo $projectInvoieDetails['current_delay_deduction'] . ' ر.س'; ?></td>
                                    <td><?php echo $projectInvoieDetails['total_delay_deduction'] . ' ر.س'; ?></td>
                                </tr>
                                <tr>
                                    <td>حسميات تخفيض قيمة العقد بنسبة 1%</td>
                                    <td><?php echo $projectInvoieDetails['old_contract_value_deduction'] . ' ر.س'; ?></td>
                                    <td><?php echo $projectInvoieDetails['current_contract_value_deduction'] . ' ر.س'; ?></td>
                                    <td><?php echo $projectInvoieDetails['total_contract_value_deduction'] . ' ر.س'; ?></td>
                                </tr>
                                <tr>
                                    <td>حسميات قيمة السلفة المقدمة بنسبة 0%</td>
                                    <td><?php echo $projectInvoieDetails['old_reclaim_value_deduction'] . ' ر.س'; ?></td>
                                    <td><?php echo $projectInvoieDetails['current_reclaim_value_deduction'] . ' ر.س'; ?></td>
                                    <td><?php echo $projectInvoieDetails['total_reclaim_value_deduction'] . ' ر.س'; ?></td>
                                </tr>
                                <tr>
                                    <td>حسم قيمة المستخلصات السابقة</td>
                                    <td>-</td>
                                    <td>-</td>
                                    <td><?php echo $projectInvoieDetails['old_extracts_deduction'] . ' ر.س'; ?></td>
                                </tr>
                                </tbody>
                                <tfoot>
                                    <th class="text-center" colspan="1">
                                        صافي المبلغ المستحق للمقاول:
                                        <?php echo $projectInvoieDetails['contractor_net_fees'] . ' ر.س'; ?>
                                    </th>
                                    <th class="text-center" colspan="2">
                                        اجمالي القيمة المضافة
                                        <?php echo $projectInvoieDetails['added_value']; ?>
                                        % من الاعمال المنفذة الحالية:
                                        <?php echo $projectInvoieDetails['total_added_value'] . ' ر.س'; ?>
                                    </th>
                                    <th class="text-center" colspan="1">
                                        مجموع قيمة الحسميات:
                                        <?php echo $projectInvoieDetails['total_deductions'] . ' ر.س'; ?>
                                    </th>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive mt-3 col-12">
                            <table class="table table-hover border">
                                <thead>
                                <tr>
                                    <th>النسبة</th>
                                    <th>%</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>نسبة الأعمال المنفذة حتى تاريخه</td>
                                    <td><?php echo '%' . $projectInvoieDetails['finished_works']; ?></td>
                                </tr>
                                <tr>
                                    <td>نسبة الاعمال المنفذة في المستخلصات السابقة</td>
                                    <td><?php echo '%' . $projectInvoieDetails['old_finished_works']; ?></td>
                                </tr>
                                <tr>
                                    <td>نسبة الاعمال المنفذة هذه الفترة</td>
                                    <td><?php echo '%' . $projectInvoieDetails['current_finished_works']; ?></td>
                                </tr>
                                <tr>
                                    <td>نسبة المدة المنقضية حتى تاريخه</td>
                                    <td><?php echo '%' . $projectInvoieDetails['elapsed_duration']; ?></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php
require_once 'layout/footer.php';
?>