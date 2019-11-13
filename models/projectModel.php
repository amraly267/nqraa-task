<?php

require_once '../config/database.php';

//=== Project Model Class ===
class projectModel
{
    private $conn;

    public function __construct()
    {
        $configDB = new database();
        $this->conn = $configDB->dbConnect();
    }

    //=== Get Project Invoice Details From DB Function ===
    function getProjectInvoice()
    {
        $query = "select * from projects ";
        $query .= "inner join project_deductions on projects.id = project_deductions.project_id ";
        $query .= "inner join project_follow_up on projects.id = project_follow_up.project_id ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    //=== End Function ===

}
//=== End Class ===

?>