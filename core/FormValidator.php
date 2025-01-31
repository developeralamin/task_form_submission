<?php
class FormValidator {
    public static function validate($data) {
        $errors = [];

        if (empty($data["amount"]) || !is_numeric($data["amount"])) {
            $errors["amount"] = "Amount must be a valid number.";
        }
        if (empty($data["buyer"]) || strlen($data["buyer"]) > 20 || !preg_match("/^[a-zA-Z0-9 ]+$/", $data["buyer"])) {
            $errors["buyer"] = "Buyer name must be only letters, numbers, and spaces (max 20 characters).";
        }
        if (empty($data["receipt_id"])) {
            $errors["receipt_id"] = "Receipt ID is required.";
        }
        if (!filter_var($data["buyer_email"], FILTER_VALIDATE_EMAIL)) {
            $errors["buyer_email"] = "Enter a valid email.";
        }
        if (empty($data["city"]) || !preg_match("/^[a-zA-Z ]+$/", $data["city"])) {
            $errors["city"] = "City name must contain only letters and spaces.";
        }
        if (!preg_match("/^[0-9]{9,}$/", $_POST["phone"] ?? "")) {
            $errors["phone"] = "Phone number must be at least 9 digits.";
        }
        if (!empty($data["note"]) && str_word_count($data["note"]) > 30) {
            $errors["note"] = "Note must be within 30 words.";
        }
        if (empty($data["entry_by"]) || !is_numeric($data["entry_by"])) {
            $errors["entry_by"] = "Entry By must be a valid number.";
        }

        return $errors;
    }
}
?>
