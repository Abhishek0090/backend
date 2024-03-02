import { Request, Response } from "express";
import db from "../database";
import Logging from "../library/Logging";

// * UserLogin
const userLogin = (req: Request, res: Response) => {
  const email = req.body.email;
  const password = req.body.password;
  try {
    db.query(
      `SELECT * FROM users WHERE email = "${email}" AND password = "${password}"`,
      (err, results) => {
        if (results) {
          res.status(200).json({ results });
        } else if (err) {
          res.status(400).json({ error: err });
        } else {
          res.status(200).json({ message: "No User Found" });
        }
      }
    );
  } catch (e) {
    res.status(400).json(e);
  }
};

const signUp = (req: Request, res: Response) => {
  const email = req.body.email;
  const name = req.body.name;
  const password = req.body.password;

  try {
    db.query(
      `INSERT INTO users VALUES ('','${name}','${email}','${password}')`,
      (results, err) => {
        if (results) {
          Logging.info(results);
          res.status(200).json(results);
        } else {
          Logging.error(err);
          res.status(400).json(err);
        }
      }
    );
  } catch (e) {
    Logging.error(e);
    res.status(404).json(e);
  }
};

export default { userLogin, signUp };
