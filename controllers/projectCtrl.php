<?php

require_once '../models/projectModel.php';

//=== Project Controller Class ===
class projectCtrl
{
    private $projectModelObject;

    function __construct()
    {
        $this->projectModelObject = new projectModel();
    }

    //=== Get The Detail Of Project Invoice And Calculate Total Values Function ===
    public function projectInvoice()
    {
        $projectInvoiceDetails = $this->projectModelObject->getProjectInvoice();
        //=== اجمالي حسميات غياب او عدم تأمين الجهاز الفني ===
        $projectInvoiceDetails['total_staff_deduction'] = $projectInvoiceDetails['old_staff_deduction'] + $projectInvoiceDetails['current_staff_deduction'];

        //=== اجمالي حسميات غياب او عدم تأمين  معدات وسيارات المشروع ===
        $projectInvoiceDetails['total_equipment_deduction'] = $projectInvoiceDetails['old_equipment_deduction'] + $projectInvoiceDetails['current_equipment_deduction'];

        //=== اجمالي حسميات عدم تأمين وسائل السلامة لتأمين مواقع العمل ===
        $projectInvoiceDetails['total_insurance_deduction'] = $projectInvoiceDetails['old_insurance_deduction'] + $projectInvoiceDetails['current_insurance_deduction'];

        //=== اجمالي حسميات عامة ===
        $projectInvoiceDetails['total_public_deduction'] = $projectInvoiceDetails['old_public_deduction'] + $projectInvoiceDetails['current_public_deduction'];

        //=== اجمالي حسميات غرامة التأخير ===
        $projectInvoiceDetails['total_delay_deduction'] = $projectInvoiceDetails['old_delay_deduction'] + $projectInvoiceDetails['current_delay_deduction'];

        //=== اجمالي حسميات تخفيض قيمة العقد 1% ===
        $projectInvoiceDetails['total_contract_value_deduction'] = $projectInvoiceDetails['old_contract_value_deduction'] + $projectInvoiceDetails['current_contract_value_deduction'];

        //=== اجمالي حسميات قيمة السلفة المقدمة بنسبة 0% ===
        $projectInvoiceDetails['total_reclaim_value_deduction'] = $projectInvoiceDetails['old_reclaim_value_deduction'] + $projectInvoiceDetails['current_reclaim_value_deduction'];

        //=== مجموع قيمة الحسميات ===
        $projectInvoiceDetails['total_deductions'] = $projectInvoiceDetails['total_staff_deduction'] + $projectInvoiceDetails['total_equipment_deduction'] + $projectInvoiceDetails['total_insurance_deduction'] + $projectInvoiceDetails['total_public_deduction'] + $projectInvoiceDetails['total_delay_deduction'] + $projectInvoiceDetails['total_contract_value_deduction'] + $projectInvoiceDetails['total_reclaim_value_deduction'] + $projectInvoiceDetails['old_extracts_deduction'];

        //=== القيمة الاجمالية للاعمال المنفذة ===
        $projectInvoiceDetails['total_value_for_finished_works'] = $projectInvoiceDetails['contractor_net_fees'] + $projectInvoiceDetails['total_deductions'];

         //=== اجمالي القيمة المضافة 5% من الاعمال المنفذة الحالية ===
        $projectInvoiceDetails['total_added_value'] = ($projectInvoiceDetails['contractor_net_fees'] * $projectInvoiceDetails['added_value'])/100;
        return $projectInvoiceDetails;
    }
    //=== End Function ===


}

//=== End Class ===


?>