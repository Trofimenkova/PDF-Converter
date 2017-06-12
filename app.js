var express = require("express");
var bodyParser = require("body-parser");
 
var app = express();
 
var urlencodedParser = bodyParser.urlencoded({extended: false});
 
app.use(express.static(__dirname));
 
app.post("/openPDF", urlencodedParser, function (request, response) {
    if(!request.body) return response.sendStatus(400);
    
var fs = require('fs');
var PDFDocument = require('pdfkit');
var doc = new PDFDocument;
doc.pipe(fs.createWriteStream('report.pdf'));

doc.addPage
	margin: 50
	
doc.font('Times-Roman')
   .fontSize(24)
   .text('Begining of the practice', {
    align: 'center', underline: true})
   .moveDown(0.5)
   
   var d = new Date();
  d.setHours(d.getHours() + 3);
   
doc.font('Times-Roman')
   .fontSize(12)
   .text('The report was generated on '+d.toUTCString(), {
    align: 'right'})
   .moveDown(2.5)
   
   if (request.body.tel2!="") request.body.tel1+=', '+request.body.tel2;
   var table = 'Event:\nDate:\nCompany:\nName:\nSurname:\nAddress:\nEmail:\nTelephones:\n'+request.body.event+'\n'+request.body.date+'\n'+request.body.company+'\n'+request.body.name+'\n'+request.body.surname+'\n'+request.body.address+'\n'+request.body.email+'\n'+request.body.tel1;
   
   doc.font('Times-Roman')
   .fontSize(14)
   .text(table, {align: 'justify', columns: 2, width: 450, height: 200, lineGap: 10})
   .moveDown()
   
doc.end();

});
 
app.get("/", function(request, response){
     
    response.send("<h1>Главная страница</h1>");
});
 
app.listen(3000);