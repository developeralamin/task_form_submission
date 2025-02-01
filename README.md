

## Form Submission
📌 Steps to Run the Project

How to setup locally

- Step:1 - Clone the repository inside the xampp folder
```bash
git clone https://github.com/developeralamin/task_form_submission
```


- Step:2 - Create a database in MySQL
```
CREATE DATABASE your_database_name;
```

- Step:3 - Update your database connection in config.php:
```bash
  "DB_HOST" => "localhost",
  "DB_NAME" => "test_db",
  "DB_USER" => "root",
  "DB_PASS" => ""
```

- Step:4 -Import the db.sql file in database

📌 How the Project Works
```
📌 How the Project Works
1️. Homepage: When you first visit the project, you’ll see the home page with a list of records.
2️. Add Submission: Click the "Add Submission" button and show the form page.
3️. Fill & Submit: Enter the required data and click Submit to save the form.
4️. View Submissions: After submission, click "List" to see all submitted records.
5️. Filter Data: You can filter submissions based on Date Range and entry_by .
```

Note: 
Using cookie, prevent users can not create multiple submissions within 24 hours.
If you try to multiple submission within 24 hours delete the cookie (cookie_name = submitted)





