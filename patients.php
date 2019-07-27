
<html>

    <?
    session_start();
    ?>

    <head>
        <title> Logged</title>
        <meta charset="UTF-8">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>  

        <script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
        <script src="js/script.js"></script>
    
    
    </head>
    
    <body id="pat-b">
 
            <div id="particles-js"></div>
            <div class="row">
                <button class="btn btn-danger" id="log-out-btn">Log Out</button>
            </div>
            <div class="row">
                <h3 id="hello-usr">Hello <?=$_SESSION['email']?></h3>
            </div>
            <div class="row">
                <input class="form-control" type="text" id="search-inp" onkeyup="searchFc()" placeholder="Who are you looking for?"/>
                <button class="btn btn-primary" id="add-pat-btn">Add Patient</button>
            </div>

            <form id="add-patients-form">
                <div class="form-group">
                    <label for="fname">First Name</label>
                    <input class="form-control" type="text" id="fname" name="fname">
                    <label for="lname">Last Name</label>
                    <input class="form-control" type="text" id="lname" name="lname">
                    <label for="birthday">Birthday</label>
                    <input class="form-control" type="date" id="birthday" name="birthday">
                    <label for="notes">Notes</label>
                    <input class="form-control" type="text" id="notes" name="notes">
                </div>
                <button class="btn btn-success" id="add-btn">Add</button>
            </form>

            <!-- The pat table creates here dynamically -->
            <div id="patients"></div>



            <!------ Modal for update ---------->
                <div class="modal fade" id="updatemodal" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 style="color:black;"></span> Update</h4>
                            </div>
                            <div class="modal-body">
                                <form id="data-to-update">
                                    <input type="hidden" class="form-control" name="mid" id="mid"> 

                                    <div class="form-group">
                                    <label for="mfname">First Name</label>
                                    <input type="text" class="form-control" name="mfname" id="mfname">
                                    </div>
                                    <div class="form-group">
                                    <label for="mlname">Last name</label>
                                    <input type="text" class="form-control" name="mlname" id="mlname">
                                    </div>
                                    <div class="form-group">
                                    <label for="mbirthday"> Birthday</label>
                                    <input type="text" class="form-control" name="mbirthday" id="mbirthday">
                                    </div>
                                    <div class="form-group">
                                    <label for="mregisteredDate"> Registered Date</label>
                                    <input type="text" class="form-control" name="mregisteredDate" id="mregisteredDate">
                                    </div>
                                    <div class="form-group">
                                    <label for="mnotes"> Notes</label>
                                    <input type="text" class="form-control" name="mnotes" id="mnotes">
                                    </div>
                                    <button type="button" id="update-btn" class="btn btn-default btn-success btn-block">Update</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-default btn-default pull-right" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>  <!-- modal end -->

 
    </body>

</html>

<script>

//oclick update pat
$(function() {
    $("#update-btn").click(function(){
        var postData=$('#data-to-update').serialize();
        $("#updatemodal").modal('toggle');

        $.ajax({
            url: "php/updatepat.php",
            type: "post",
            data: postData,
            success: function(rsp){
                //console.log("mere");
                generateTable();
            }
        });
    });
});

        //delete pat
        function deletepat(id){
            console.log("intra" + id);
            $.ajax({
                    url: "php/deletepat.php",
                    type: "post",
                    data:{'id':id},
                    success: function(rsp){
                            generateTable();
                        }
                    
                });
        }

        //get selected pat id an fill the modal to up
        function updatepat(id){
            console.log("intra" + id);
            $("#mid").val(id);
           $("#updatemodal").modal();
           $.ajax({
                    url: "php/getpatientbyid.php",
                    type: "post",
                    data:{'id':id},
                    success: function(rsp){
                            var data = JSON.parse(rsp);
                            $("#mfname").val(data.fname);
                            $("#mlname").val(data.lname);
                            $("#mbirthday").val(data.birthday);
                            $("#mregisteredDate").val(data.registeredDate);
                            $("#mnotes").val(data.notes);
                        }
                    
                });

        }

        //generate table for pats
        function generateTable(){
            $.ajax({
                    url: "php/getpatients.php",
                    type: "post",
                    success: function(rsp){
                            var table = "<table id='pat-table'><tr class='header'><th>First Name</th><th>Last Name</th><th>Birthday</th><th>Registered Date</th><th>Notes</th><th>Remove</th><th>Update</th></tr>";
                            var data = JSON.parse(rsp);
                            for(var pat in data){
                                console.log(pat);
                                table+= "<tr><td>"+data[pat].fname+"</td>";
                                table+= "<td>"+data[pat].lname+"</td>";
                                table+= "<td>"+data[pat].birthday+"</td>";
                                table+= "<td>"+data[pat].registeredDate+"</td>";
                                table+= "<td>"+data[pat].notes+"</td>";
                                table+= "<td><button class='btn btn-default' onclick='deletepat("+data[pat].id+");'>Delete</button></td>";
                                //var onclick = "updatepat("+data[pat].id+",\'"+data[pat].fname+"\',\'"+data[pat].lname+"\',\'"+data[pat].birthday+"\',\'"+data[pat].registeredDate+"\',\'"+data[pat].notes+"\');"
                                table+="<td><button class='btn btn-default' onclick='updatepat("+data[pat].id+")'>Update</button> </td></tr>"
                            }
                            table+="</table>"
                            $("#patients").html(table);
                        }
                    
                });

        }
        //call generateTable to generate the first instance of the table
        generateTable();


//script for onkeyup search

function searchFc(){
  // Declare variables 
  var input, filter, table, tr, td,td2, i, txtValue;
  input = document.getElementById("search-inp");
  filter = input.value.toUpperCase();
  table = document.getElementById("pat-table");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];

   
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } //end if td

  }//end for

}//end fc



</script>