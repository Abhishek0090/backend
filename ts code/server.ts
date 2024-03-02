import express from "express";
import Logging from "./library/Logging";
import swaggerUi from "swagger-ui-express";
import userRoutes from "./routes/user.routes";
import fs = require("fs");
import http from "http";
import { config } from "./config";

const router = express();

const startServer = () => {
  // ! Logging discipline
  router.use((req, res, next) => {
    // Log the Request//
    Logging.info(
      `Incoming --> Method : [${req.method}] + URL : [${req.url}] - IP : [${req.socket.remoteAddress}]`
    );
    res.on("finish", () => {
      Logging.info(
        `Incoming --> Method : [${req.method}] + URL : [${req.url}] - IP : [${req.socket.remoteAddress}] - Status : [${res.statusCode}]`
      );
    });
    next();
  });

  router.use(express.urlencoded({ extended: true }));
  router.use(express.json()); //making sure all data we getting is in json.

  // ! Swagger
  const swaggerFile: any = process.cwd() + "/utils/swagger.json";
  const swaggerData: any = fs.readFileSync(swaggerFile, "utf8");

  const swaggerDocument = JSON.parse(swaggerData);
  router.use("/docs", swaggerUi.serve, swaggerUi.setup(swaggerDocument));

  //  ! HealthCheck
  router.get("/ping", (req, res, next) =>
    res.status(200).json({ message: "pong" })
  );

  // ! Routes
  // ? Always keep the api routes and its collected defined before the error handling function executes.
  router.use("/user", userRoutes);

  // ! Error Handling
  router.use((req, res, next) => {
    const error = new Error("not found");
    Logging.error(error);
    return res.status(404).json({ message: error.message });
  });

  // ! Server Creation
  http.createServer(router).listen(config.server.port, () => {
    Logging.info(`Server is running on port 4000`);
  });
};

startServer();
