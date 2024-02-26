<?php

// App

const API_URL = "/api/v1";

// Database
//const DB_HOST = 'localhost';
//const DB_NAME = 'instagram';
//const DB_USER = 'postgres';
//const DB_PASS = 'admin';
//const DB_PORT = '5432';

putenv("DB_HOST=localhost");
putenv("DB_NAME=instagram");
putenv("DB_USER=postgres");
putenv("DB_PASS=admin");
putenv("DB_PORT=5432");

// Heroku
putenv("DATABASE_URL=postgres://mrmgtwdswnrzmr:b0b4e2373e7bf5fd24eb61cde12ae79111fa50c9a834b9f5f24d8a28b1769240@ec2-54-73-22-169.eu-west-1.compute.amazonaws.com:5432/d69m6rj1q25iot");