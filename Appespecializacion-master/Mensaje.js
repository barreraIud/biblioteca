const express = require("express");

module.exports = function(options={}){

    const router = express.Router();

    router.get("/saludar", (req,res)=>{
        msg = options.saludo;
        res.end(msg);
    })
    
    return router;
}