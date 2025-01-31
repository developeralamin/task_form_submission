<?php
require_once __DIR__ . "/../../core/Database.php";

class FormModel {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function saveData($data) {
        $query = "INSERT INTO submissions (amount, buyer, receipt_id, items, buyer_email, buyer_ip, note, city, phone, hash_key, entry_at, entry_by) 
                  VALUES (:amount, :buyer, :receipt_id, :items, :buyer_email, :buyer_ip, :note, :city, :phone, :hash_key, NOW(), :entry_by)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute($data);
    }
    
    public function getAllRecords($dateFrom = null, $dateTo = null, $userId = null) {
        $query = "SELECT * FROM submissions WHERE 1=1";
        $params = [];
    
        if ($dateFrom) {
            $query .= " AND entry_at >= :dateFrom";
            $params['dateFrom'] = $dateFrom . " 00:00:00";
        }
    
        if ($dateTo) {
            $query .= " AND entry_at <= :dateTo";
            $params['dateTo'] = $dateTo . " 23:59:59";
        }
    
        if ($userId) {
            $query .= " AND entry_by = :userId";
            $params['userId'] = $userId;
        }
    
        $query .= " ORDER BY entry_at DESC";
        
        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);
    
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    

}
?>
