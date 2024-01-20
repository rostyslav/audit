CREATE TABLE audit_user (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY (id)
) ENGINE = InnoDB;

CREATE TABLE audit_entity (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY uq_audit_entity_name (name)
) ENGINE = InnoDB;

CREATE TABLE audit_property (
    id INT NOT NULL AUTO_INCREMENT,
    entity_id INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY uq_audit_entity_name (name)
) ENGINE = InnoDB;

CREATE TABLE audit_event (
    id INT NOT NULL AUTO_INCREMENT,
    record_id INT NOT NULL,
    event_type ENUM('CREATE', 'RETRIEVE', 'UPDATE', 'DELETE') NOT NULL,
    entity_id INT NOT NULL,
    PRIMARY KEY (id)
) ENGINE = InnoDB;

CREATE TABLE audit_record (
    id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    ip binary(16) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    KEY ix_record_user_id(user_id),
    CONSTRAINT fk_record_user FOREIGN KEY (user_id) REFERENCES audit_user(id)
) ENGINE = InnoDB;

