// import dotenv from 'dotenv';
// dotenv.config();

require('dotenv').config({path: '/.env'})

const DB_NAME = process.env.DB_NAME || "blue_temp"
const DB_USER = process.env.DB_USER || "root"
const DB_PASSWORD = process.env.DB_PASSWORD || ""
const PORT = process.env.PORT ? Number(process.env.PORT) : 4000;

export const config = {
    mysql : {
        db_name : DB_NAME,
        db_user : DB_USER,
        db_password : DB_PASSWORD,
    },
    server : {
        port : PORT
    }
}