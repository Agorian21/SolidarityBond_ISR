var express = require('express');
var bodyParser = require("body-parser");
var cors = require('cors');

var hostname = 'localhost';
var port = 8080;

var mysql      = require('mysql');
var connection = mysql.createPool({
  connectionLimit: 50,
  host     : 'localhost',
  user     : 'root',
  database : 'webproject'
});

var app = express();

app.use(bodyParser.urlencoded({ extended: false }))
app.use(bodyParser.json())
app.use(cors())

var routeur = express.Router();

routeur.route('/api')
    .all(function (req, res) {
        res.json({message: "Testing... running perfectly !", method: req.method})
    })
;

routeur.route('/api/list_users')
    .get(function (req, res) {
            connection.query("SELECT * FROM users", function (err, rows, fields) {
            res.json(rows)
    });
  })
;

routeur.route('/api/update_user')
    .get(function (req, res) {
            connection.query("SELECT * FROM site_users", function (err, rows, fields) {
            res.json(rows)
    });
  })
;


routeur.route('/api/delete_user')
    .get(function (req, res) {
            connection.query("SELECT * FROM bde_events", function (err, rows, fields) {
            res.json(rows)
    });
  })
;

routeur.route('/api/add_user')
    .get(function (req, res) {
            connection.query("SELECT site_users.name AS user_name, site_users.surname AS user_surname, site_users.mail, bde_events.name AS event_name, cesi_campuses.name AS campus FROM can_participate INNER JOIN bde_events ON can_participate.id = bde_events.id INNER JOIN site_users ON can_participate.id_Site_Users = site_users.id INNER JOIN cesi_campuses ON site_users.id_CESI_Campuses = cesi_campuses.id", function (err, rows, fields) {
            res.json(rows)
    });
  })
;

app.use(routeur);

app.listen(port, hostname, function () {
    console.log("hey babe, thanks for keeping me alive :)")
})
