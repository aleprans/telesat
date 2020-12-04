<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
    <!-- <link rel="stylesheet" type="text/css" href="app.css" /> -->
    <!-- <script src="app.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
</head>
<body>

<button type="button" id="pdfDownloader">Download</button>
<div id="printDiv" class="xpto">
  <p>
    <table>
  <tr>
    <th>Company</th>
    <th>Contact</th>
    <th>Country</th>
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Maria Anders</td>
    <td>Germany</td>
  </tr>
</table>
</p>
</div>

<style>
.xpto{
    width:600px;
    height:1000px;
    background:white;
    padding:5px;
}

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

<script>
    $(document).ready(function(){

//pdf 	
$("#pdfDownloader").click(function(){

    html2canvas(document.getElementById("printDiv"), {
        onrendered: function(canvas) {
                            
            var imgData = canvas.toDataURL('image/jpeg');
            
            console.log('Image URL: ' + imgData);

            var doc = new jsPDF('p','mm','a4');
            
            doc.setFontSize(10);
                                                            
            doc.text(10, 15, 'Filter section will be printed where.')
            
            doc.addImage(imgData, 'jpeg', 10, 20);
            
            doc.save('sample.pdf');
        }
    });

});
});
</script>