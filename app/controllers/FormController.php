<?php
require_once __DIR__ . "/../models/FormModel.php";
require_once __DIR__ . "/../../core/Helpers.php";
require_once __DIR__ . "/../../core/FormValidator.php";

class FormController {
    private $model;

    public function __construct() {
        $this->model = new FormModel();
    }

    public function submitForm() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            session_start();

            // Check if user has submitted within 24 hours
            if (isset($_COOKIE["submitted"])) {
                echo json_encode(["status" => "error", "message" => "You can only submit once every 24 hours."]);
                exit;
            }

            $data = [
                "amount" => $_POST["amount"] ?? null,
                "buyer" => $_POST["buyer"] ?? null,
                "receipt_id" => $_POST["receipt_id"] ?? null,
                "items" => isset($_POST["items"]) ? json_encode($_POST["items"]) : json_encode([]),
                "buyer_email" => $_POST["buyer_email"] ?? null,
                "buyer_ip" => getUserIP(),
                "note" => $_POST["note"] ?? null,
                "city" => $_POST["city"] ?? null,
                "phone" => "880" . ($_POST["phone"] ?? ""),
                "hash_key" => generateHashKey($_POST["receipt_id"] ?? ""),
                "entry_by" => $_POST["entry_by"] ?? null
            ];

              // Validate input using FormValidator
              $errors = FormValidator::validate($data);
              if (!empty($errors)) {
                  echo json_encode(["status" => "error", "errors" => $errors]);
                  exit;
              }

            // Save data to database
            if ($this->model->saveData($data)) {
                setcookie("submitted", "true", time() + 86400, "/");
                echo json_encode(["status" => "success", "message" => "Form submitted successfully."]);
            } else {
                echo json_encode(["status" => "error", "message" => "Database error."]);
            }
        }
    }

    // show the data 
    public function getAllRecords() {
        $dateFrom = $_GET['date_from'] ?? null;
        $dateTo = $_GET['date_to'] ?? null;
        $userId = $_GET['entry_by'] ?? null;
    
        return $this->model->getAllRecords($dateFrom, $dateTo, $userId);
    }
    
}

$controller = new FormController();
$controller->submitForm();


?>
