CREATE DATABASE IF NOT EXISTS cogip;

USE cogip;

CREATE TABLE IF NOT EXISTS types (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50),
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME ON UPDATE CURRENT_TIMESTAMP
);


CREATE TABLE IF NOT EXISTS companies(
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50),
  type_id INT,
  FOREIGN KEY(type_id) REFERENCES types(id),
  country VARCHAR(50),
  tva VARCHAR(50),
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS invoices(
  id INT AUTO_INCREMENT PRIMARY KEY,
  ref VARCHAR(50),
  id_company INT,
  FOREIGN KEY(id_company) REFERENCES companies(id),
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS contacts(
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50),
  company_id INT,
  FOREIGN KEY(company_id) REFERENCES companies(id),
  email VARCHAR(50),
  phone VARCHAR(50),
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS roles(
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50),
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS permissions(
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50),
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS roles_permission(
  id INT AUTO_INCREMENT PRIMARY KEY,
  permission_id INT,
  FOREIGN KEY(permission_id) REFERENCES permissions(id),
  role_id INT,
  FOREIGN KEY(role_id) REFERENCES roles(id)
);

CREATE TABLE IF NOT EXISTS users(
  id INT AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(50),
  role_id INT,
  FOREIGN KEY(role_id) REFERENCES roles(id),
  last_name VARCHAR(50),
  email VARCHAR(50),
  password VARCHAR(50),
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  updated_at DATETIME ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO types (name)
VALUES ("supplier"), ("client");

INSERT INTO companies (name, type_id, country, tva) 
VALUES 
      ("Raviga", 1, "United States", "US456654321"),
      ("Dunder Miffilin", 2, "United States", "US676787767"),
      ("Pierre Cailloux", 1, "France", "FR 676 676 676"),
      ("Belgalol", 1, "Belgium", "BE0987 876 787"),
      ("Jouet Jean-Michel", 2, "France", "FR787 776 999");

INSERT INTO invoices (ref, id_company)
VALUES 
      ("F20220915-001", 5),
      ("F20220915-002", 2),
      ("F20220915-003", 3),
      ("F20220915-004", 1),
      ("F20220915-005", 4);

INSERT INTO contacts (name, company_id, email, phone)
VALUES
      ("Peter Gregory", 1, "peter.gregory@raviga.com","555-4567"),
      ("Cameron How", 2, "cam.how@dundermiffilin.com","555-8765"),
      ("Gavin Belson", 3, "gavin@pcailloux.com","555-6354"),
      ("Jian Yang", 4, "jian.yan@belgalol.com","555-4567"),
      ("Bertram Gilfoy", 5, "bertram.gilfoyle@jjeanmichel.com","555-5434");

INSERT INTO roles (name)
VALUES ("Admin"), ("moderator");

INSERT INTO permissions (name)
VALUES ("create"), ("read"), ("update"), ("delete");

INSERT INTO roles_permission (permission_id, role_id)
VALUES (1, 1), (2, 1), (3, 1), (4, 1), (2,2), (1,2);

INSERT INTO users (first_name, last_name, email, password, role_id)
VALUES 
      ("Jean-Christian", "Ranu", "jc.ranu@cogip.com", "ranu", 1),
      ("Murriel", "Perrache", "murriel-perrache@cogip.com", "perrache", 2);