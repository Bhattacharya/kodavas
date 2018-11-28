/**
 * http://usejsdoc.org/
 */
var nodemailer = require('nodemailer');

var transporter = nodemailer.createTransport({
  service: 'gmail',
  auth: {
    user: 'KodavaConventionBoston@gmail.com',
    pass: 'bo$ton2019'
  }
});

var mailOptions = {
  from: 'KodavaConventionBoston@gmail.com',
  to: 'shruti_mandana@yahoo.com',
  subject: 'Sending Email using Node.js',
  text: 'That was easy!'
};

transporter.sendMail(mailOptions, function(error, info){
  if (error) {
    console.log(error);
  } else {
    console.log('Email sent: ' + info.response);
  }
});