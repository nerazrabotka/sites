const path = require('path');
const User = require('../models/model');

exports.index = function (req, res) {
    res.sendFile(path.resolve('views/reg.html'));
};

exports.create = function (req, res) {
    var newUser = new User(req.body);
    console.log(req.body);
    newUser.save(function (err) {
            if(err) {
            res.status(400).send('Unable to save user to database');
        } else {
            res.redirect('/route/profile');
        }
  });
               };

exports.list = function (req, res) {
        User.find({}).exec(function (err, user) {
                if (err) {
                        return res.send(500, err);
                }
                res.render('profile', {
                        user: user
             });
        });
};
