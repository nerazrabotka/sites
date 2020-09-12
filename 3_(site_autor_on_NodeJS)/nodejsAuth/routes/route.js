const express = require('express');
const router = express.Router();
const controller = require('../controllers/controller');

router.get('/', function(req, res){
    controller.index(req,res);
});

router.post('/reg', function(req, res) {
    controller.create(req,res);
});

router.get('/profile', function(req, res) {
    controller.list(req,res);
});

module.exports = router;
