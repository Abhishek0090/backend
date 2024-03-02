import mysql from "mysql2";
import {config} from "./config";

const db = mysql.createConnection({
  host: "localhost",
  user: config.mysql.db_user,
  password: config.mysql.db_password,
  database: config.mysql.db_name,
});

export default db;