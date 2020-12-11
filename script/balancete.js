/*
$(document).ready(function(){
    $('#gerar').click(function() {
      savePDF(document.querySelector('#teste'));
    });
});
  
function savePDF(codigoHTML) {
  var doc = new jsPDF('portrait', 'pt', 'a4'),
      data = new Date();
  margins = {
    top: 40,
    bottom: 60,
    left: 40,
    width: 1000
  };
  doc.fromHTML(codigoHTML,
               margins.left, // x coord
               margins.top, { pagesplit: true },
               function(dispose){
    doc.save("Balancete - "+data.getDate()+"/"+data.getMonth()+"/"+data.getFullYear()+".pdf");
  });
}
*/

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
              doc.save("Balancete - "+data.getDate()+"/"+data.getMonth()+"/"+data.getFullYear()+".pdf");
          }  
      });
  
  });
  });

/*
function gerar_pdf(){

    
    var dados = document.getElementById('teste').innerHTML

    var janela = window.open('','','wigth=800,heigth=600')
    janela.document.write('<html><head>')
    janela.document.write('<title>PDF</title></head>')
    janela.document.write('<body.')
    janela.document.write(dados)
    janela.document.write('</body></html>')
    // janela.document.close()
    janela.open()
}    

*/ 

