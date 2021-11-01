CREATE DATABASE contact_db;

USE contact_db;

CREATE TABLE  contacts (
 "id" int(3) NOT NULL PRIMARY KEY,
	"name" VARCHAR(60),
	"email" VARCHAR(100),
	"phone" VARCHAR(20),
	"message" TEXT,
	"timestamp" TIMESTAMP
);