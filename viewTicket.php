<?php 
    $title = "View Ticket";
    require './includes/header.php';
    require './includes/authckeck.php';
    $ticketresult = $crud->fetchTicket($_GET['tid'], $_SESSION['userid']);
    if(!$ticketresult) {
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
<style>  
  table {  
    font-family: arial, sans-serif;  
    border-collapse: collapse;  
    width: 50%;
    margin: 0px auto;
  }
  #htmlContent{
    text-align: center;
  }  
  td, th, button {  
    border: 1px solid #dddddd;  
    text-align: left;  
    padding: 8px;  
  }  
  button {  
    border: 1px solid black;   
  } 
  tr:nth-child(even) {  
    background-color: #dddddd;  
  }  
</style>  
<div id="htmlContent">
  <h2 style="color: #0094ff">Ticket Details</h2>  
  <h3><strong>Ticket ID:</strong> <?php echo $ticketResult['tid']; ?></h3>  
  <table>  
    <tbody>  
      <tr>  
        <th>Person</th>  
        <th>Contact</th>  
        <th>Country</th>  
      </tr>  
      <tr>  
        <td>John</td>  
        <td>+2345678910</td>  
        <td>Germany</td>  
      </tr>  
      <tr>  
        <td>Jacob</td>  
        <td>+1234567890</td>  
        <td>Mexico</td>  
      </tr>  
      <tr>  
        <td>Eleven</td>  
        <td>+91234567802</td>  
        <td>Austria</td>  
      </tr>  
    </tbody>  
  </table>    
</div>
<div id="editor"></div>
<center>
  <p>
    <button id="generatePDF">generate PDF</button>
  </p>
</center>

<script type="text/javascript">
var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};
 
 
$('#generatePDF').click(function () {
    doc.fromHTML($('#htmlContent').html(), 15, 15, {
        'width': 700,
        'elementHandlers': specialElementHandlers
    });
    doc.save('sample_file.pdf');
});
</script>
<?php
    }
  include 'includes/footer.php'
?>