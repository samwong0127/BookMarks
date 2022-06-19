<?php
session_start();
//include "login.php";
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    //print($_SESSION['username']);


?>
<!DOCTYPE html>
<html>
<head>
    <title>HOME</title>
    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="file.js"></script>
    
    <link rel="stylesheet" type="text/css" href="style_home.css">
	<link rel="shortcut icon" href="#">
	<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<meta content="utf-8" http-equiv="encoding">
    
</head>

<body>
    <script type="text/javascript">
    
    
    var stage=1;
    
        	// not finished
    function showAllBook(username){
        console.log("below1");
        document.getElementById("sortByDCArrangeDESCB").style.display="none";
        document.getElementById("sortByDCArrangeASCB").style.display="none";
        document.getElementById("sortByDMArrangeASCB").style.display="none";
        document.getElementById("sortByDMArrangeDESCB").style.display="none";
        document.getElementById("searchArrangementB").style.display="none";
        document.getElementById("defaultArrangementB").style.display="block";
        if (countShowAllBook>0){
            return;
        }
        else{
            countShowAllBook++;
        }
        document.getElementById("defaultArrangementB").innerHTML = "";
        
        var showSiteAPIURL = "https://esculapian-gangs.000webhostapp.com/webapp/showBook.php";

        var header={
            'Accept': 'application/json',
            'Content-Type':'application/json'
        };
    
        var Data={
            userid:username
        };
    	var id, title, author, dateCreated, dateModified, page, related_sites;
    	fetch(
    		showSiteAPIURL,{
    			method:'POST',
    			headers:header,
    			body: JSON.stringify(Data)
    		}
    	)
    	
    	.then((response)=>response.json())
    	.then((response)=>{
    	    //console.log(response.length);
    	    
    	    for (var i=0;i<response.length;i++){
    	        id=response[i]['id'];
        		title=response[i]['title'];
        		author=response[i]['author'];
        		dateCreated=response[i]['date_created'];
        		dateModified=response[i]['date_modified'];
        		page=response[i]['page'];
        		related_sites=response[i]['related_sites'];
        		var related_sites2 = related_sites.split(',');
        		var result_sites = "";
        		
        		
    	        var deleteSiteString = 'deleteBook(\''+title+"', '"+author+"', '"+username+"')";
    	        
    	        var editSiteString = 'openForm(\''+title+"', '"+author+"', '"+username+"')";
    	        var data4 = "<div class='row'><div class='col'><h5>"+title+"</h5></div><div class='col' style='overflow:hidden;'><h5 style='color:grey;'>"+author+"</h5></div><div class='col-1'><h5>"+dateCreated+"</h5></div><div class='col-1'><h5>"+dateModified+"</h5></div><div class='col-1'><h5>"+page+"</h5></div><div class='col-1'><h5>"+related_sites+"</h5></div><div class='col-1'><h5><button type='submit' class='btn btn-outline-secondary' onclick=\""+editSiteString+"\">Edit</button></h5></div><div class='col-1'><h5><button type='submit' class='btn btn-outline-secondary' onclick=\""+deleteSiteString+"\">Delete</button></h5></div></div><br>";
    	        
    	        document.getElementById("defaultArrangementB").innerHTML += data4;
    	    
    	    }
    		
    	 })
    	
    }
        
    
    </script>
    <div class="content">

	<div class="container-fluid">
        <div class="row">
    		<div class="col-10"><h1><?php echo $_SESSION['name']; ?>'s BookMark   <button type="button" class="btn btn-outline-secondary btn-lg" onclick="showAllBook(<?php echo $_SESSION['username']; ?>)">Refresh</button>  <button type="button" class="btn btn-outline-secondary btn-lg" onclick="https://esculapian-gangs.000webhostapp.com/webapp/home.php">Switch to bookmarks</button></h1>
    		</div>
    		
    		<div class="col-2"><h1><a href="logout.php"><button type="button" class="btn btn-outline-secondary btn-lg">Logout</button></a></h1>
    		</div>
        </div><br><br>
        
    </div>
	<div class="box-left" style="display:none;">
		<div class="row">
			<div class="col"><h4 style="text-align:left;">>ALL</h4></div>
		</div>
		<div class="row">
			<div class="col"><h4 style="text-align:left;">Group 1</h4></div>
		</div>
		<div class="row">
			<div class="col"><h4 style="text-align:left;">Group 2</h4></div>
		</div>
		<div class="row">
			<div class="col"><h4 style="text-align:left;">Group 3</h4></div>
		</div>
	</div>
	<div class="box-right">
	    
	    
		<div id="books">
		    
    		<div id="searchCol">
        		<div class="row">
        			<div class="col"><h4><input type="text" placeholder="Enter keyword" name="keyword" id="keyword" required> <button type="submit" class="btn btn-outline-secondary" onclick="search(document.getElementById('keyword').value, 1, <?php echo $_SESSION['username'];?>)">Search</button></h4></div>
        		</div>
    		</div>
    		<div id="buttonCol">
        		<div class="row">
        			<div class="col"><h4>All books<button type="button" class="btn btn-outline-secondary btn-lg" style="visibility: hidden;">&#9650</button></h4></div>
        			<div class="col"><h4>Author<button type="button" class="btn btn-outline-secondary btn-lg" style="visibility: hidden;">&#9650</button></h4></div>
        			<div class="col"><h4>Date created  <button type="button" class="btn btn-outline-secondary btn-lg" onclick="sortByDateCreatedASC(<?php echo $_SESSION['username']; ?>)">&#9650</button><button type="button" class="btn btn-outline-secondary btn-lg" onclick="sortByDateCreatedDESC(<?php echo $_SESSION['username']; ?>)">&#9660</button></h4></div>
        			<div class="col"><h4>Date modified <button type="button" class="btn btn-outline-secondary btn-lg" onclick="sortByDateModifiedASC(<?php echo $_SESSION['username']; ?>)">&#9650</button></button><button type="button" class="btn btn-outline-secondary btn-lg" onclick="sortByDateModifiedDESC(<?php echo $_SESSION['username']; ?>)">&#9660</button></h4></div>
        			<div class="col"><h4><button type="button" class="btn btn-outline-secondary btn-lg">Edit</button></h4></div>
        			<div class="col"><h4><button type="button" class="btn btn-outline-secondary btn-lg">Delete</button></h4></div>
        			
        		</div>
    		</div>
    		
    		<!-- book content -->
    		<div id="bookAttribute">
    		
    		    <div id="bookContent">
    		        <div class="form-popup" id="editForm">
                      <form class="form-container">
                        <h1>Edit book</h1>
                    
                        <label><b>Current title</b></label>
                        <input type="text" placeholder="Enter current name" name="name" id="oldTitleField" required>
                    
                        <label><b>Current author</b></label>
                        <input type="text" placeholder="Enter current url" name="url" id="oldAuthorField" required>
                        
                        <label><b>New title</b></label>
                        <input type="text" placeholder="Enter new name" name="url" id="newTitleField" required>
                        
                        <label><b>New author</b></label>
                        <input type="text" placeholder="Enter new url" name="url" id="newAuthorField" required>
                    
                        <button type="submit" class="btn btn-outline-primary" onclick="editSite(document.getElementById('oldNameField').value, document.getElementById('oldURLField').value,<?php echo $_SESSION['username']; ?>, document.getElementById('newNameField').value,document.getElementById('newURLField').value)">Save</button>
                        <button type="submit" class="btn btn-outline-secondary" onclick="closeForm()">Cancel</button>
                      </form>
                    </div>
                    <div class='row'><div class='col-3'><h5>Title</h5></div><div class='col-3'><h5>Author</h5></div><div class='col-1'><h5>created </h5></div><div class='col-1'><h5>modified</h5></div><div class='col-1'></div><div class='col-1'>page</div><div class='col-1'>related website</div></div>
                    <div><br></div>
    		        <div id="defaultArrangementB"></div>
    		        <div id="sortByDCArrangeASCB"></div>
    		        <div id="sortByDCArrangeDESCB"></div>
    		        <div id="sortByDMArrangeASCB"></div>
    		        <div id="sortByDMArrangeDESCB"></div>
    		        <div id="searchArrangementB"></div>
    		        <!--
    		        <div id="test"><div class='row'><div class='col'><h5><a href="http://youtube.com"target='_blank'>YouTube</a></h5></div><div class='col' style='overflow:hidden;'><h5 style='color:grey;'>http://youtube.com</h5></div><div class='col-1'><h5>2021-4-15</h5></div><div class='col-1'><h5>2021-4-15</h5></div><div class='col-1'><h5><button type="button" class="btn btn-outline-secondary" onclick="openForm('Youtube','http://youtube.com')">Edit</button></h5></div><div class='col-1'><h5><button type="button" class="btn btn-outline-secondary" onclick="deleteSite(<?php echo $_SESSION['username']; ?>, 'YouTube', 'http://youtube.com')">Delete</button></h5></div></div></div>
    		         -->
    		    </div>
    		
    		    
    		</div>
		</div>
	</div>
	
    </div>
    
    
</body>


</html>

<?php
}
else{
    header("Location: index.php");
}
?>