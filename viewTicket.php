<?php 
    $title = "View Ticket";
    require './includes/header.php';
    require './includes/auth_check.php';
    $ticketresult = $crud->fetchTicket($_GET['tid'], $_SESSION['userid']);
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
    border-: ;  
    text-align: left;  
    padding: 8px;  
  }  
  button {  
    border: 1px solid black;   
  } 
</style>  
<div id="htmlContent">
  <h2 style="color: #0094ff">Ticket Details</h2>  
  <h3><strong>Ticket ID:</strong> <?php echo $ticketresult['ticketid']; ?></h3>  
  <table>  
    <tbody>  
      <tr>  
        <th>Name</th>  
        <td><?php echo $ticketresult['fname'] . " " . $ticketresult['lname']; ?></td>
      </tr>  
      <tr>  
        <th>Place</th>  
        <td><?php echo $ticketresult['placename']; ?></td>
      </tr>  
      <tr>  
        <th>Number of Visitors</th>  
        <td><?php echo $ticketresult['numberofvisitors']; ?></td>
      </tr>  
      <tr>  
        <th>Date of Visit</th>  
        <td><?php echo $ticketresult['dateofvisit']; ?></td>
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
  include 'includes/footer.php'
?>