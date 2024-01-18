CREATE TABLE audit_user (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY (id)
) ENGINE = InnoDB;

CREATE TABLE audit_event (
    id INT NOT NULL AUTO_INCREMENT,
    event_type ENUM('CREATE', 'RETRIEVE', 'UPDATE', 'DELETE') NOT NULL,
    PRIMARY KEY (id)
) ENGINE = InnoDB;

CREATE TABLE audit_record (
    id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    event_id INT NOT NULL,
    ip binary(16) NOT NULL,
    PRIMARY KEY (id),
    KEY ix_record_user_id(user_id),
    CONSTRAINT fk_record_user FOREIGN KEY (user_id) REFERENCES audit_user(id)
) ENGINE = InnoDB;
