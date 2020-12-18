$(document).ready(function(){

  //pdf 	
  $("#gerar").click(function(){
      html2canvas(document.getElementById("pdf"), {
          onrendered: function(canvas) {
              data = new Date();                
              var imgData = canvas.toDataURL('image/jpeg');
              var imgWidth = 210;
              var pageHeight = 297;

              var imgHeight = canvas.height * imgWidth / canvas.width;
              var heightLeft = imgHeight;
              var position = 0;
  
              var doc = new jsPDF('p','mm');
              var fix_imgWidth = 15;
              var fix_imgHeight = 15;
              doc.setFontSize(10);
                                                              
              doc.text(10, 15, 'Filter section will be printed where.')

              doc.addImage(imgData, 'jpeg', 0, position, imgWidth, imgHeight);
              heightLeft -= pageHeight;

              while (heightLeft >= 0){
                position = heightLeft - imgHeight;
                doc.addPage();
                doc.addImage(imgData, 'jpeg', 20, position, imgWidth + fix_imgWidth, imgHeight + fix_imgHeight);
                heightLeft -= pageHeight;
              }
              var mes = (data.getMonth()+1)
              doc.save("Balancete - "+data.getDate()+"/"+mes+"/"+data.getFullYear()+".pdf");
          }  
      });
  
  });
});

/*
// novo teste
var doc = new jsPDF({
  orientation: 'retrato',
  unit: 'cm',
  format: 'a4'
})
// doc.text('Hello Word', 10, 10)
var source = window.document.getElementById("pdf")[0]
doc.fromHTML(
  source,
  1,
  1,
  {
    'wigth': 180
  })
  doc.output('dataurlnewwindow')
  */
