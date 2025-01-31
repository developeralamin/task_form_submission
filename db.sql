CREATE TABLE submissions (
    id BIGINT(20) AUTO_INCREMENT PRIMARY KEY,
    amount INT(10),
    buyer VARCHAR(255),
    receipt_id VARCHAR(20),
    items VARCHAR(255),
    buyer_email VARCHAR(50),
    buyer_ip VARCHAR(20),
    note TEXT,
    city VARCHAR(20),
    phone VARCHAR(20),
    hash_key VARCHAR(255),
    entry_at DATE,
    entry_by INT(10),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);