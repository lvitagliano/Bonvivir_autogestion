const express = require("express");
const Rijndael = require("rijndael-js");

const app = express();

app.get("/encrypt/:text", function (req, res) {
  const key = process.env.ENCRYPT_SECRET_KEY || "3fe92ba8ed095074a3b56e83228dbc83";
  const original = req.params.text || "";
  const iv = "3fe92ba8ed095074a3b56e83228dbc83";
  const cipher = new Rijndael(key, process.env.ENCRYPT_MODE || "ecb");
  const ciphertext = Buffer.from(cipher.encrypt(original, 256, iv));
 
  res.send(ciphertext.toString("base64"));
});

app.listen(4000);
console.log("Listening on port: 4000");
