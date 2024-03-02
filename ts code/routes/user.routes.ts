import express, { Router } from "express";
import controller from "../controllers/user.controller";

const router : Router = express.Router();

router.post('/login',controller.userLogin);

router.post('/signup',controller.signUp);

export = router;